<?php
namespace App\Models;

use PDO;

/**

* Post model
 *
 * PHP version 5.4
 */
class NewsModel extends \Core\Repository
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
            $stmt = $db->query('SELECT * FROM news WHERE `isActive` = 1  ORDER BY createdAt DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
    public static function GetById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM news 
                                WHERE id = '$id'");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function Update($data)
    {
        $db = static::getDB(); 
        $sql = "UPDATE news SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]'
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }


    public static function Save($data)
    {
        global $context;
        $db = static::getDB(); 
        if(!isset($data['id'])) $data['id'] = 0;

        $sql = "INSERT into news (title, subtitle, body, isActive, img_file, location, createdAt)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','1', '$data[img_file]', '$data[location]', '$data[createdAt]' )"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  news SET `isActive` = 0 WHERE `id` = $id"; 
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
