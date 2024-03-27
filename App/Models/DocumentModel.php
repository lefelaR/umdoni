<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class DocumentModel extends \Core\Model
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
            $stmt = $db->query('SELECT * FROM documents WHERE `isActive` = 1');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }



    public static function GetById($id, $category)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM documents WHERE id = '$id'");
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
        if (!isset($data['id'])) $data['id'] = 0;


        $sql = "INSERT into documents ( `title`,`subtitle`, `body`, `category`, `img_file`, `location`,`isActive`, `createdAt`, `updatedBy`)
        VALUES ( :title, :subtitle, :body, :category,:img_file, :location, :isActive, :createdAt, :updatedBy)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':category', $data['category']);
        $stmt->bindParam(':img_file', $data['img_file']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':isActive', $data['isActive']);
        $stmt->bindParam(':createdAt', $data['createdAt']);
        $stmt->bindParam(':updatedBy', $data['updatedBy']);
       

        if ($stmt->execute()) {
            return $db->lastInsertId(); // Return the last inserted ID
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }


    public static function Update($data)
    {
        $db = static::getDB();

        $sql = "UPDATE documents SET 
        `title`  = :title,
        `subtitle` = :subtitle,
        `body` = :body, 
        `img_file` = :img_file, 
        " . (isset($data['location']) ? "`location` = :location," : "") . "
        `createdAt` = :createdAt,
        `updatedBy` = :updatedBy,
        `updatedAt` = :updatedAt

        WHERE `id` = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':subtitle', $data['subtitle']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':img_file', $data['img_file']);
        if (isset($data['location'])) {
            $stmt->bindParam(':location', $data['location']);
        }
        $stmt->bindParam(':createdAt', $data['createdAt']);
        $stmt->bindParam(':updatedBy', $data['updatedBy']);
        $stmt->bindParam(':updatedAt', $data['updatedAt']);
        $stmt->bindParam(':id', $data['id']);


        if ($stmt->execute()) {
            return true; // or any meaningful success indicator
        } else {
            // Handle the error, log it, or return false
            return false;
        }
    }


    public static function Delete($id)
    {
        $db = static::getDB();
        $sql = "UPDATE  documents SET `isActive` = 0 WHERE `id` = $id";
        $stmt = $db->exec($sql);
        return $stmt;
    }
}
