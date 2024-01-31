<?php
global $context;
$data = $context->data;
// array_column
$councillors  = $data['councillors'];
$managers = $data['managers'];
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
                    Council
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-normal">
                <!-- Councillors -->
                Meet Your Local City Representatives introducing you to the dedicated honourable members working for your community. Learn about their roles, achievements, and how they're shaping the future of your municipality.
            </p>
            <p class="fw-lighter fs-3 my-5">
                Umdoni Municipality comprises of 37 Councillors, seven which are full time councillors that serve on the Umdoni Council. The Executive Committee (EXCO) is made of the Mayor, Deputy Mayor & 1 Member reports directly to Council. EXCO is chaired by Her Worship, The Mayor Cllr. ST KHATHI. The Speaker is the ex-officio member of all committees of Council and the Chairperson of Council Meetings. All members of EXCO & the Speaker are full time Councillors.
            </p>
        </div>
    </div>



    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    <p class="text-uppercase h5 my-3 fw-bold text-blue ">councillors</p>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse " data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-1 text-uppercase my-5">
                                Exco Member
                            </p>
                        </div>

                        <?php
                        foreach ($councillors as $key => $exco) {

                            if (isset($exco['name'])) {
                                $name =  substr($exco['name'], 0, 1);
                            }
                            // data-bs-toggle="modal" data-bs-target="#councillorModal"
                            if ($exco['category'] === 'EXCO') {
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                        <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;"  >
                            <div class="card-body ">
                                <img src="' . $exco['location'] . '" class="card-img-top" alt="municipal councelor">
                            </div>
                            <p class="fw-bold text-uppercase fs-5 lh-1">' . $exco['title'] . '</p>
                            <p class="fw-normal text-capitalize fs-5 lh-1"> Cllr &nbsp;' . strtoupper($name) . " " . $exco['surname'] . '</p>
                        </div>
                        </div>';
                            }
                        }
                        ?>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-1 text-uppercase my-5">
                                PR Councillors
                            </p>
                        </div>

                        <?php

                        foreach ($councillors as $key => $pr) {
                            if (isset($pr['name'])) {
                                $prName =  substr($pr['name'], 0, 1);
                            }

                            if ($pr['category'] === 'PR') {
                                echo ' <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                            <div class="card text-center m-1 shadow" style="width: 18rem;border: 4px solid #A5A3A3;">
                                <div class="card-body ">
                                    <img src="' . $pr['location'] . '" class="card-img-top" alt="municipal councelor">
                                </div>
                                <p class="fw-bold text-uppercase fs-5 lh-1">' . $pr['title'] . '</p>
                                <p class="fw-normal text-capitalize fs-5 lh-1"> Cllr &nbsp;' . strtoupper($prName) . " " . $pr['surname'] . '</p>  
                            </div>
                            </div>';
                            }
                        }
                        ?>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-1 text-uppercase my-5">
                                Ward Councillors
                            </p>
                        </div>
                        <?php
                        foreach ($councillors as $key => $ward) {
                            if (isset($ward['name']) && $ward['category'] == 'WARD') {

                                $wardName = substr($ward['name'], 0, 1);
                                echo '
                            <div class="col-md-4 col-lg-3 col-sm-12 my-1">
                                <div class="card text-center m-1 shadow" style="width: 18rem; border: 4px solid #A5A3A3;">
                                    <div class="card-body">
                                        <img src="' . $ward['location'] . '" class="card-img-top" alt="municipal councelor">
                                    </div>
                                    <p class="fw-bold text-uppercase fs-5 lh-1">' . $ward['title'] . '</p>
                                    <p class="fw-normal text-capitalize fs-5 lh-1"> Cllr &nbsp;' . strtoupper($wardName) . " " . $ward['surname'] . '</p>
                                </div>
                            </div>';
                            }
                        }
                        ?>
                    </div>

                 
                </div>
            </div>
        </div>
        
       
    </div>


</div>





</div>



<script>
  var accordions = document.querySelectorAll('.accordion-button');
  debugger
  accordions.forEach(function (accordion) {
    accordion.addEventListener('click', function () {
      var collapse = this.getAttribute('data-bs-target');
      var parent = this.getAttribute('data-bs-parent');
      
      if (collapse && parent) {
        var parentElement = document.querySelector(parent);
        var collapses = parentElement.querySelectorAll('.collapse');
        
        collapses.forEach(function (item) {
          if (item.id !== collapse.substring(1)) {
            var bsCollapse = new bootstrap.Collapse(item);
            bsCollapse.hide();
          }
        });
      }
    });
  });
</script>