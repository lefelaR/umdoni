<?php

namespace App\Models;

use PDO;

class CronModel extends \Core\Repository
{


    public static function getTenders()
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

    public static function getQuotations()
    {
        
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM quotations WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);            
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


    
    public static function UdateTime($id, $table)
    {
        
        try {
            
            $db = static::getDB();
            $stmt = $db->query("UPDATE {$table} SET `isActive` =  0  WHERE `id` = {$id}");
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $results["{$table}"] = $res;

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}