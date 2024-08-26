<?php

namespace Components;
use Ticketpark\HtmlPhpExcel;
use Exception;

class SaveXls
{

    public static function convert($html ='', $name ='')
    {
        try {
            //code...
            $htmlPhpExcel = new \Ticketpark\HtmlPhpExcel\HtmlPhpExcel($html);
            return  $htmlPhpExcel->process()->save(`{$name}.xlsx`);

        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 1);
        }
     
    }
}
