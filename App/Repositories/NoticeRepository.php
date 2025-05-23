<?php

namespace App\Repositories;

use DatePeriod;
use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class NoticeRepository extends \Core\Repository
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
            $stmt = $db->query('SELECT * FROM notices WHERE `isActive` = 1 order by `createdAt` DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    /**
     * @return object
     */
    public static function getById($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM notices WHERE id = '$id'");
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function GetByDate( 
        ?DatePeriod $oDatePeriod = null
        ): array|bool 
     {
         try {
             $db = static::getDB();
             $start = $oDatePeriod->getStartDate()->format('Y-m-d');
             $end = $oDatePeriod->getEndDate()->format('Y-m-d');
 
 
             $sql = 'SELECT * FROM notices WHERE createdAt BETWEEN :dateStart AND :dateEnd ORDER BY createdAt DESC';
             $stmt = $db->prepare($sql);
             $stmt->bindParam(':dateStart' , $start);
             $stmt->bindParam(':dateEnd', $end);
             $stmt->execute();
 
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             return $results;
 
         } catch (PDOException $e) {
             return $e->getMessage();
         }
     }

     
    public static function Update($data)
    {
        $db = static::getDB();

        $sql = "UPDATE notices SET 
        `title` =  :title, 
        `subtitle` = :subtitle, 
        `body`= :body, 
        `updatedAt`= :updatedAt
        WHERE `id`= $data[id]";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':updatedAt', $data['updatedAt']);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }

    }


    public static function Save($data)
    {
        global $context;
        $db = static::getDB();
        if (!isset($data['id'])) $data['id'] = 0;
        $sql = "INSERT into notices (title, subtitle, body, isActive, img_file, location, createdAt)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','1', '$data[img_file]', '$data[location]', '$data[createdAt]' )";
        $stmt = $db->exec($sql);
        return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB();
        $sql = "UPDATE  notices SET `isActive` = 0 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB();
        $sql = "UPDATE  notices SET `isActive` = 1 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }
}
