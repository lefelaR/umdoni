<?php


namespace App\Models;
use PDO;
class SettingsModel extends \Core\Repository
{


    public static function get()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM settings');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function update($data):mixed
    {
        try {
            $db = static::getDB();
            $sql = "UPDATE settings SET `user_id` =  '$data[userid]', `settings` = '$data[settings]'
            WHERE `id`= $data[id]"; 
            $stmt = $db->exec($sql);

            return $stmt;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}