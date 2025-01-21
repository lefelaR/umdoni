<?php
global $context;
use Components\Calendar;
$calendar = new Calendar();
$data = $context->data;



foreach ($data as $iKey => $aValue) {

    switch ($iKey) {
        case 'events':
            $aEvents = $data[$iKey];
            foreach ($aEvents as $iKey => $event) {
                $txt = $event['title'];
                $color = '#FFBF00';
                $days = 1;
                $date = $event['dueDate'] ? date('Y-m-d', strtotime($event['dueDate'])) :'';
                $calendar->add_event(txt: $txt, date: $date, days: $days, color: $color);
            }
           
            break;
        case 'meetings':
            $aMeetings = $data[$iKey];
            foreach ($aMeetings as $iKey => $meeting) 
            {
                $txt = $meeting['title'] ? $meeting['title'] : '';
                $color = '#FF7F50';
                $days = 1;
                $date = $meeting['duedate'] ?  date('Y-m-d', strtotime($meeting['duedate'])) : '';
                $calendar->add_event('blah', date: $date, days: $days, color: $color);
            }

        break;
        case 'agendas':
            $aAgendas = $data[$iKey];
            foreach ($aAgendas as $iKey => $agenda) 
            {
                $txt = $agenda['title'] ? $agenda['title'] : '';
                $color = '#DE3163';
                $days = 1;
                $date = $agenda['duedate'] ? date('Y-m-d', strtotime($agenda['duedate'])) : '';
                $calendar->add_event( $txt, date: $date, days: $days, color: $color);
            }
         
        break;
        case 'projects':
            $aProjects = $data[$iKey];
            foreach ($aProjects as $iKey => $project) 
            {
                $txt = $project['title'];
                $color = '#9FE2BF';
                $days = 1;
                $date =  $project['dueDate'] ? date('Y-m-d', strtotime($project['dueDate'])) : '' ;
                $calendar->add_event( $txt, date: $date, days: $days, color: $color);
            }
        break;
    
        case 'notices':
            $aNotice = $data[$iKey];
            foreach ($aNotice as $iKey => $notice) 
            {
                $txt = $notice['title'];
                $color = '#40E0D0';
                $days = 1;
                $date = $notice['duedate'] ? date('Y-m-d', strtotime($notice['duedate'])) : '';
                $calendar->add_event( $txt, date: $date, days: $days, color: $color);
            }
        break;

        case 'news':
            $aNews = $data[$iKey];
            foreach ($aNews as $iKey => $news) 
            {
                $txt = $news['title'];
                $color = '#DFFF00';
                $days = 1;
                $date = $news['createdAt'] ? date('Y-m-d', strtotime($news['createdAt'])) : '';
                $calendar->add_event( $txt, date: $date, days: $days, color: $color);
            }
        break;
            default:
            # code...
            break;
    }

}


?>
<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Beach_strip1.jpg") ?>');
        min-height: 40vh;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
    }



    #service-page p {
        bottom: 0px;
        position: absolute;
        font-size: 8em !important;
    }


    nav {
        width: 100%;
        position: relative;
        top: 0;
        left: 0;
        padding: 8px 1%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 20;
        background-color: #fff;
        color: #000;
    }

    nav ul li a {
        color: #000;
    }

    nav ul li i {
        color: #000;
    }

    .timeline {
        border-left: 1px solid hsl(0, 0%, 90%);
        position: relative;
        list-style: none;
    }

    .timeline .timeline-item {
        position: relative;
    }

    .timeline .timeline-item:after {
        position: absolute;
        display: block;
        top: 0;
    }

    .timeline .timeline-item:after {
        background-color: hsl(0, 0%, 90%);
        left: -38px;
        border-radius: 50%;
        height: 11px;
        width: 11px;
        content: "";
    }
</style>

<?php
echo '
<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                    Calendar
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="fw-lighter fs-3 my-5">
                Discover what`s happening in our town, Our `CALENDAR` feature simplified scheduling and planning. Find information about planned events, appointments, and deadlines.
            </p>
        </div>
    </div>
    <div class="row mt-2">
        <div class=" col-md-12 col-lg-12 col-sm-12">
            <!-- <div class="card">
                <div class="card-body shadow-sm"> -->
                    <!-- Section: Timeline -->
                    <section class="py-5">'  
                    . $calendar .
                   ' </section>
        </div>
    </div>
</div>';
?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
