<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class QuotationsModel extends \Core\Repository
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
            $stmt = $db->query('SELECT * FROM quotations WHERE `isActive` = 1  order by `createdAt` DESC');
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
            $stmt = $db->query("SELECT * FROM quotations 
                                WHERE id = '$id'");                                  
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function Update($data)
    {

        $data['status'] = isset($data['status']) ? $data['status'] : 'current';
        $db = static::getDB(); 
        $sql = "UPDATE quotations SET `title` =  '$data[title]', `subtitle` = '$data[subtitle]', `body`= '$data[body]', `updatedAt`= '$data[updatedAt]',`status` = $data[status]
               WHERE `id`= $data[id]"; 
        $stmt = $db->exec($sql);

       return $stmt;
    }

    public static function updateStatus($id, $status)
{
    try {
        $db = static::getDB();
        $stmt = $db->prepare("UPDATE quotations SET status = :status WHERE id = :id");
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    public static function getByStatus($status)
{
    try {
        $db = static::getDB();
        $stmt = $db->prepare("SELECT * FROM quotations WHERE `status` = :status AND `isActive` = 1");
        $stmt = $db->query('SELECT id, title, subtitle, body, updatedBy, createdAt, status FROM quotations WHERE `isActive` = 1');
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


    public static function Save($data)
    {
        global $context;
        $data['status'] = isset($data['status']) ? $data['status'] : 'current';

        $db = static::getDB(); 
        $sql = "INSERT into quotations (title, subtitle, body, isActive, createdAt, updatedBy, reference, location, dueDate, status)
                VALUES ('$data[title]','$data[subtitle]','$data[body]','$data[isActive]', '$data[createdAt]', '$data[updatedBy]','$data[reference]', '$data[location]','$data[duedate]','$data[status]')"; 
        $stmt = $db->exec($sql);
         
       return $stmt;
    }


    public static function Delete($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE  quotations SET `isActive` = 0 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

    public static function Restore($id)
    {
        $db = static::getDB(); 
        $sql = "UPDATE quotations SET `isActive` = 1 WHERE `id` = $id"; 
        $stmt = $db->exec($sql);
       return $stmt;
    }

}
