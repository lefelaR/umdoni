<?php
global $context;

$data = $context->data;


?>
<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Beach_strip1.jpg") ?>');
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

    .timeline {
        border-left: 1px solid hsl(0, 0%, 90%);
        position: relative;
        list-style: none;
    }

    .timeline .timeline-item {
        position: relative;
    }

    .timeline .timeline-item:after {
        position: absolute;
        display: block;
        top: 0;
    }

    .timeline .timeline-item:after {
        background-color: hsl(0, 0%, 90%);
        left: -38px;
        border-radius: 50%;
        height: 11px;
        width: 11px;
        content: "";
    }
</style>

<?php
echo '
<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                    Calendar
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="fw-lighter fs-3 my-5">
                Discover what`s happening in our town, Our `CALENDAR` feature simplified scheduling and planning. Find information about planned events, appointments, and deadlines.
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <div class=" col-md-12 col-lg-12 col-sm-12">

            <!-- <div class="card">
                <div class="card-body shadow-sm"> -->
                    <!-- Section: Timeline -->
                    <section class="py-5">

                        <ul class="timeline">';

if (count($data) > 0) {
    foreach ($data as $key => $calendar) {
        $today =  date("Y-m-d");
        if ($today < $calendar['dueDate']) {
            echo '
                             <li class="timeline-item mb-5">
                            <h5 class="fw-bold fs-3 text-secondary">' . $calendar['dueDate'] . '</h5>
                            <p class="text-muted mb-2 fs-4 text-primary">' . $calendar['title'] . '</p>
                            <div class="card">     
                            <div class="row">
                            <div class="col m-2">
                            <img src="' . $calendar["location"] . '" class="img-fluid rounded-start" style="    object-fit: cover;
                            height: 130px;">
                            </div>
                            <div class="col-md-10">
                            <p class="text-muted my-3">
                                ' . $calendar['body'] . '

                                </p>
                                </div>
                                </div>

                                </div>
                                </li>
                        ';
        }
    }
} else {
    echo '
                        <p class="fs-5">There are currently no calendar events</p>
                        ';
}
echo '
                        </ul>
                    </section>
        </div>
    </div>
</div>';
