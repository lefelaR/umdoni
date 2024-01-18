<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class UserModel extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM users ORDER BY createdAt');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    
    public static function getUser($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM users 
                                LEFT JOIN profile ON (users.user_id = profile.user_id)
                                WHERE users.user_id = '$id' 
                                ORDER BY users.createdAt DESC");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function UpdateUser($data)
    {
        $db = static::getDB(); 
        
        $sql = "UPDATE profile SET `first_name` =  '$data[first_name]', `last_name` = '$data[last_name]', `mobile_number`= '$data[mobile_number]', `address_1`= '$data[address_1]',
         `address_2`= '$data[address_2]', `postal_code`= '$data[postal_code]', `town`='$data[town]', `city`= '$data[city]'  WHERE `user_id`= $data[user_id]"; 
        $user_id = $db->exec($sql);

        if(isset($user_id) && (is_numeric($user_id)))
        {
            $sql = "UPDATE users SET `email` = '$data[email]'  WHERE `user_id`= $data[user_id]"; 
             $stmt = $db->exec($sql);
        }

       return $stmt;
    }


    public static function UpdateImage($data)
    {
        $db = static::getDB(); 
        
        $sql = "UPDATE profile SET `img_file` = '$data[img_file]', `location` = '$data[location]'  WHERE `user_id`= $data[user_id]"; 
        $user_id = $db->exec($sql);

       return $user_id;
    }

    public static function VerifyeUser($data)
    {
        $db = static::getDB(); 
        $sql = "UPDATE users SET `verified` = 1 WHERE `email` = '$data[username]'"; 
       $user_id = $db->exec($sql);
       return $user_id;
    }

    public static function Save($data)
    {
        global $context;
        $db = static::getDB();

        $sql = "INSERT into users (username,surname,email,password,status,locked, createdAt)
                VALUES (:username,:surname,:email,:password,:status,:locked,:createdAt)";
               
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':locked', $data['locked']);
        $stmt->bindParam(':createdAt', $data['createdAt']);
    
        $stmt->execute();
        $user_id = $db->lastInsertId();

        if(isset($user_id) && (is_numeric($user_id)))
        {
            
            $sql = "INSERT into profile  ( user_id ,first_name , last_name)
                    VALUES ( $user_id,'$data[username]', '$data[surname]')"; 
             $stmt = $db->exec($sql);
            if(!is_null($stmt))
            {
                $_SESSION['success'] = ['message' => 'Record was successfully saved'];
            }
        }

       return $stmt;
    }




    public static function Delete($id)
    {
        $db = static::getDB(); 

        $sql = "DELETE FROM loki.users WHERE `user_id` = $id"; 
        $db->exec($sql);

        $sql = "DELETE FROM loki.profile WHERE `user_id` = $id"; 
                
        $db->exec($sql);
        

       return $stmt;
    }


    public static function ChangeStatus($data)
    {
        $db = static::getDB();
        $sql = "UPDATE users SET `locked` = $data[locked] WHERE `user_id` = '$data[user_id]'"; 
        $id = $db->exec($sql);
       return $id;
    }

}
