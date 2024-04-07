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
                    Finance Services
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
    

            <p class="h1 text-uppercase fw-bold text-secondary">
                CFO : Ms T Mhlongo
            </p>

            <p class="fw-lighter fs-3 my-5">
                The Department Financial Services consists of two branches namely, Expenditure and Income, which are further divided into various divisions and sections to cover the spectrum of related functions and actions being delivered to the community.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 mx-auto">

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">BILLING, REPORTING, TARIFF MAINTENANCE AND METERED SERVICES </p>
                    </div>
                    <ul>
                        <li>Reporting (Reports published on Council Website and transmitted to Government Entities).</li>
                        <li>Statistics (Reports published on Council Website and transmitted to Government Entities).</li>
                        <li>Billing</li>
                        <li>Account production and processing.</li>
                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">CUSTOMER RELATION MANAGEMENT</p>
                    </div>
                    <ul>
                        <li>Enquiries & Correspondence</li>
                        <li>Processing of opening, termination of consumer accounts</li>
                        <li>Refund Requests on terminated & active accounts</li>
                        <li>Accounts Enquiries, telephones enquires and act as Advisory desk</li>
                        <li>Handling of all incoming and outgoing correspondence with regards to account enquiries (correspondence)</li>
                        <li>Cashiers & Super-vending</li>
                        <li>Prepayment sales, Accounts payments</li>
                        <li>Balancing, Banking & Handling of cash related enquiries</li>
                        <li>Third party vending</li>
                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">CREDIT CONTROL, DEBT COLLECTION, AND INDIGENT SUPPORT</p>
                    </div>
                    <ul>
                        <li>Handling of Arrears Accounts</li>
                        <li>Performing the following Credit Control actions in respect of customers with arrear accounts</li>
                        <li>Sending SMS & final request messages</li>
                        <li>Performing Electricity Disconnections & Water Restrictions</li>
                        <li>Raising Credit Control Charges on Debtor accounts</li>
                        <li>Performing Debt Collection actions including sending final Demand Notices</li>
                        <li>Raising Debt Collection Charges on Debtor accounts</li>
                        <li>Liaising with all types of customers regarding payment of their accounts</li>
                        <li>Managing the Indigent Register & Performing Investigations to confirm the Indigency status of customers</li>
                        <li>Reporting to Council & National Treasury</li>
                    </ul>
                </a>
            </div>
        </div>
    </div>
</div>