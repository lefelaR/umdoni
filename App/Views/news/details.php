<?php
global $context;
$data = $context->data;
// array_column
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
                    News
                </p>
            </div>
        </div>
    </div>
</div>


<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                <?php echo $data['title'] ?>
            </p>
            <p class="fs-3 my-2 text-yellow">
                <?php
                echo $data['subtitle'];
                ?>
            </p>
            <p class="text-secondary">
                created at: <?php echo $data['createdAt'] ?>
            </p>

            <span class="py-3 mb-3">
                <img src=" <?php echo $data['location'] ?>" class="img-fluid" style="width: 50%;" alt=" <?php echo $data['title'] ?>">
            </span>
            <p class="my-5 fs-4 lh-lg  ">
                <?php echo $data['body'] ?>
            </p>
        </div>
    </div>
</div>

</div>


<section