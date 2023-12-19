<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Vacancy extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function GET()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM umdoni.vacancies WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }

    

    public static function getById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM umdoni.vacancies WHERE id = $id");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }


    public static function Save($data)
    {
        global $context;
        $db = static::getDB(); 
        if(!isset($data['id'])) $data['id'] = 0;

        $sql = "INSERT into umdoni.vacancies ( `name`,`surname`, `email`, `telephone`, `title`,`category`, `ward`, `img_file`, `location`,`isActive`)
                VALUES ('$data[name]','$data[surname]','$data[email]','$data[telephone]','$data[title]','$data[category]','$data[ward]','$data[img_file]','$data[location]','$data[isActive]')"; 
        $stmt = $db->exec($sql);
        
       return $stmt;
    }

    public static function Update($data)
    {
        $db = static::getDB(); 
        
        $sql = "UPDATE umdoni.vacancies SET `name` =  '$data[name]', `surname`='$data[surname]', `email`='$data[email]', `telephone`='$data[telephone]', `title`='$data[title]', `img_file` = '$data[img_file]', `location` = '$data[location]',  `ward` = '$data[ward]', `updatedAt`= '$data[updatedAt]'
          WHERE `id`= $data[id]"; 
      
        $asset_id = $db->exec($sql);
     
       return $asset_id;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  umdoni.vacancies SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }
}

