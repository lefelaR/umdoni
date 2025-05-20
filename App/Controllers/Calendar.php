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
use DateInterval;
use DatePeriod;
use DateTimeImmutable;

class Calendar extends \Core\Controller
{

    protected function before() {}

    public function indexAction()
    {

        $aData = [];

        $dateStart = new DateTimeImmutable(date('Y-m-d', strtotime('now - 2 years')));
        $dateEnd = new DateTimeImmutable(date('Y-m-d', strtotime('now')));

        if(isset(getPostParams()['dateRange']))
        {
            list($rDateStart, $rDateEnd) = explode('-', getPostParams()['dateRange']);
            if(null == $rDateEnd){
                $rDateEnd = $rDateStart;
            }

            if(DateTimeImmutable::createFromFormat('Y-m-d', $rDateStart) && DateTimeImmutable::createFromFormat('Y-m-d', $rDateEnd)){
                $dateStart = DateTimeImmutable::createFromFormat('Y-m-d', $rDateStart);
                $dateEnd = DateTimeImmutable::createFromFormat('Y-m-d', $rDateEnd);
            }
        }

        $aData['period'] = new DatePeriod(
            $dateStart,
            new DateInterval('P1D'),
            $dateEnd
        );

    
        $aData['news'] = NewsModel::GetByDate(
                  $aData['period'] 
        ); #CCCCFF

        $aData['events']    = CalendarModel::GetByDate(
            $aData['period'] 
        );  #FFBF00
         $aData['agendas']   = AgendaModel::GetByDate(
            $aData['period'] 
         ); #DE3163
        $aData['meetings']  = Meeting::GetByDate( 
            $aData['period']
        ); #FF7F50
        $aData['projects']  = ProjectsModel::GetByDate(
            $aData['period']
        ); #9FE2BF
        $aData['events']   = EventModel::GetByDate(
            $aData['period']
        ); #40E0D0
        $aData['notices']   = NoticeRepository::GetByDate(
            $aData['period']
        ); #DFFF00
        
        view::render('calendar/index.php', $aData, 'default');
    }

    public function detailsAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $results = CalendarModel::getAll();
            foreach ($results as $key => $result) {
                if ($result["id"] == $id) $calendar = $result;
            }
        } else {
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
