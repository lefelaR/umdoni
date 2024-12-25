<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Post extends \Core\Repository
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
            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function Save($data)
    {
        $db = static::getDB(); 
        $sql = "INSERT into loki.contacts ( name, email, message, created_date, status) 
                VALUES ( '$data[name]', '$data[email]','$data[message]' , now() , 1)";
        $stmt = $db->exec($sql);
        return $stmt;
    }


}
