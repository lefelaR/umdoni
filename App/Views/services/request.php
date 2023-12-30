<?php

global $context;
$data = $context->data;

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

<?php


echo '
<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                Service Request
               </p>
            </div>
        </div>
    </div>
</div>
<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">
                Request municipality services form
            </p>
            <p class="fw-lighter fs-3 my-5">
            To get the help you need from your local municipality. Use &apos;Request Municipal Services&apos; form below to ask for assistance with essential city services like waste collection, utilities, permits, and more. It&apos;s your direct line to a better community experience
                 
              </p>
        </div>

        <div class="card shadow">
            <div class="card-body text-center m-3">
                <p class="h3 text-blue"> Municipal Services</p>
                <p class="fw-normal fs-5 text-secondary"> select municipal service type</p>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="mb-3 col-md-8">';

                 include ('Includes/parts/alerts.php');

echo '<form class="form" action="save" method="post">
                        <div class="row">
                            <div class="col-md-6">
                    
                            <label for="service" class="form-label">Service Type</label>
                                <input type="text" id="service" class="form-control" name="service" value="">
       
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3  col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Telephone</label>
                                <input type="number" id="telephone" class="form-control" name="telephone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <label for="comments" class="form-label">Comments</label>
                                <textarea name="comments"  name="comments" id="comments" class="form-control" rows="5"></textarea>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-auto my-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
</div>';
