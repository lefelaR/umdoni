<?php
global $context;
$data = $context->data;
// array_column
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
                <?php
                
                $link = ltrim($data['location'],'.');
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                if(in_array(strtolower(pathinfo($link)['extension']),$allowed_extensions )){
                    echo ' <img src="' . url($link) . '" class="img-fluid" style="width: 50%;" alt="'. $data['title'] .'">
                    ';
                }else{
                echo '    <iframe
                    src="' . url($link) . '"
                    width="100%"
                    height="1000px"
                    loading="lazy"
                    title="PDF-file"
                ></iframe>';
                }
                
                
                ?>
                 </span>
            <p class="my-5 fs-4 lh-lg  ">
                <?php echo $data['body'] ?>
            </p>
        </div>
    </div>
</div>

</div>


<section