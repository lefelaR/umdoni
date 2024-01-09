<?php
global $context;
$data = $context->data;
// array_column

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

    .table th p,.table td p {
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
        Tenders         
    </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class=" col-md-12 col-lg-12 col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">
                            <p class="text-uppercase text-primary">
                                Title
                            </p>
                        </th>
                        <th scope="col">
                            <p class="text-uppercase text-primary">
                                Reference
                            </p>
                        </th>
                        <th scope="col">
                            <p class="text-uppercase text-primary">
                                Closing Date
                            </p>
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php


                    foreach ($data as $key => $tender) {
                        $key++;

                        echo '
                    <tr>
                    <th scope="row"><i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i></i>
                    </th>
                    <td><a class="text-secondary fw-bold" href="' . $tender['location'] . '" target="_blank">' . $tender["title"] . '</a></td>
                    <td>' . $tender['reference'] . '</td>
                    <td>' . $tender['dueDate'] . '</td>
                   
                </tr>
                    ';
                    }

                    ?>


                </tbody>
            </table>

        </div>
    </div>
</div>