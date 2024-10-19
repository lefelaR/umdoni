<?php

use App\Models\CronModel;


function updateTenders()
{
    $data = CronModel::getTenders();
    $updated = [];
    try {
        foreach ($data as $tender) {
            if ($tender['dueDate'] < date("Y-m-d")) {
                $data = CronModel::UdateTime($tender['id'], 'tenders');
                $updated[$tender['id']] = $data;
            }
        }
        return $updated;
    } catch (\Throwable $th) {
        throw $th;
    }

}

function    updateQuotations()
{
    $data = CronModel::getQuotations();
    $updated = [];
    try {
        foreach ($data as $dat) {
            if ($dat['dueDate'] < date("Y-m-d")) {
                $res = CronModel::UdateTime($dat['id'], 'quotations');
                $updated[$dat['id']] = $res;
            }
        }
        return $updated;
    } catch (\Throwable $th) {
        throw $th;
    }
}
updateTenders();
updateQuotations();