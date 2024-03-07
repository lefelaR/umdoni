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
                Welcome to the Municipal Administration page. Here you will find information on the key personnel responsible for the daily operations and management of our municipality.
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
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                            <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;"  >
                                <div class="card-body ">
                                    <img src="' . $sm['location'] . '" class="card-img-top" alt="municipal councelor">
                                </div>
                                <p class="fw-bold text-uppercase fs-5 lh-1">' . $sm['title'] . '</p>
                                <p class="fw-normal text-capitalize fs-5 lh-1"> ' . $sm['initials'] . ' ' . $sm['name'] . " " . $sm['surname'] . '</p>
                            </div>
                            </div>';
                            }
                        }
                        ?>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                        <p class="fs-1 text-uppercase mt-5">
                            Extended Management
                        </p>   
                        </div>

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
                                    <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                                        <div class="card text-center m-1 shadow" style="width: 18rem; border: 4px solid #A5A3A3;">
                                            <div class="card-body">
                                                <img src="' . $csd['location'] . '" class="card-img-top" alt="municipal councelor">
                                            </div>
                                            <p class="fw-bold text-uppercase fs-5 lh-1">' . $csd['title'] . '</p>
                                            <p class="fw-normal text-capitalize fs-5 lh-1"> ' . $sm['initials'] . ' ' . $csd['name'] . " " . $csd['surname'] . '</p>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                    </div>

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

                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                                    <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;">
                                        <div class="card-body ">
                                            <img src="' . $pdd['location'] . '" class="card-img-top" alt="municipal councelor">
                                        </div>
                                        <p class="fw-bold text-uppercase fs-5 lh-1">' . $pdd['title'] . '</p>
                                        <p class="fw-normal text-capitalize fs-5 lh-1">' . $sm['initials'] . ' ' . $pdd['name'] . " " . $pdd['surname'] . '</p>  
                                    </div>
                                 </div>';
                            }
                        }
                        ?>
                    </div>
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
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                                <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;">
                                    <div class="card-body ">
                                        <img src="' . $tsd['location'] . '" class="card-img-top" alt="municipal councelor">
                                    </div>
                                    <p class="fw-bold text-uppercase fs-5 lh-1">' . $tsd['title'] . '</p>
                                    <p class="fw-normal text-capitalize fs-5 lh-1"> ' . $sm['initials'] . ' ' . $tsd['name'] . " " . $tsd['surname'] . '</p>  
                                </div>
                                </div>';
                            }
                        }
                        ?>
                    </div>



                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Corporate service department
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $csd) {
                            if (isset($csd['name'])) {
                                $csdName =  substr($csd['name'], 0, 1);
                            }
                            if ($csd['category'] === 'CSD') {
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                                <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;">
                                    <div class="card-body ">
                                        <img src="' . $csd['location'] . '" class="card-img-top" alt="municipal councelor">
                                    </div>
                                    <p class="fw-bold text-uppercase fs-5 lh-1">' . $csd['title'] . '</p>
                                    <p class="fw-normal text-capitalize fs-5 lh-1"> ' . $sm['initials'] . ' ' . $csd['name'] . " " . $csd['surname'] . '</p>  
                                </div>
                                </div>';
                            }
                        }
                        ?>
                    </div>



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
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                            <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;">
                                <div class="card-body ">
                                    <img src="' . $otmm['location'] . '" class="card-img-top" alt="municipal councelor">
                                </div>
                                <p class="fw-bold text-uppercase fs-5 lh-1">' . $otmm['title'] . '</p>
                                <p class="fw-normal text-capitalize fs-5 lh-1"> ' . $sm['initials'] . ' ' . $otmm['name'] . " " . $otmm['surname'] . '</p>  
                            </div>
                            </div>';
                            }
                        }
                        ?>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-5 text-uppercase my-5">
                                Finance department
                            </p>
                        </div>
                        <?php
                        foreach ($managers as $key => $fd) {
                            if (isset($fd['name'])) {
                                $fdName =  substr($fd['name'], 0, 1);
                            }
                            if ($fd['category'] === 'FM') {
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                                    <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;">
                                <div class="card-body ">
                                    <img src="' . $fd['location'] . '" class="card-img-top" alt="municipal councelor">
                                </div>
                                <p class="fw-bold text-uppercase fs-5 lh-1">' . $fd['title'] . '</p>
                                <p class="fw-normal text-capitalize fs-5 lh-1">' . $sm['initials'] . ' ' . $fd['name'] . " " . $fd['surname'] . '</p>  
                            </div>
                            </div>';
                            }
                        }
                        ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>

</div>