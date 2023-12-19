<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Emails extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM emails');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
 
     public static function Save($data)
     {
         global $context;
 
 
         $db = static::getDB(); 
         
         $sql = "INSERT into umdoni.emails ( name, email, subject, message, createdAt)
                 VALUES ('$data[name]','$data[email]','$data[subject]', '$data[message]' , '$data[createdAt]')"; 
         $stmt = $db->exec($sql);
         
        return $stmt;
     }
 

    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  umdoni.requests SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  umdoni.services SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
