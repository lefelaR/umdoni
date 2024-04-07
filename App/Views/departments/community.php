<?php
$crumbs = getCrumbs();
?>


<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Beach_strip2.jpg") ?>');
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
                    Community Service Department
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
                Most of the functions of this unit are routine repetitive operations which include maintenance of the Municipal Parks & Gardens, establishment and maintenance of recreational facilities including Beaches. Maintenance of Community Halls, overall management of Libraries as well as Public Safety through the Municipal Traffic and Policing Section and Fire & Disaster Management. </p>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-12 mx-auto">


            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Parks & Gardens </p>
                    </div>
                    <ul>
                        <li>Parks & Gardens </li>
                        <li>Road Verges</li>
                        <li>Traffic Islands</li>
                        <li>Recreational Areas</li>
                        <li>Other public open spaces</li>
                        <li>Provision & Maintenance of Cemetery Space</li>
                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Community Facilities</p>
                    </div>
                    <ul>
                        <li>Provision and Maintenance of Sport Facilities & Amenities </li>
                        <li>Processing of opening, termination of consumer accounts</li>
                        <li>Provision and Maintenance of public libraries</li>

                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Municipal Traffic & Policing</p>
                    </div>
                    <ul>
                        <li> General Law Enforcement</li>
                        <li>Attending to Incidents and Accidents</li>
                        <li>Monitor school points and conduct Scholar patrol programmes</li>
                        <li>Regulate Traffic flow</li>
                        <li>Escort abnormal loads</li>
                        <li> Offer VIP Protection, escorts and assist in events security.</li>

                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Vehicle Licensing</p>
                    </div>
                    <ul>
                        <li> Testing for and issuing of Learners Licence</li>
                        <li>Drivers Licence renewals on behalf of Department of Transport</li>
                        <li> Vehicle Registrations and Licensing on behalf of Department of Transport</li>
                        <li>Receipt and Processing of payments in respect of Fines resulting from Traffic infringements and all other traffic related matters</li>


                    </ul>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Fire & Disaster </p>
                    </div>
                    <ul>
                        <li>Responding to Fire Calls</li>
                        <li>Responding to Accidents</li>
                        <li> Responding to Chemical Spillage</li>
                        <li>Assists in compilation of District Disaster Management Plan</li>
                        <li>Conduction Awareness Campaigns in Schools</li>
                        <li>Evaluate emergency exercises at various industries, hospitals, schools, municipal depots and Businesses </li>

                    </ul>
                </a>
            </div>
        </div>
    </div>
</div>