<?php
global $context;
$data = $context->data;
// array_column
$crumbs = getCrumbs();
$managers = $data['managers'];
?>

<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Boardroom_srip3.jpg") ?>');
        min-height: 40vh;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .card-body {
        padding: 0 !important;
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

    .card {

        border: 2px solid #A5A3A3;
    }

    .card-body {
        padding: 0 !important;
        width: auto;
        height: 13em;
        overflow: hidden;
    }

    .card-footer {
        min-height: 10em;
    }

    .card-footer p {
        line-height: 20px;
    }

    @media (max-width: 575.98px) {
        .card {
            width: auto;
            border: 1px solid #A5A3A3;
        }

        .card-body {
            padding: 0 !important;
            height: 16em;
            overflow: hidden;
        }

        .card-footer p {
            line-height: 22px;
        }
    }
</style>

<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                    Administration
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">

            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">

                    <?php

                    if (isset($crumbs)) {
                        foreach ($crumbs as $key => $crumb) {
                            if ($key == (count($crumbs) - 1)) {
                                $active = 'active';
                                echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
                            } else {
                                $active = '';
                                echo '<li class="breadcrumb-item ' . $active . '" aria-current="page"><a href="#" class="btn btn-sm btn-primary btn-outline" onclick="history.back()">' . $crumb . '</a></li>';
                            }
                        }
                    }

                    ?>
                </ol>
            </nav>

            <p class="fw-lighter fs-3 my-5">
                Umdoni Local Municipality has five departments, each headed by a General Manager reporting directly to the Municipal Manager.
                <br><br>
                The five departments within the organization are as follows:
            </p>
        </div>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <div id="flush-collapseTwo" class="accordion-collapse " data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-1 text-uppercase my-5">
                                Senior Management
                            </p>
                        </div>

                        <?php
                        foreach ($managers as $key => $sm) {

                            if (isset($sm['name'])) {
                                $smname =  substr($sm['name'], 0, 1);
                            }

                            if ($sm['category'] === 'SM') {
                                echo '
                                <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                    <div class="card text-center m-1 shadow" >
                                        <div class="card-body ">
                                            <img src="' . $sm['location'] . '" class="card-img-top" alt="municipal councelor">
                                        </div>
                                        <div class="card-footer">
                                        <p>
                                        <span class="fw-normal">' . $sm['title'] . '</span><br>
                                        <span class="fw-normal">' . $sm['initials'] . ' ' . $sm['name'] . ' ' . $sm['surname'] . '</span><br>
                                        <span class="fw-lighter">' . $sm['telephone'] . '</span><br>
                                        <span class="fw-lighter small fs-sm text-yellow">
                                        <a class="text-yellow" href= "mailto: ' . $sm['email'] . '"><i class="bi bi-envelope"></i></a>
                                        
                                        </span><br>
                                      
                                        </p>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Office of the municipal Manager
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $otmm) {

                            if (isset($otmm['name'])) {
                                $otmmName =  substr($otmm['name'], 0, 1);
                            }

                            if ($otmm['category'] === 'OTMM' || $otmm['category'] === 'CD') {
                                echo ' <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                            <div class="card text-center m-1 shadow" >
                                <div class="card-body ">
                                    <img src="' . $otmm['location'] . '" class="card-img-top" alt="municipal councelor">
                                </div>
                                <div class="card-footer">
                               <p>
                               <span class="fw-normal">' . $otmm['title'] . '</span><br>
                               <span class="fw-normal">' . $otmm['initials'] . ' ' . $otmm['name'] . ' ' . $otmm['surname'] . '</span><br>
                               <span class="fw-lighter">' . $otmm['telephone'] . '</span><br>
                               <span class="fw-lighter small fs-sm text-yellow">
                                        <a class="text-yellow" href= "mailto: ' . $otmm['email'] . '"><i class="bi bi-envelope"></i></a>
                                        
                                        </span>
                               <br>
                               
                               </p>
                            </div>
                            </div>
                            </div>';
                            }
                        }
                        ?>

                        <div class="col-md-12 col-lg-12 text-center">
                            <p class=""><span class="fw-bold"> Office of the Municipal Manager</span> - Consists of seven (7) key divisions:</p>
                            <ul>
                                <li class="list-group-item">Legal & Estates</li>
                                <li class="list-group-item">Internal Audit </li>
                                <li class="list-group-item">IDP & PMS</li>
                                <li class="list-group-item">Public Participation </li>
                                <li class="list-group-item">Special Programmes </li>
                                <li class="list-group-item">Youth Development </li>
                                <li class="list-group-item">Communications & Customer Care Relations </li>
                                <ul>
                        </div>
                    </div>

                    <hr style="border:2px solid black">
                    
                    <br>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Technical service department
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $tsd) {
                            if (isset($tsd['name'])) {
                                $tsdName =  substr($tsd['name'], 0, 1);
                            }
                            if ($tsd['category'] === 'TSD') {
                                echo ' <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                <div class="card text-center m-1 shadow">
                                    <div class="card-body ">
                                        <img src="' . $tsd['location'] . '" class="card-img-top" alt="municipal councelor">
                                    </div>
                                    <div class="card-footer">
                                   <p>
                                   <span class="fw-normal">' . $tsd['title'] . '</span><br>
                                   <span class="fw-normal">' . $tsd['initials'] . ' ' . $tsd['name'] . ' ' . $tsd['surname'] . '</span><br>
                                   <span class="fw-lighter">' . $tsd['telephone'] . '</span><br>
                                   <span class="fw-lighter small fs-sm text-yellow">
                                   <a class="text-yellow" href= "mailto: ' . $tsd['email'] . '"><i class="bi bi-envelope"></i></a>
                                   </span>
                                   <br>
                                    </p>  
                                </div>
                                </div>
                                </div>';
                            }
                        }
                        ?>

                        <div class="col-md-12 col-lg-12 text-center">
                            <p class=""><span class="fw-bold"> Technical Services Department</span> - Consists of four (4) key divisions:
                            </p>
                            <ul>
                                <li class="list-group-item">Project Management Unit</li>
                                <li class="list-group-item">Housing </li>
                                <li class="list-group-item">Solid Waste</li>
                                <li class="list-group-item">Roads & Storm water </li>
                                <ul>
                        </div>
                    </div>
                    <hr>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Corporate service department
                            </p>
                        </div>

                        <?php
                        foreach ($managers as $key => $cosd)
                        {
                            if (isset($cosd['name'])) {
                                $cosdName =  substr($cosd['name'], 0, 1);
                            }
                            if ($cosd['category'] === 'COSD') {
                                echo ' <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                <div class="card text-center m-1 shadow" >
                                    <div class="card-body ">
                                        <img src="' . $cosd['location'] . '" class="card-img-top" alt="municipal councelor">
                                    </div>
                                    <p>
                                    <span class="fw-normal">' . $cosd['title'] . '</span><br>
                                    <span class="fw-normal">' . $cosd['initials'] . ' ' . $cosd['name'] . ' ' . $cosd['surname'] . '</span><br>
                                    <span class="fw-lighter">' . $cosd['telephone'] . '</span><br>
                                    <span class="fw-lighter small fs-sm text-yellow">
                                    <a class="text-yellow" href= "mailto: ' . $cosd['email'] . '"><i class="bi bi-envelope"></i></a>
                                    
                                    </span>
                                    <br>
                                
                                    </p>  
                                </div>
                                </div>';
                            }
                        }
                        
                        ?>

                        <div class="col-md-12 col-lg-12 text-center">
                            <p class=""><span class="fw-bold"> Corporate Services Department</span> - Consists of four (4) key divisions:</p>
                            <ul>
                                <li class="list-group-item">Fleet Services
                                </li>
                                <li class="list-group-item">ICT </li>
                                <li class="list-group-item">Secretariat & Auxiliary Services</li>
                                <li class="list-group-item">Human Resources</li>
                                <ul>
                        </div>
                    </div>
                    <hr>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase mb-5">
                                Community service department
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $csd) {
                            if (isset($csd['name'])) {
                                $csdName = substr($csd['name'], 0, 1);
                            }
                            if ($csd['category'] === 'CSD') {
                                echo '
                                    <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                        <div class="card text-center m-1 shadow" >
                                            <div class="card-body">
                                                <img src="' . $csd['location'] . '" class="card-img-top" alt="municipal councelor">
                                            </div>
                                            <div class="card-footer">
                                            <p>
                                            <span class="fw-normal">' . $csd['title'] . '</span><br>
                                            <span class="fw-normal">' . $csd['initials'] . ' ' . $csd['name'] . ' ' . $csd['surname'] . '</span><br>
                                            <span class="fw-lighter">' . $csd['telephone'] . '</span><br>
                                            <span class="fw-lighter small fs-sm text-yellow">
                                            <a class="text-yellow" href= "mailto: ' . $csd['email'] . '"><i class="bi bi-envelope"></i></a>
                                            
                                            </span>
                                            <br>
                                           
                                            </p>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class=""><span class="fw-bold"> Community Services Department</span> - Consists of four (4) key divisions:</p>
                            <ul>
                                <li class="list-group-item">Protection Services</li>
                                <li class="list-group-item">Libraries </li>
                                <li class="list-group-item">Beaches</li>
                                <li class="list-group-item">Disaster Management Services </li>

                                <ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Planning & development departments
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $pdd) {
                            if (isset($pdd['name'])) {
                                $pddName =  substr($pdd['name'], 0, 1);
                            }
                            if ($pdd['category'] === "PDD") {

                                echo ' <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                    <div class="card text-center m-1 shadow" >
                                        <div class="card-body ">
                                            <img src="' . $pdd['location'] . '" class="card-img-top" alt="municipal councelor">
                                        </div>
                                        
                                        <div class="card-footer">
                                        <p>
                                        <span class="fw-normal">' . $pdd['title'] . '</span><br>
                                        <span class="fw-normal">' . $pdd['initials'] . ' ' . $pdd['name'] . ' ' . $pdd['surname'] . '</span><br>
                                        <span class="fw-lighter">' . $pdd['telephone'] . '</span><br>
                                        <span class="fw-lighter small fs-sm text-yellow">
                                        <a class="text-yellow" href= "mailto: ' . $pdd['email'] . '"><i class="bi bi-envelope"></i></a>
                                        
                                        </span>
                                        <br>
                                    
                                        </p>
                                    </div>
                                 </div>
                                </div>';
                            }
                        }
                        ?>

                        <div class="col-md-12 col-lg-12 text-center">
                            <p class=""><span class="fw-bold"> Planning & Development Department</span> - Consists of four (4) key divisions:</p>
                            <ul>
                                <li class="list-group-item">Building Control</li>
                                <li class="list-group-item">Planning </li>
                                <li class="list-group-item">Environmental Services</li>
                                <li class="list-group-item">LED </li>
                                <ul>
                        </div>
                    </div>
                    <hr>


                


               

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Treasury Department
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $fd) {
                            if (isset($fd['name'])) {
                                $fdName =  substr($fd['name'], 0, 1);
                            }
                            if ($fd['category'] === 'FM') {
                                echo ' <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                    <div class="card text-center m-1 shadow" >
                                <div class="card-body ">
                                    <img src="' . $fd['location'] . '" class="card-img-top" alt="municipal councelor">
                                </div>
                                <div class="card-footer">
                                <p>
                                    <span class="fw-normal text-truncate">' . $fd['title'] . '</span><br>
                                    <span class="fw-normal">' . $fd['initials'] . ' ' . $fd['name'] . ' ' . $fd['surname'] . '</span><br>
                                    <span class="fw-lighter">' . $fd['telephone'] . '</span><br>
                                    <span class="fw-lighter small fs-sm text-yellow">
                                    <a class="text-yellow" href= "mailto: ' . $fd['email'] . '"><i class="bi bi-envelope"></i></a>
                                    
                                    </span><br>
                                
                                </p>
                            </div>
                            </div>
                            </div>';
                            }
                        }
                        ?>

                        <div class="col-md-12 col-lg-12 text-center">
                            <p class=""><span class="fw-bold"> Treasury Department</span> - Consists of four (4) key divisions:</p>
                            <ul>
                                <li class="list-group-item">Budget</li>
                                <li class="list-group-item">SCM </li>
                                <li class="list-group-item">Expenditure</li>
                                <li class="list-group-item">Revenue </li>
                                <ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>