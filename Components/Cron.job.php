<?php
use PDO;

$db = static::getDB();
$sql = "UPDATE tenders SET `status` =  0  WHERE `dueDate` >  now()";
$stmt = $db->exec($sql);
return $stmt;

