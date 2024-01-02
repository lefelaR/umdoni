<?php

namespace App\Models;
use PDO;
/**
 * Post model
 *
 * PHP version 5.4
 */
class Profile extends \Core\Model
{
    /**
     * Get all the posts as an associative array
     * @return array
     */
    
     public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM users 
                                LEFT JOIN profile ON (users.user_id = profile.user_id) 
                                ORDER BY users.createdAt DESC");                                  
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function getUser($data)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM users 
                                LEFT JOIN profile ON (users.user_id = profile.user_id)
                                WHERE users.email LIKE '%$data%' 
                                ORDER BY users.createdAt DESC");                                  
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    public static function Save($data)
    {
        $db = static::getDB(); 
        $sql = "INSERT into profile ( name, email, message, created_date, status) 
                VALUES ( '$data[name]', '$data[email]','$data[message]' , now() , 1)";
        $stmt = $db->exec($sql);
        return $stmt;
    }



    public static function Update()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;   
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function Delete()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function Login($data)
    {
        global $context;
        $exists = self::getUser($data['username']);
        
        $context = (object) array_merge( (array)$context, array( 'profile' => $exists ) );
        // $context->profile = $exists;

        if(!empty($exists)) 
        {
            try {
                 self::authenticate($exists, $data);
            } catch (\Throwable $th) {
                throw $th;
            }
            /**we want to register the userProfile*/
            if ($exists[0]["confirmation_token"] != "") 
            {
                throw new Exception("NotVerified");
            }
            if ($exists[0]["locked"] == 1) 
            {
                throw new Exception("AccountLocked");
            }
            if($context->isLoggedIn == null)
            {
                return false;
            }
            return true;
        }
        else
        {
            throw new Exception("Error Processing Request", 1);
        }
    }


     static function Authenticate($profile, $data)
    {
        global $context;
        if($data !== null) $hashed = md5($data['password']);
        try{
                $_SESSION['profile'] = $profile[0];
                $context->isLoggedIn = true;
                setcookie("auth", $_SESSION['token'], time() + 3600 * 30, '/');
                return true;
        }catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

}
