<?php
global $context;
$data = $context->data;
// array_column
$currentTenders = array();
$openTenders = array();
$awardedTenders = array();


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


<?php

// array_column
$currentQuotations = array();
$openQuotations = array();
$awardedQuotations = array();



foreach ($data as $quotationkey => $quotaionValue) {
    
    switch ($quotaionValue['status']) {
        case '1':
        array_push($currentQuotations, $quotaionValue);
            break;
        
            case '2':
                array_push($openQuotations, $quotaionValue);
                break;
        default:
            array_push($awardedQuotations, $quotaionValue);
            break;
    }
}

?>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-normal">
                Quotations
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class=" col-md-12 col-lg-12 col-sm-12">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-away" type="button" role="tab" aria-controls="nav-away" aria-selected="true">
                        <p class="fw-bold text-secondary">Current Quotations</p>
                    </button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-record" type="button" role="tab" aria-controls="nav-record" aria-selected="false">
                        <p class="fw-bold text-secondary">Open Quotations</p>
                    </button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-ignore" type="button" role="tab" aria-controls="nav-ignore" aria-selected="false">
                        <p class="fw-bold text-secondary">
                            Awarded Quotations</p>
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-away" role="tabpanel" aria-labelledby="nav-away-tab" tabindex="0">
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
                                foreach ($currentQuotations as $currentQuotationkey => $currentQuotation) {
                                    $currentQuotationkey++;
                                    echo '
                                <tr>
                                    <th scope="row">
                                  
                                     <i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i>
                                    </a>
                                    </th>
                                    <td>
                                        <a class="text-secondary fw-bold" href="' . url($currentQuotation['location']) . '" target="_blank">' . $currentQuotation["title"] . '</a>
                                    </td>
                                    <td>' . $currentQuotation['reference'] . '</td>
                                    <td>'.formatDate($currentQuotation['createdAt']).'</td>
                                    <td> ' . $currentQuotation['dueDate'] . '</td>
                                </tr>
                                  ';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-record" role="tabpanel" aria-labelledby="nav-record-tab" tabindex="0">
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
                                foreach ($openQuotations as $openQuotationkey => $openQuotation) {
                                    $openQuotationkey++;
                                    echo '
                                <tr>
                                    <th scope="row"><i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i></i>
                                    </th>
                                    <td>
                                        <a class="text-secondary fw-bold" href="' .url($openQuotation['location']) . '" target="_blank">' . $openQuotation["title"] . '</a>
                                    </td>
                                    <td>' . $openQuotation['reference'] . '</td>
                                    <td>'.formatDate($openQuotation['createdAt']).'</td>
                                    <td> ' . $openQuotation['dueDate'] . '</td>
                                </tr>
                                  ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-ignore" role="tabpanel" aria-labelledby="nav-ignore-tab" tabindex="0">
                    <div class="mt-5">
                    <table class="table" id="table3">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <p class="text-uppercase">
                                            Title
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p class="text-uppercase">
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
                                foreach ($awardedQuotations as $awardedQuotationkey => $awardedQuotation) {
                                    $awardedQuotationkey++;
                                    echo '
                                <tr>
                                    <th scope="row"><i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i></i>
                                    </th>
                                    <td>
                                        <a class="text-secondary fw-bold" href="' . url($awardedQuotation['location']) . '" target="_blank">' . $awardedQuotation["title"] . '</a>
                                    </td>
                                    <td>' . $awardedQuotation['reference'] . '</td>
                                    <td>'.formatDate($awardedQuotation['createdAt']).'</td>
                                    <td> ' . $awardedQuotation['dueDate'] . '</td>
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