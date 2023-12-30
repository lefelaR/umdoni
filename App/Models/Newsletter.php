<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Newsletter extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM newsletters ORDER BY createdAt');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    
    public static function getNewsletter($id)
    {  
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM newsletters 
                                WHERE newsletters.id = $id;
                                ORDER BY newsletters.createdAt DESC");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function UpdateNewsletter($data)
    {
        $db = static::getDB(); 
        $sql = "UPDATE profile SET `first_name` =  '$data[first_name]', `last_name` = '$data[last_name]', `mobile_number`= '$data[mobile_number]', `address_1`= '$data[address_1]',
         `address_2`= '$data[address_2]', `province_id`= '$data[province]' , `postal_code`= '$data[postal_code]', `region_id`= '$data[city]'  WHERE `user_id`= $data[user_id]"; 
        $user_id = $db->exec($sql);
        if(isset($user_id) && (is_numeric($user_id)))
        {
            $sql = "UPDATE loki.users SET `email` = '$data[email]'  WHERE `user_id`= $data[user_id]"; 
             $stmt = $db->exec($sql);
        }
       return $stmt;
    }

    public static function Save($data)
    {
        global $context;
        $db = static::getDB(); 
        
        $sql = "INSERT into newsletters (`title`, `subtitle`,`publisher`,`img_file`,`location`,`createdAt`, `isActive`)
                VALUES ('$data[title]' ,'$data[subtitle]', '$data[publisher]', '$data[img_file]','$data[location]','$data[createdAt]', '$data[isActive]')"; 
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

}
