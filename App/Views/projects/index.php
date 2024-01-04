
<?php
global $context;
$data = $context->data;

?>

<style>
 #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Projects-strip.jpg") ?>');
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
nav{
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
nav ul li a{
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
               Projects
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">
                Municipal Projects
            </p>
            <p class="fw-lighter fs-3 my-5">
            Explore Community Initiatives: 'MUNICIPAL PROJECTS' offers insight into ongoing and upcoming undertakings in your municipality. Discover how local projects are enhancing your neighborhood, from infrastructure improvements to community development.
            </p>
        </div>

        <?php
        foreach ($data as $key => $value) {
            
            echo'
        <div class=" col-md-4 col-lg-4 col-sm-12">
            <a href="'.buildurl("projects/details?id=".$value['id']).'">
                <div class="card mb-3 card-hover" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="'.$value["location"].'" class="img-fluid rounded-start" alt="..." width="500px" height="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">'.$value["title"].'</h5>
                                <p class=" text-truncate">'.$value["subtitle"].'</p>
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

<section