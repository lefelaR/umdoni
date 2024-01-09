<?php
global $context;

$data = $context->data;


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


    
    #service-page p{
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
                Discover what's happening in our town, Our 'CALENDAR' feature simplified scheduling and planning. Find information about planned events, appointments, and deadlines.
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class=" col-md-12 col-lg-12 col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date/Time</th>
                        <th scope="col">Documents</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
      <tbody>
                <?php
                
                
                foreach ($data as $key => $calendar) {
                  
                    $key ++;

                    echo'
                    <tr>
                    <th scope="row">'.$key.'</th>
                    <td>'.$calendar["title"].'</td>
                    <td>3 mins ago</td>
                    <td> <i class="bi bi-file-earmark-text"></i>
                    '.$calendar["img_file"].'</td>
                    <td>
                       <a href="details?id='.$calendar["id"].'">More...</a>
                    </td>
                </tr>
                    ';

                }
                
                ?>
          
                
                </tbody>
            </table>
            
        </div>
    </div>

</div>
