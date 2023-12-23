<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Project extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function Get()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM projects WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
    public static function getById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM projects 
                                WHERE id = '$id'");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function Update($data)
    {
        $db = static::getDB(); 

        $sql = "UPDATE projects SET 
        `title` =  :title,
        `subtitle` = :subtitle, 
        `body`= :body, 
        ".(isset($data['location']) ? "`location` = :location" : "")."
        `updatedAt`= :updatedAt
        WHERE `id`= :id"; 
        
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
        if (isset($data['location'])) {
            $stmt->bindParam(':location', $data['location']);
        }
        $stmt->bindParam(':updatedAt', $data['updatedAt']);
        $stmt->bindParam(':id', $data['id']);

        if ($stmt->execute()) {
            return true; // or any meaningful success indicator
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }


    public static function Save($data)
    {
        global $context;

        $db = static::getDB(); 
        
        $sql = "INSERT into projects (title, subtitle, body, isActive, createdAt, location , updatedAt, updatedBy)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','1', '$data[createdAt]', '$data[location]' , 0,'rakheoana')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  projects SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  projects SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
