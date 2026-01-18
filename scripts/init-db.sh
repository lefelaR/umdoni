#!/bin/bash
set -e

echo "Waiting for MySQL to be ready..."
# Wait for MySQL to be fully started
max_attempts=30
attempt=0
while [ $attempt -lt $max_attempts ]; do
    if mysqladmin ping -h localhost --silent 2>/dev/null; then
        echo "MySQL is up!"
        break
    fi
    attempt=$((attempt + 1))
    echo "MySQL is unavailable - sleeping (attempt $attempt/$max_attempts)"
    sleep 2
done

if [ $attempt -eq $max_attempts ]; then
    echo "MySQL failed to start after $max_attempts attempts"
    exit 1
fi

echo "Checking if database needs initialization..."

# Check if database already has tables (to avoid re-running on container restart)
TABLE_COUNT=$(mysql -u umdonigov_admin -p29019WtP98zj23 umdonigov_umdoni -e "SHOW TABLES;" 2>/dev/null | wc -l || echo "0")

if [ "$TABLE_COUNT" -lt 2 ]; then
    echo "Database is empty. Running migrations..."
    
    # Run migrations in order
    MIGRATIONS_DIR="/docker-entrypoint-initdb.d/migrations"
    if [ -d "$MIGRATIONS_DIR" ]; then
        for migration in $(ls -1 "$MIGRATIONS_DIR"/*.sql | sort); do
            echo "Running migration: $(basename $migration)"
            mysql -u umdonigov_admin -p29019WtP98zj23 umdonigov_umdoni < "$migration"
            if [ $? -eq 0 ]; then
                echo "✓ Migration $(basename $migration) completed successfully"
            else
                echo "✗ Error: Failed to run migration $(basename $migration)"
                exit 1
            fi
        done
        echo "All migrations completed successfully!"
    else
        echo "Warning: Migrations directory not found at $MIGRATIONS_DIR"
        # Fallback to old SQL file if migrations directory doesn't exist
        if [ -f "/docker-entrypoint-initdb.d/umdoni_data.sql" ]; then
            echo "Falling back to umdoni_data.sql..."
            mysql -u umdonigov_admin -p29019WtP98zj23 umdonigov_umdoni < /docker-entrypoint-initdb.d/umdoni_data.sql
        fi
    fi
else
    echo "Database already initialized ($TABLE_COUNT tables found). Skipping migrations."
fi
