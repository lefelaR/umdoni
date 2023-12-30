<?php
global $context;
$data = $context->data;

?>

<style>
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
                <p class="h1 m-5 fs-1">

                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">
                Newsletters
            </p>
        </div>
    </div>

    <div class="row align-items-center">

        <?php
        $newsletters = $data;
        foreach ($newsletters as $key => $newsletter) {
                if($newsletter['category'] === "NL"){
            echo '
                <div class="col-md-4 my-1">
                    <a href="details?id='.$newsletter['id'].'&category='.$newsletter['category'].'">
                    <div class="card">
                        <div class="card-body">
                            <p class="h5"> '.$newsletter['title'].'</p>
                            <p class="fw-normal"> '.$newsletter['subtitle'].'</p>
                        </div>
                    </div>
                    </a>
                </div>';
                }
        }
        ?>

    </div>
</div>