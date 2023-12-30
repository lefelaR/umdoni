<?php
global $context;
$data = $context->data;
// array_column
?>

<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-docs-strip.jpg") ?>');
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
            <div class="col ">
            <p class="h1 m-5 fs-1 text-white">
                    Documents
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">

            </p>
            <p class="fw-lighter fs-3 my-5">
                Explore Our Repository of Key Municipal Documents
                Our Document Center is a dedicated space where you can access a wide range of important documents related to the functioning and governance of Umdoni Municipality
            </p>
        </div>
    </div>

    <div class="row align-items-center">

        <div class="col-md-4 my-1">
            <a href="<?php echo buildurl('documents/newsletters')?>">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Newsletters</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-4 my-1">
        <a href="<?php echo buildurl('documents/annualreports')?>">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Annual Reports</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </a>
        </div>

        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Ward Profile</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> IDP</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Policies & Bylaws</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Budget & Reporting</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Valuation Roll</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Internal Audit</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Council Minuts</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> Service Delivery Agreements</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-1">
            <div class="card">
                <div class="card-body">
                    <p class="h5"> LED</p>
                    <p class="fw-normal"> service description</p>
                </div>
            </div>
        </div>

    </div>

</div>