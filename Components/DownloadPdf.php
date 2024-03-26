<?php

namespace Components;

use Dompdf\Dompdf;
use Dompdf\Options;
abstract class DownloadPdf
{


    public static function SavePdf($html = '')
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
                
        try {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html, 'UTF-8');
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $dompdf->stream('download.pdf', array("Attachment" => true));

        } catch (\Throwable $th) {
            throw $th;
        }
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
        $html = '<table border="1" width="500">';
        foreach ($data as  $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . $cell . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= ' </body></html>';
        return $html;
    }
}
