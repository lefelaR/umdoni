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
        $sql = "INSERT into vacancies ( `title`,`level`, `description`, `duties`, `experience`,`createdAt`, `createdBy`, `dueDate`,`dueDate`)
                VALUES ('$data[title]','$data[level]','$data[description]','$data[duties]','$data[experience]','$data[createdAt]','$data[dueDate]','$data[dueDate]')"; 
        $stmt = $db->exec($sql);   
       return $stmt;
    }

}

