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
                    Vacancies
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">

            <!-- <p class="fw-lighter fs-3 my-5">
                Discover lucrative business prospects through our Tender Opportunities page. Explore curated tender opportunities from various industries. Stay informed about upcoming projects, contracts, and procurement opportunities. Unlock new avenues for growth and success.
            </p> -->
            <p class="h1 text-uppercase fw-normal">
                Vacancies
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class=" col-md-12 col-lg-12 col-sm-12">

           
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
                                            Closing Date
                                        </p>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $vacancy) {
                                    $key++;
                                    echo '
                                <tr>
                                    <th scope="row">
                                     <a class="text-secondary fw-bold" href="' . url($vacancy['location']) . '" target="_blank">
                                     <i class="bi bi-cloud-arrow-down-fill fs-5 text-yellow"></i>
                                    </a>
                                    </th>
                                    <td>
                                   <a class="text-secondary fw-bold" href="' . url($vacancy['location']) . '" target="_blank">' . $vacancy["title"] . '</a>
                                    </td>
                                    <td>' . $vacancy['reference'] . '</td>
                                    <td> ' . $vacancy['duedate'] . '</td>
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
