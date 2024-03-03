<?php
global $context;
$data = $context->data;


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
                    Leadership
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <!-- <p class="h1 text-uppercase fw-normal">
               
              </p> -->
            <p class="fw-lighter fs-3 my-5">
                Meet Your Local City Representatives introducing you to the dedicated honourable members working for your community. Learn about their roles, achievements, and how they're shaping the future of your municipality.

            </p>
        </div>
    </div>


    <!-- place code here -->
    <div class="row justify-content-center">
        
            <div class="col-md-3 my-2">
                <a href="<?php echo buildurl('councillors/council') ?>">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex inline">
                                <i class="bi bi-globe fs-1 text-yellow m-3"></i>
                                <p class="h5 my-auto p-2">Council</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 my-2">
                <a href="<?php echo buildurl('councillors/administration') ?>">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex inline">
                                <i class="bi bi-globe fs-1 text-yellow m-3"></i>
                                <p class="h5 my-auto p-2"> Administration</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

    </div>

</div>