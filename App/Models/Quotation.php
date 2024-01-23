<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Quotation extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {

        try {

            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM quotations WHERE `isActive` = 1');
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
            $stmt = $db->query("SELECT * FROM quotations 
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
        $sql = "UPDATE quotations SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]'
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }


    public static function Save($data)
    {
        global $context;

        $db = static::getDB(); 
        $sql = "INSERT into quotations (title, subtitle, body, isActive, createdAt, updatedBy, reference, location, dueDate, status)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','$data[isActive]', '$data[createdAt]', '$data[updatedBy]','$data[reference]', '$data[location]','$data[duedate]','$data[status]')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  quotations SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE quotations SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
