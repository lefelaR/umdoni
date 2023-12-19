<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Request extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM requests WHERE `status` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
    public static function getRequestById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM umdoni.services 
                                WHERE id = '$id'");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function update($data)
    {
        $db = static::getDB(); 
        $sql = "UPDATE umdoni.services SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]'
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }



   

    public static function Save($data)
    {
        global $context;
        $db = static::getDB(); 
        $sql = "INSERT into umdoni.requests (name, email, telephone, servicetype, comments, createdAt, status)
                VALUES ('$data[name]','$data[email]','$data[telephone]', '$data[service]', '$data[comments]', '$data[createdAt]', '$data[status]')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  umdoni.requests SET `status` = 0 WHERE `id` = $id"; 
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
