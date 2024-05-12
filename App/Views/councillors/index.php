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

            <p class="fw-lighter fs-3 my-5 justify-content-center">
                Meet Your Local City Representatives introducing you to the dedicated honourable members working for
                your community. Learn about their roles, achievements, and how they're shaping the future of
                your municipality.
                Umdoni Local Municipality is located in KwaZulu-Natal within the Ugu District Municipality (DC21). Our local municipality consists of 19 wards. It abuts eThekwini Metro to the north, and uMzumbe to the south, making it almost halfway from Port Shepstone and Durban. The Municipality is therefore conveniently located about 50 km from Durban and 65 km from Port Shepstone. UMdoni has an approximate coastline of 40 km and stretches inland as far as uMzinto.
                <br>
                <br>
                The municipality incorporates 7 traditional authority areas. The traditional Authorities falls under Ugu Local Houses of Traditional Leaders in KZN. The Local House has its own vision, mission, and strategic focus areas, depending on the development programmes of its community. The Ugu Local House is governed by the Traditional Leadership and Governance Framework Act, 41 of 2003, and the KZN Traditional Leadership and Governance Act, 5 of 2005. These two pieces of legislation ensure alignment of the institution of traditional leadership in KZN with constitutional imperatives. UMdoni Council comprises of 19 ward Councillors and 18 Proportional Representative Councillors.
                <br>
                <br>
                UMdoni Municipality has a total population of approximately 144, 551 which constitutes of 74,924 of that population being female and 69, 627 being male from the total population. The Municipality also has a total number of 35, 433 of households. These statistics are based on the 2011 Census undertaken by Statistics South Africa.
            </p>
    </div>
</div>

    <div class="row justify-content-center">
        
    <div class="col-md-3 my-2 secondary " data-toggle="tooltip" data-placement="top" title="This link has been disabled while the page is being updated!">
                <a href="<?php #echo buildurl('councillors/exco') ?>" disabled>
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex inline">
                                <!-- <i class="bi bi-globe fs-1 text-yellow m-3"></i> -->
                                <i class="bi bi-globe fs-1 text-secondary m-3"></i>
                                <p class="h5 my-auto p-2">Exco</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 my-2" data-toggle="tooltip" data-placement="top" title="This link has been disabled while the page is being updated!">
                <a href="<?php #echo buildurl('councillors/council') ?>">
                    <!-- <div class="card card-hover"> -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex inline">
                                <!-- <i class="bi bi-globe fs-1 text-yellow m-3"></i> -->
                                <i class="bi bi-globe fs-1 text-secondary m-3"></i>
                                <p class="h5 my-auto p-2">Council</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 my-2" data-toggle="tooltip" data-placement="top" title="This link has been disabled while the page is being updated!">
                <a href="<?php #echo buildurl('councillors/administration') ?>">
                    <!-- <div class="card card-hover"> -->
                    <div class="card">
                        <div class="card-body" >
                            <div class="d-flex inline">
                                <!-- <i class="bi bi-globe fs-1 text-yellow m-3"></i> -->
                                <i class="bi bi-globe fs-1 text-secondary m-3"></i>
                                <p class="h5 my-auto p-2"> Administration</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 my-2" data-toggle="tooltip" data-placement="top" title="This page is still under consruction">
            <a href="<?php #echo buildurl('councillors/administration') ?>" disbaled>
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-globe fs-1 text-secondary m-3"></i>
                            <p class="h5 my-auto p-2"> Administration</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>