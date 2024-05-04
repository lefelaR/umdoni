<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class TenderModel extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM rfps WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
    public static function getRfpById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM rfps 
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
        $sql = "UPDATE rfps SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]'
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }


    public static function Save($data)
    {
        global $context;

        $db = static::getDB(); 
        $sql = "INSERT into rfps (title, subtitle, body, isActive, createdAt, updatedBy, reference, location, dueDate, status)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','$data[isActive]', '$data[createdAt]', '$data[updatedBy]','$data[reference]', '$data[location]','$data[duedate]','$data[status]')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  rfps SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  rfps SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
