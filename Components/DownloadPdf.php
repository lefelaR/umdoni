<?php

namespace Components;
use Dompdf\Dompdf;

abstract class DownloadPdf
{

    public static function SavePdf($html = '')
    {

    // HTML content that you want to convert to PDF
    // Create a Dompdf instance
    $dompdf = new Dompdf();
    // Load HTML content

    $dompdf->loadHtml($html);
    // $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    

    $dompdf->stream('download.pdf');

    }


    public static function convertHtml($data)
    {

        $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>';
        $html = '<table border="1">';
            foreach ($data as  $row) {
                $html .= '<tr>';
                foreach ($row as $cell) {
                    $html .= '<td>'.$cell.'</td>';                    
                }
                $html .= '</tr>';
            }

        $html .= '</table>';
        $html .=' </body></html>';
        
        return $html;
    }
}