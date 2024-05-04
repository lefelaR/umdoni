<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class CouncillorModel extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function GET()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM councillors WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }



    public static function getExco()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM exco WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }
    public static function getSeniors()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM seniors WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }

    public static function getCouncillorById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM councillors WHERE id = $id");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }

    public static function getExcoById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM exco WHERE id = $id");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }


    public static function getSeniorManById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM seniors WHERE id = $id");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }


    public static function Save($data)
    {
        global $context;
        $db = static::getDB();
        if (!isset($data['id'])) $data['id'] = 0;

        $sql = "INSERT into councillors ( `name`,`middlename`,`surname`, `email`, `telephone`, `title`,`category`, `ward`, `img_file`, `location`,`isActive`)
                VALUES ('$data[name]','$data[middlename]','$data[surname]','$data[email]','$data[telephone]','$data[title]','$data[category]','$data[ward]','$data[img_file]','$data[location]','$data[isActive]')";
        $stmt = $db->exec($sql);

        return $stmt;
    }


    public static function SaveMan($data)
    {
        global $context;
        $db = static::getDB();
        if (!isset($data['id'])) $data['id'] = 0;

        $sql = "INSERT into seniors (
            `initials`,
            `name`,
            `middlename`,
            `surname`,
            `email`,
            `telephone`,
            `title`,
            `category`,
            `ward`,
            `img_file`,
            `location`,
            `isActive`

            )VALUES (
            
            :initials, 
            :name, 
            :middlename, 
            :surname, 
            :email, 
            :telephone, 
            :title, 
            :category, 
            :ward, 
            :img_file, 
            :location, 
            :isActive
            )";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':initials', $data['initials']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':middlename', $data['middlename']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':ward', $data['ward']);
        $stmt->bindParam(':img_file', $data['img_file']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':isActive', $data['isActive']);


        if ($stmt->execute()) {
            return $db->lastInsertId(); // Return the last inserted ID
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }


    public static function SaveExco($data)
    {
        global $context;
        $db = static::getDB();
        if (!isset($data['id'])) $data['id'] = 0;

        $sql = "INSERT into exco (
            `initials`,
            `name`,
            `middlename`,
            `surname`,
            `email`,
            `telephone`,
            `title`,
            `category`,
            `ward`,
            `img_file`,
            `location`,
            `isActive`

            )VALUES (
            
            :initials, 
            :name, 
            :middlename, 
            :surname, 
            :email, 
            :telephone, 
            :title, 
            :category, 
            :ward, 
            :img_file, 
            :location, 
            :isActive
            )";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':initials', $data['initials']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':middlename', $data['middlename']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':ward', $data['ward']);
        $stmt->bindParam(':img_file', $data['img_file']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':isActive', $data['isActive']);


        if ($stmt->execute()) {
            return $db->lastInsertId(); // Return the last inserted ID
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }


    public static function Update($data)
    {
        $db = static::getDB();

        $sql = "UPDATE councillors SET 
        `name` = :name, 
        `surname` = :surname,
        `middlename` = :middlename,
        `email` = :email,
        `telephone` = :telephone,
        `category` = :category,
        `title` = :title,
        `img_file` = :img_file,
        " . (isset($data['location']) ? "`location` = :location," : "") . "
        `ward` = :ward,
        `updatedAt` = :updatedAt
        WHERE `id` = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':middlename', $data['middlename']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':img_file', $data['img_file']);
        // Conditionally bind location parameter if it's provided
        if (isset($data['location'])) {
            $stmt->bindParam(':location', $data['location']);
        }
        $stmt->bindParam(':ward', $data['ward']);
        $stmt->bindParam(':updatedAt', $data['updatedAt']);
        $stmt->bindParam(':id', $data['id']);


        if ($stmt->execute()) {
            return true; // or any meaningful success indicator
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }

    public static function UpdateMan($data)
    {
        $db = static::getDB();

        $sql = "UPDATE seniors SET 
        `initials`      = :initials,
        `name`          = :name, 
        `surname`       = :surname,
        `middlename`    = :middlename,
        `email`         = :email,
        `telephone`     = :telephone,
        `title`         = :title,
        `category`      = :category,
        `img_file`      = :img_file,
        " . (isset($data['location']) ? "
        `location` = :location," : "") . "
        `ward`          = :ward,
        `updatedAt`     = :updatedAt
        WHERE `id`      = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':initials', $data['initials']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':middlename', $data['middlename']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':img_file', $data['img_file']);
      
        if (isset($data['location'])) {
            $stmt->bindParam(':location', $data['location']);
        }
        
        $stmt->bindParam(':ward', $data['ward']);
        $stmt->bindParam(':updatedAt', $data['updatedAt']);
        $stmt->bindParam(':id', $data['id']);


        if ($stmt->execute()) {
            return true; // or any meaningful success indicator
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }

    public static function UpdateExco($data)
    {
        $db = static::getDB();

        $sql = "UPDATE exco SET 
        `initials`      = :initials,
        `name`          = :name, 
        `surname`       = :surname,
        `middlename`    = :middlename,
        `email`         = :email,
        `telephone`     = :telephone,
        `title`         = :title,
        `category`      = :category,
        `img_file`      = :img_file,
        " . (isset($data['location']) ? "
        `location` = :location," : "") . "
        `ward`          = :ward,
        `updatedAt`     = :updatedAt
        WHERE `id`      = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':initials', $data['initials']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':middlename', $data['middlename']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':img_file', $data['img_file']);
      
        if (isset($data['location'])) {
            $stmt->bindParam(':location', $data['location']);
        }
        
        $stmt->bindParam(':ward', $data['ward']);
        $stmt->bindParam(':updatedAt', $data['updatedAt']);
        $stmt->bindParam(':id', $data['id']);


        if ($stmt->execute()) {
            return true; // or any meaningful success indicator
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }


    public static function Delete($id)
    {
        $db = static::getDB();
        $sql = "UPDATE  councillors SET `isActive` = 0 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }

    public static function DeleteMan($id)
    {
        $db = static::getDB();
        $sql = "UPDATE   seniors SET `isActive` = 0 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }


    public static function DeleteExco($id)
    {
        $db = static::getDB();
        $sql = "UPDATE   exco SET `isActive` = 0 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }

    public static function getType()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM education");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
