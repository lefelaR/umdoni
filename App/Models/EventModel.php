<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class EventModel extends \Core\Repository
{
    /**
     * Get all the posts as an associative array
     * @return array
     */

    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM events WHERE `isActive` = 1 order by `createdAt` DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    public static function getEvent($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM events 
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
        $sql = "INSERT into events ( title, subtitle, body, createdAt, dueDate, isActive, location, img_file, updatedBy) 
                VALUES ( '$data[title]', '$data[subtitle]','$data[body]' , now(), '$data[duedate]' , 1 , '$data[location]', '$data[img_file]', '$data[updatedBy]')";
        $stmt = $db->exec($sql);
        return $stmt;
    }



    public static function Update($data)
    {
        $db = static::getDB();
        $sql = "UPDATE events SET
        `title` = :title,
        `subtitle`= :subtitle,
        `body` = :body,
        `updatedAt` = :updatedAt
         where `id` = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
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
        $sql = "UPDATE  events SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }




    static function Authenticate($profile, $data)
    {
        global $context;
        if ($data !== null) $hashed = md5($data['password']);
        try {
            $_SESSION['profile'] = $profile[0];
            $context->isLoggedIn = true;
            setcookie("auth", $profile[0]['access_token'], time() + 3600 * 30, '/');
            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
