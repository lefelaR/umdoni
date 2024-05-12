<?php

namespace App\Models;
use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class LogsModel extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM logs ORDER BY time_log');
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
            $stmt = $db->query("SELECT * FROM logs 
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

         $date = date("Y-m-d H:i:s");

        $db = static::getDB(); 
        $sql = "INSERT into logs (`userId`,`username`, `email`, `time_log`,`status`,`last_login`)
                VALUES ('$data[user_id]' ,'$data[username]','$data[email]','$date', '$data[status]','$date')"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Delete($id)
    {
        $db = static::getDB(); 

        $sql = "DELETE FROM newsletters WHERE `id` = $id"; 
        $db->exec($sql);
        
       return $db;
    }


    public static function UserLogout($data)
    {
        $db = static::getDB(); 
        $date = date("Y-m-d H:i:s");
        
        $sql = "UPDATE logs SET 
        `logout` =  :logout
        WHERE `userId`= :userId";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':logout', $date);
        $stmt->bindParam(':userId' , $data['user_id']);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }

}
