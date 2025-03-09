<?php


function updateTenders()
{
   
    $currentDate = date("Y-m-d");
   
   
    try {
    $db = static::getDB();

    $sql = "UPDATE tenders 
            SET status = 2 
            WHERE dueDate < :currentDate 
            AND status = 1";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':currentDate', $currentDate);
        $stmt->execute();

        $updatedRows = $stmt->rowCount();

        file_put_contents(
            'tender_update_log.txt',
            "[$currentDate] Updated $updatedRows tenders to status 2\n",
            FILE_APPEND
        );

        return $updatedRows;

    } catch (\Throwable $th) {
        file_put_contents(
            'tender_update_log.txt',
            "[$currentDate] Error: " . $th->getMessage() . "\n",
            FILE_APPEND
        );
    }

}



// public function    updateQuotations()
// {
//     $data = CronModel::getQuotations();
//     $updated = [];
//     try {
//         foreach ($data as $dat) {
//             if ($dat['dueDate'] < date("Y-m-d")) {
//                 $res = CronModel::UdateTime($dat['id'], 'quotations');
//                 $updated[$dat['id']] = $res;
//             }
//         }
//         return $updated;
//     } catch (\Throwable $th) {
//         throw $th;
//     }
// }




updateTenders();
