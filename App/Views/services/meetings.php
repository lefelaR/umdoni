<?php
global $context;
$data = $context->data;
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
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                    Meetings & Agendas
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">
                <!-- meetings & agendas -->
            </p>
            <p class="fw-lighter fs-3 my-5">
                This page is your gateway to understanding the inner workings of Umdoni Municipality. Here, you'll find detailed schedules, agendas, and minutes from various municipal meetings, including council sessions, committee discussions, and public forums. Our commitment to transparency and community involvement is reflected in providing these documents, which offer insights into decision-making processes, upcoming projects, and municipal governance. Stay engaged with local affairs by exploring this page for the latest meeting schedules and documented discussions. It's your direct line to the civic dialogue and actions shaping the future of Umdoni Municipality. </p>
        </div>

        <div class="col-md-6 my-2">

            <a href="<?php echo buildurl('meetings/index') ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-calendar-event fs-1 text-yellow"></i>
                            <p class="h5 m-3"> Meetings</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 my-2">
            <a href="<?php echo buildurl('agendas/index') ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex inline">

                            <i class="bi bi-book fs-1 text-yellow"></i>
                            <p class="h5 m-3"> Agendas</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</div>