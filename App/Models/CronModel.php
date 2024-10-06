<?php

namespace App\Models;

use PDO;

class CronModel extends \Core\Model
{


    public static function getData()
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

    
    public static function UdateTime($id)
    {
        
        try {
            $db = static::getDB();
            $stmt = $db->query("UPDATE tenders SET `isActive` =  0  WHERE `id` = {$id}");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}