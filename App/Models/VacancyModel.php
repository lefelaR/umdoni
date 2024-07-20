<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class VacancyModel extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM vacancies WHERE `isActive` = 1');

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
        $sql = "INSERT into vacancies ( `title`,`subtitle`, `level`, `reference`, `location`,`description`,`createdAt`, `duedate`, `isActive`)
                VALUES ('$data[title]','$data[subtitle]','$data[level]','$data[reference]','$data[location]','$data[body]','$data[createdAt]','$data[duedate]', $data[isActive])"; 
        $stmt = $db->exec($sql);   
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  vacancies SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }
}

