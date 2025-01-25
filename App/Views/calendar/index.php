<?php
global $context;
use Components\Calendar;
$calendar = new Calendar();
$data = $context->data;


foreach ($data as $iKey => $aValue) {

    switch ($iKey) {
        case 'events':
            $aEvents = $data[$iKey];
            foreach ($aEvents as $Key => $event)
            {
                $iModalId = 'eventsModal-'.$Key;
                $txt = $event['title'];
                if( strtotime(date("Y-m-d")) > strtotime($event['dueDate'])  ){
                    $color = 'past';
                }else{
                    $color = 'events';
                }
               
                $days = 1;
                $date = $event['dueDate'] ? date('Y-m-d', strtotime($event['dueDate'])) :'';
                $calendar->add_event(txt: $txt, date: $date, days: $days, color: $color, iModalId: $iModalId);
                echo '
                <div class="modal fade  bd-example-modal-lg" id="'.$iModalId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">'.formatDate($date).'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="container content-section">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                                          '.$txt.'
                                        </p>
                                        <p class="fs-3 my-2 text-yellow"> 
                                            <?php
                                            '. $event['subtitle'].'
                                            ?>
                                        </p>
                                        <p class="text-secondary">
                                            created at:  '.$event['createdAt'].' 
                                        </p>

                                        <span class="py-3 mb-3">
                                            <img src="'. $event['location'].'" class="img-fluid" style="width: 100%;" alt="'.$event['title'].'">
                                        </span>
                                        <p class="my-5 fs-5 lh-lg ">
                                            '.$event['body'] .'
                                        </p>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                    
                    </div>
                    </div>
                </div>
                </div>';
             
            }
           
            break;
        case 'meetings':
            $aMeetings = $data[$iKey];
            foreach ($aMeetings as $Key => $meeting) 
            {
                $iModalId = 'meetingModal'.$key;
                $txt = $meeting['title'] ? $meeting['title'] : '';
                $color = 'meeting';
                $days = 1;
                $date = $meeting['duedate'] ?  date('Y-m-d', strtotime($meeting['duedate'])) : '';
                $calendar->add_event($txt, date: $date, days: $days, color: $color, iModalId: $iModalId);
                echo '
                <div class="modal fade" id="'.$iModalId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    </div>
                    </div>
                </div>
                </div>';
            
            }

        break;
        case 'agendas':
            $aAgendas = $data[$iKey];
            foreach ($aAgendas as $Key => $agenda) 
            {
                $iModalId = 'agendaModal'.$key;
                $txt = $agenda['title'] ? $agenda['title'] : '';
                $color = 'agenda';
                $days = 1;
                $date = $agenda['duedate'] ? date('Y-m-d', strtotime($agenda['duedate'])) : '';
                $calendar->add_event( $txt, date: $date, days: $days, color: $color, iModalId: $iModalId);
                echo '
                <div class="modal fade" id="'.$iModalId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    </div>
                    </div>
                </div>
                </div>';
              
            }
         
        break;
        case 'projects':
            $aProjects = $data[$iKey];
            foreach ($aProjects as $Key => $project) 
            {
                $iModalId = 'projectModal'.$key;
                $txt = $project['title'];
                $color = 'project';
                $days = 1;
                $date =  $project['dueDate'] ? date('Y-m-d', strtotime($project['dueDate'])) : '' ;
                $calendar->add_event( $txt, date: $date, days: $days, color: $color, iModalId: $iModalId);
                echo '
                <div class="modal fade" id="'.$iModalId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    </div>
                    </div>
                </div>
                </div>';
             
            }
        break;
    
        case 'notices':
            $aNotice = $data[$iKey];
            foreach ($aNotice as $Key => $notice) 
            {
                $iModalId = 'noticeModal-'.$Key;
                $txt = $notice['title'];
              
                if( date("Y-m-d") > $notice['createdAt'] ){
                    $color = 'past';
                }else{
                    $color = 'notice';
                }
            
                $days = 1;
                $date = $notice['createdAt'] ? date('Y-m-d', strtotime($notice['createdAt'])) : '';
                $calendar->add_event( $txt, date: $date, days: $days, color: $color, iModalId: $iModalId);
                $link = ltrim($notice['location'],'.');
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                $sIframe = '';
                if(in_array(strtolower(pathinfo($link)['extension']),$allowed_extensions )){
                    $sIframe = ' <img src="' . url($link) . '" class="img-fluid" style="width: 50%;" alt="'. $notice['title'] .'">
                    ';
                }else{
                    $sIframe = '    <iframe
                    src="' . url($link) . '"
                    width="100%"
                    height="1000px"
                    loading="lazy"
                    title="PDF-file"
                ></iframe>';
                }

                echo '
                <div class="modal fade bd-example-modal-lg" id="'.$iModalId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">'.formatDate($date).'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      
                       
                             <div class="container content-section">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                                            '.$notice['title'].'
                                        </p>
                                        <p class="fs-3 my-2 text-yellow">
                                           '. $notice['subtitle'].'
                                        </p>
                                        <p class="text-secondary">
                                            created at: '. $notice['createdAt'] .'
                                        </p>

                                        <span class="py-3 mb-3">
                                            '.$link.'

                                           '.$sIframe.'
                                           
                                            </span>
                                        <p class="my-5 fs-4 lh-lg  ">
                                            '.$notice['body'] .'
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                    </div>
                </div>
                </div>';
               
            }
        break;

        case 'news':
            $aNews = $data[$iKey];
            foreach ($aNews as $Key => $news) 
            {
                $iModalId = 'newsModal'.$Key;
                $txt = $news['title'];
                if( date("Y-m-d") > $news['createdAt'] ){
                    $color = 'past';
                }else{
                    $color = 'news';
                }
 
                $days = 1;
                $date = $news['createdAt'] ? date('Y-m-d', strtotime($news['createdAt'])) : '';
                $calendar->add_event( txt: $txt, date: $date, days: $days, color: $color, iModalId: $iModalId);

                echo '
                <div class="modal fade" id="'.$iModalId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">'.$date.'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="container content-section">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                                        '. $news['title'] .'
                                    </p>
                                    <p class="fs-3 my-2 text-yellow">
                                      '.$news['subtitle'].'
                                    </p>
                                    <p class="text-secondary">
                                        created at: '. $news['createdAt'] .'
                                    </p>

                                    <span class="py-3 mb-3">
                                        <img src=" '. $news['location'] .'" class="img-fluid" style="width: 100%;" alt="'.$news['title'].'">
                                    </span>
                                    <p class="my-5 fs-5 lh-lg  ">
                                        '. $news['body'] .'
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    
                    </div>
                    </div>
                </div>
                </div>';
               
            }
        break;
            default:
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
          
                    <section class="py-5"><?php echo $calendar ?> </section>
        </div>
    </div>
</div>';



