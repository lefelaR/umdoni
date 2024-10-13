<?php

use App\Models\CronModel;



$data = CronModel::getData();

$updated = [];

try {
    foreach ($data as $tender) {
        if ($tender['dueDate'] < date("Y-m-d") ) {
            $data = CronModel::UdateTime($tender['id']);
            $updated[$tender['id']] = $data;
        }
    }
    return true;
} catch (\Throwable $th) {
    throw $th;
}
