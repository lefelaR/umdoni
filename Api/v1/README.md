# API v1 Documentation

## Base URL
```
http://localhost:8080/api/v1
```

## Endpoints

### Health Check
- **GET** `/api/v1/health`
- Returns API health status and version information

### News
- **GET** `/api/v1/news` - Get all news items
- **GET** `/api/v1/news/{id}` - Get a single news item
- **POST** `/api/v1/news/create` - Create a new news item
- **PUT** `/api/v1/news/{id}/update` - Update a news item
- **DELETE** `/api/v1/news/{id}/delete` - Delete a news item (soft delete)

### Users
- **GET** `/api/v1/users` - Get all users
- **GET** `/api/v1/users/{id}` - Get a single user

### Events
- **GET** `/api/v1/events` - Get all events
- **GET** `/api/v1/events/{id}` - Get a single event

### Councillors
- **GET** `/api/v1/councillors` - Get all councillors
- **GET** `/api/v1/councillors/{id}` - Get a single councillor
- **GET** `/api/v1/councillors/exco` - Get all EXCO members
- **GET** `/api/v1/councillors/seniors` - Get all senior managers
- **POST** `/api/v1/councillors/create` - Create a new councillor
- **PUT** `/api/v1/councillors/{id}/update` - Update a councillor
- **DELETE** `/api/v1/councillors/{id}/delete` - Delete a councillor (soft delete)

## Request/Response Format

All requests and responses use JSON format.

### Success Response
```json
{
    "success": true,
    "message": "Success message",
    "data": { ... }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error message",
    "errors": { ... }
}
```

## HTTP Status Codes

- `200` - OK
- `201` - Created
- `204` - No Content
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Unprocessable Entity
- `500` - Internal Server Error

## CORS

The API supports CORS and allows requests from any origin. All endpoints respond to OPTIONS requests for preflight checks.

## Example Requests

### Get all news
```bash
curl http://localhost:8080/api/v1/news
```

### Get single news item
```bash
curl http://localhost:8080/api/v1/news/1
```

### Create news item
```bash
curl -X POST http://localhost:8080/api/v1/news/create \
  -H "Content-Type: application/json" \
  -d '{
    "title": "News Title",
    "subtitle": "News Subtitle",
    "body": "News body content"
  }'
```

### Update news item
```bash
curl -X PUT http://localhost:8080/api/v1/news/1/update \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Updated Title",
    "subtitle": "Updated Subtitle",
    "body": "Updated body content"
  }'
```

### Delete news item
```bash
curl -X DELETE http://localhost:8080/api/v1/news/1/delete
```

### Get all councillors
```bash
curl http://localhost:8080/api/v1/councillors
```

### Get single councillor
```bash
curl http://localhost:8080/api/v1/councillors/1
```

### Get EXCO members
```bash
curl http://localhost:8080/api/v1/councillors/exco
```

### Get senior managers
```bash
curl http://localhost:8080/api/v1/councillors/seniors
```

### Create councillor
```bash
curl -X POST http://localhost:8080/api/v1/councillors/create \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John",
    "surname": "Doe",
    "title": "Councillor",
    "category": "WARD",
    "email": "john.doe@example.com",
    "telephone": "0123456789",
    "ward": "1"
  }'
```

### Update councillor
```bash
curl -X PUT http://localhost:8080/api/v1/councillors/1/update \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Jane",
    "surname": "Doe",
    "title": "Councillor",
    "category": "WARD",
    "email": "jane.doe@example.com",
    "telephone": "0123456789",
    "ward": "1"
  }'
```

### Delete councillor
```bash
curl -X DELETE http://localhost:8080/api/v1/councillors/1/delete
```
