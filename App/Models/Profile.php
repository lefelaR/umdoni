<?php

namespace App\Models;
use PDO;
use App\Models\LogsModel;
use Exception;
/**
 * Post model
 *
 * PHP version 5.4
 */
class Profile extends \Core\Repository
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


    public static function getById($user_id)
    {
            try {
                $db = static::getDB();
                $stmt = $db->query("SELECT * FROM users
                                    LEFT JOIN profile ON (users.user_id = profile.user_id)
                                    WHERE users.user_id = $user_id");
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
        // we can determine the role from here and use it in the future
        // compare passwo
        

        // get the role
        if(!empty($exists)) 
        {
            try {
                 self::authenticate($exists, $data);
            } catch (\Throwable $th) {
                throw $th;
            }
            return true;
        }
        else
        {
            throw new Exception("Error Processing Request", 1);
        }
    }


     static function Authenticate($profile, $aData)
    {
        global $context;
        try{
            
            if($aData['password'] === $profile[0]['password']){
                $context->isLoggedIn = true;
            }
            if(!empty($profile[0]['access_token'])){
                $context->isLoggedIn = false;
                return false;
            }
            if ($profile[0]["locked"] == '1' ) 
            {   
                $context->isLoggedIn = false;
                return false;
            }
            else
            {
               $logId = LogsModel::Save($profile[0]);
               $profile[0]['log_id'] = $logId;
                $_SESSION['profile'] = $profile[0];
                setcookie("auth", md5($profile[0]['password']), time() + 3600 * 30, '/');
                return true;
            }
        }catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}