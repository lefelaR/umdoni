<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Roles extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM experience WHERE `status` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    /**
     * 
     */
    public static function getTrash()
    {
  
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM experience WHERE `status` = 0');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     * @return object
     */
    public static function getExperienceById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM experience 
                                WHERE id = '$id'");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function UpdateExperience($data)
    {
        $db = static::getDB(); 
        $sql = "UPDATE loki.experience SET `company` =  '$data[company]', `position` = '$data[position]', `start`= '$data[start]', `end`= '$data[end]',
                `responsibility`= '$data[responsibility]', `tools`= '$data[tools]' , `country`= '$data[country]', `city`= '$data[city]', `contact` = '$data[contact]'  
                WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }


    public static function Save($data)
    {
        global $context;
        $db = static::getDB(); 
        
        $sql = "INSERT into loki.experience (company, position, start, end, responsibility, tools, city, contact)
                VALUES ('$data[company]','$data[position]','$data[start]','$data[end]','$data[responsibility]','$data[tools]','$data[city]','$data[contact]')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 

        $sql = "UPDATE  loki.experience SET `status` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
    
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 

        $sql = "UPDATE  loki.experience SET `status` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
    
       return $stmt;
    }

}
