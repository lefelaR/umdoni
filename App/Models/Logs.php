<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Log extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM logs ORDER BY createdAt');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    
    public static function getById($id)
    {
        
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM umdoni.logs 
                                WHERE logs.id = $id;
                                ORDER BY newsletters.createdAt DESC");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

   

    public static function Save($data)
    {
        global $context;
        $db = static::getDB(); 
        
        $sql = "INSERT into umdoni.newsletters (`title`, `subtitle`,`publisher`,`img_file`,`location`,`createdAt`, `isActive`)
                VALUES ('$data[title]' ,'$data[subtitle]', '$data[publisher]', '$data[img_file]','$data[location]','$data[createdAt]', `$data[isActive]`)"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }

    public static function Delete($id)
    {
        $db = static::getDB(); 

        $sql = "DELETE FROM umdoni.newsletters WHERE `id` = $id"; 
        $db->exec($sql);
        
       return $db;
    }

}
