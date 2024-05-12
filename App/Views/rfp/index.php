<?php
global $context;
$data = $context->data;
// array_column
$currentRFPs = array();
$openRFPs = array();
$awardedRFPs = array();



foreach ($data as $rfpKey => $rfpValue) {
    
    switch ($rfpValue['status']) {
        case '1':
        array_push($currentRFPs, $rfpValue);
            break;
        
            case '2':
                array_push($openRFPs, $rfpValue);
                break;
        default:
            array_push($awardedRFPs, $rfpValue);
            break;
    }
}

?>

<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-business-strip.jpg") ?>');
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

    .table td p {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                    Business Opportunities
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">

            <p class="fw-lighter fs-3 my-5">
                Discover lucrative business prospects through our Tender Opportunities page. Explore curated tender opportunities from various industries. Stay informed about upcoming projects, contracts, and procurement opportunities. Unlock new avenues for growth and success.
            </p>
            <p class="h1 text-uppercase fw-normal">
                Request For Proposals
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class=" col-md-12 col-lg-12 col-sm-12">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                        <p class="fw-bold text-secondary">Current RFPs</p>
                    </button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <p class="fw-bold text-secondary">Open RFPs</p>
                    </button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                        <p class="fw-bold text-secondary">
                            Awarded RFPs</p>
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="mt-5">
                        <table class="table" id="table1">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Title
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Reference
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Created Date
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Closing Date
                                        </p>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php




                                foreach ($currentRFPs as $rfpKey => $currentRfp) {
                                    $rfpKey++;
                                    echo '
                                <tr>
                                    <th scope="row">
                                    <a class="text-secondary fw-bold" href="' . url($currentRfp['location']) . '" target="_blank">
                                     <i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i>
                                    </a>
                                    </th>
                                    <td>
                                    <a class="text-secondary fw-bold" href="' . url($currentRfp['location']) . '" target="_blank">' . $currentRfp["title"] . '</a>
                                    </td>
                                    <td>' . $currentRfp['reference'] . '</td>
                                    <td>'.$currentRfp['createdAt'].'</td>
                                    <td> ' . $currentRfp['dueDate'] . '</td>
                                </tr>
                                  ';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="mt-5">
                        <table class="table" id="table2">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Title
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Reference
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Created Date
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Closing Date
                                        </p>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($openRFPs as $openRfpkey => $openRfp) {
                                    $openRfpkey++;
                                    echo '
                                <tr>
                                    <th scope="row"><i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i></i>
                                    </th>
                                    <td>
                                        <a class="text-secondary fw-bold" href="' . url($openRfp['location']) . '" target="_blank">' . $openRfp["title"] . '</a>
                                    </td>
                                    <td>' . $openRfp['reference'] . '</td>
                                    <td>'.$openRfp['createdAt'].'</td>
                                    <td> ' . $openRfp['dueDate'] . '</td>
                                </tr>
                                  ';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                    <div class="mt-5">
                        <table class="table" id="table3">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Title
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Reference
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Created Date
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase ">
                                            Closing Date
                                        </p>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($awardedRFPs as $awardedRfpKey => $awardedRfp) 
                                {
                                    $awardedRfpKey++;
                                    echo '
                                <tr>
                                    <th scope="row"><i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i></i>
                                    </th>
                                    <td>
                                        <a class="text-secondary fw-bold" href="' . url($awardedRfp['location']) . '" target="_blank">' . $awardedRfp["title"] . '</a>
                                    </td>
                                    <td>' . $awardedRfp['reference'] . '</td>
                                    <td>'.$awardedRfp['createdAt'].'</td>
                                    <td> ' . $awardedRfp['dueDate'] . '</td>
                                </tr>
                                  ';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
