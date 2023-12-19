<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Quotation extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM tenders WHERE `isActive` = 1');
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
            $stmt = $db->query("SELECT * FROM tenders 
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
        $sql = "UPDATE umdoni.tenders SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]'
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }


    public static function Save($data)
    {
        global $context;

        $db = static::getDB(); 
        
        $sql = "INSERT into umdoni.tenders (title, subtitle, body, isActive, createdAt, updatedAt, updatedBy)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','1', 'today' , 0,'rakheoana')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  umdoni.tenders SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  umdoni.tenders SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
