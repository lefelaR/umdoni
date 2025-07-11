<?php
global $context;
$data = $context->data;
// array_column


?>

<style>
     #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Building_strip.jpg") ?>');
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
                    COVID-19
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">

        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold text-secondary">
                Umdoni leadership undergoes COVID-19 testing and screening
            </p>
            <p class="fw-lighter fs-3 my-5">
                To kick-start the Department of Health’s Screening and Testing Programme that officially commences tomorrow, 14 April 2020, the Umdoni municipality’s EXCO councillors led by the Mayor, Cllr TW Dube underwent the COVID-19 screening.<br />
                <br />
                The Mayor was further tested to pave way for those who will be undergoing testing in an event that their screening process necessitates testing.<br />
                <br />
                The municipality’s leadership collectively urges members of the community to enthusiastically respond to the call of screening and testing as it is aimed at flattening the curve and ensuring that the Umdoni community collectively successfully rises above this pandemic.<br />
            </p>

            <ul class="">
                <li class="list-group-item">
                    <a href="https://www.nicd.ac.za/wp-content/uploads/2020/04/COVID-28-April-2020-3.jpg" class="fw-normal">COVID 19 NUMBERS IN SOUTH AFRICA </a>
                </li>
              
            </ul>
        </div>
        <div class="col-md-4 col-sm-12 col-lg-4 ">
            <img src="<?php echo url('assets/img/Mayor.jpg') ?>" class="d-block w-100 rounded" alt="...">
        </div>
        <div class="col-md-4 col-sm-12 col-lg-4 ">
            <img src="<?php echo url('assets/img/Speaker.jpg ') ?>" class="d-block w-100 rounded" alt="...">
        </div>
        <div class="col-md-4 col-sm-12 col-lg-4 ">
            <img src="<?php echo url('assets/img/DM.jpg') ?>" class="d-block w-100 rounded" alt="...">
        </div>
    </div>
</div>
</div>
