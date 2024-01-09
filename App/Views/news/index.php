<?php
global $context;
$data = $context->data;

?>
<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-news_strip1.jpg") ?>');
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

    .card-body h5 {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card-body p {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>


<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
            <p class="h1 m-5 fs-1 text-white ">
           News
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">
                
            </p>
            <p class="fw-lighter fs-3 my-5">
            Stay Informed About Your City &quot;up-to-date local government activities, events, and policies. Explore breaking news, community initiatives, and important announcements that impact your daily life. Your source for everything happening in your municipality.&quot;
            </p>
        </div>
    </div>


    <div class="row">
        <?php
        foreach ($data as $key => $value) {

        echo '
        <div class=" col-md-4 col-lg-4 col-sm-12">
        <a href="'.buildurl("news/details?id=".$value['id']).'">
            <div class="card mb-3 card-hover" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="'.$value["location"].'" class="img-fluid rounded-start" style="    object-fit: cover;
                    height: 130px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">'.$value["title"].'</h5>
                            <p class=" text-truncate">'.$value["body"].'</p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>';
        }

        ?>
        </div>
    </div>