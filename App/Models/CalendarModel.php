<?php

namespace App\Models;

use DatePeriod;
use PDO;
/**
 * Post model
 *
 * PHP version 5.4
 */
class CalendarModel extends \Core\Repository
{
    /**
     * Get all the posts as an associative array
     * @return array
     */
    
     public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM events WHERE `isActive` = 1
                                UNION
                                SELECT * FROM  projects  WHERE `isActive` = 1
                                ORDER BY `dueDate` ASC'
                            );                              
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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


            $sql = 'SELECT * FROM events  
                   
                   -- UNION
                -- SELECT p.* FROM  projects p  WHERE `isActive` = 1
                    WHERE createdAt BETWEEN :dateStart AND :dateEnd
                    ORDER BY `dueDate` ASC';
                                
            $stmt = $db->prepare($sql); 
            $stmt->bindParam(':dateStart', $start);
            $stmt->bindParam(':dateEnd', $end);                
            $stmt->execute();
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}