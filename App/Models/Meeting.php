<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Meeting extends \Core\Model
{
    /**
     * Get all the posts as an associative array
     * @return array
     */

    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM meetings WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    public static function getMeeting($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM meetings 
                                WHERE id = '$id' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function Save($data)
    {
        $db = static::getDB();
        $sql = "INSERT into meetings ( title, subtitle, body, createdAt, isActive, location, img_file, updatedBy) 
                VALUES ( '$data[title]', '$data[subtitle]','$data[body]' , now() , 1 , '$data[location]', '$data[img_file]', '$data[updatedBy]')";
        $stmt = $db->exec($sql);
        return $stmt;
    }

    public static function Update($data)
    {
        $db = static::getDB();

        $sql = "UPDATE meetings SET 
        `title` =  :title, 
        `subtitle` = :subtitle, 
        `body`= :body, 
        `updatedAt`= :updatedAt
        WHERE `id`= $data[id]";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':updatedAt', $data['updatedAt']);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }


    public static function Delete($id)
    {
        $db = static::getDB();
        $sql = "UPDATE  meetings SET `isActive` = 0 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB();
        $sql = "UPDATE  meetings SET `isActive` = 1 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }


}
