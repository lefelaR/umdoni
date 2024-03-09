<?php

namespace App\Models;

use PDO;




/**
 * Post model
 *
 * PHP version 5.4
 */
class RolesModel extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM roles');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    /**
     * 
     */

     public static function GetById($id)
     {
   
         try {
             $db = static::getDB();
             $stmt = $db->query("SELECT * FROM roles 
             WHERE id = '$id'");
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
        
        $sql = "INSERT into roles (name, permissions)
                VALUES ('$data[name]','$data[permissions]')"; 
        $stmt = $db->exec($sql);
    
       return $stmt;
    }



    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "DELETE FROM roles WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}

