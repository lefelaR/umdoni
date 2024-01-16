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
        
        $sql = "UPDATE profile SET 
        `first_name`    =   :first_name, 
        `last_name`     =   :last_name, 
        `mobile_number` =   :mobile_number,
        `address_1`     =   :address_1, 
        `address_2`     =   :address_2,
        `postal_code`   =   :postal_code, 
        `town`          =   :town, 
        `city`          =   :city,  
        `img_file`      =   :img_file,
        `location`      =   :location
        WHERE `user_id` =   $data[user_id]";
        
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':mobile_number', $data['mobile_number']);
        $stmt->bindParam(':address_1', $data['address_1']);
        $stmt->bindParam(':address_2', $data['address_2']);
        $stmt->bindParam(':postal_code', $data['postal_code']);
        $stmt->bindParam(':town', $data['town']);
        $stmt->bindParam(':city', $data['city']);
        $stmt->bindParam(':img_file', $data['img_file']);
        $stmt->bindParam(':location', $data['location']);

        $stmt->execute();

        $user_id = $db->lastInsertId();

        if(isset($user_id) && (is_numeric($user_id)))
        {
            $sql = "UPDATE users SET 
            `username`      =   :username, 
            `surname`       =   :surname,
            `email`         =   :email  
            WHERE `user_id` =   $data[user_id]";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $data['first_name']);
            $stmt->bindParam(':surname', $data['last_name']);
            $stmt->bindParam(':email', $data['email']);
            
            $stmt->execute();
        }

       return $stmt;
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

        $sql = "INSERT into users (username,surname,email,password,status, createdAt)
                VALUES (:username,:surname,:email,:password,:status,:createdAt)";
               
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':status', $data['status']);
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

}
