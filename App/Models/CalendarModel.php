<?php

namespace App\Models;
use PDO;
/**
 * Post model
 *
 * PHP version 5.4
 */
class CalendarModel extends \Core\Model
{
    /**
     * Get all the posts as an associative array
     * @return array
     */
    
     public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM events 
                                UNION
                                SELECT * FROM  projects 
                                ORDER BY `dueDate` ASC'
                            );                              
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}
