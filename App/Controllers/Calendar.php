<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\EventModel;
use App\Models\Meeting;
use App\Models\NewsModel;
use App\Models\NoticeModel;
use App\Models\ProjectsModel;
use App\Repositories\NoticeRepository;
use \Core\View;
use App\Models\CalendarModel;


class Calendar extends \Core\Controller
{

    protected function before()
    {
    
    }

    public function indexAction()
    {
        $aData = [] ;

        $aData['events'] = CalendarModel::getAll();  #FFBF00
        $aData['meetings'] = Meeting::getAll(); #FF7F50
        $aData['agendas'] = AgendaModel::Get(); #DE3163
        $aData['projects'] = ProjectsModel::Get(); #9FE2BF
        $aData['events'] = EventModel::getAll(); #40E0D0
        $aData['notices'] = NoticeRepository::getAll(); #DFFF00
        $aData['news'] = NewsModel::Get(); #CCCCFF


        view::render('calendar/index.php', $aData, 'default');
    }

    public function detailsAction()
    {
         $data = getPostData();
                 if(isset($data['id'])){
            $id = $data['id'];
            $results = CalendarModel::getAll();
            foreach ($results as $key => $result) {
                if($result["id"] == $id) $calendar = $result;
            }
           
        }else{
            $calendar = array();
        }

        view::render(
            'calendar/details.php',
            $calendar,
            'default'
        );
    }
    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }
}
