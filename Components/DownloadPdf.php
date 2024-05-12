<?php

namespace Components;

use TCPDF;

abstract class DownloadPdf
{


    public static function SavePdf($html = '')
    {
        global $context;

        try {
            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false, true);
            $pdf->SetTitle("TEST TITLE");
            $pdf->AddPage();
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('download.pdf', 'D');
           
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function convertHtml($data)
    {
        $html = '<<<EOD';
        $html .= '<table border="1" width="500">';
        foreach ($data as  $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . $cell . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= 'EOD;';
        return $html;
    }
}
