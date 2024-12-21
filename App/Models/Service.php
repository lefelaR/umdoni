<?php

namespace App\Models;

use PDO;
use PhpParser\Node\Stmt;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Service extends \Core\Repository
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
            $stmt = $db->query('SELECT * FROM services WHERE `isActive` = 1 ORDER BY createdAt DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
    public static function getServiceById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM services 
                                WHERE id = '$id'");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function updateService($data)
    {
        $db = static::getDB(); 
        $sql = "UPDATE services SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]'
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }


    public static function Save($data)
    {
        global $context;

        $db = static::getDB(); 
        
        $sql = "INSERT into services (title, subtitle, body, isActive, createdAt, img_file, location, createdBy)
                VALUES (:title,:subtitle,:body,:isActive,:createdAt, :img_file, :location, :createdBy)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':isActive', $data['isActive']);
        $stmt->bindParam(':createdAt', $data['createdAt']);
        $stmt->bindParam(':img_file', $data['img_file']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':createdBy', $data['createdBy']);
                    
      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  services SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  services SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
