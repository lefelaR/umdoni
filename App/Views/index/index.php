<?php
global $context;
$data = $context->data;
?>

<div class="hero" id="animate-area">
    <div class="jumbotron-content">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="watermark rounded animate__animated animate__fadeInLeft">
                    <p class="h1 text-white text-uppercase text-center m-3" style="font-size: 4em;">Welcome to Umdoni municipality</p>
                    <p class=" text-white  text-wrap text-justify fw-lighter subtitle" style="font-size: 2em;">Umdoni local municipality is located in Kwazulu-Natal within the Ugu District Municipality (DC21). It consists of 19 wards.
                        It abuts eThekwini Metro to the North. and uMzumbe to the south, Making it almost halfway from port shepstone and Durban.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container" id="Services">
    <div class="row content-section">

        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("services/request") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <div class="text-center m-2">
                            <i class="bi bi-people fs-1 text-yellow"></i>
                        </div>
                        <p class="h5 my-3 fw-bold text-center text-blue">Request Municipal Services</p>
                        <p class="card-text text-secondary text-center">Popular municipal services, like unwanted objects, graffiti.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("departments/index") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <div class="text-center m-2">
                            <i class="bi bi-clipboard-data fs-1 text-yellow"></i>
                        </div>
                        <p class="h5 my-3 fw-bold text-blue  text-center ">Municipal Departments</p>
                        <p class="card-text text-secondary text-center">Contacts for the municipal officials and departments.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("tenders/index") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <div class="text-center m-2">
                            <i class="bi bi-gear fs-1 text-yellow"></i>
                        </div>
                        <p class="h5 my-3 fw-bold text-blue text-center ">Tenders</p>
                        <p class="card-text text-secondary text-center">Explore curated tender opportunities from various industries.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("services/meetings") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <div class="text-center mx-2">
                            <i class="bi bi-calendar2-date fs-1 text-yellow"></i>
                        </div>
                        <p class="h5 my-3 fw-bold text-blue text-center ">Meetings and Agendas</p>
                        <p class="card-text text-secondary text-center">Municipal council and commitee meetings and agendas.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Council leadership -->

<div class="container-fluid bg-picture pb-5  parallax d-table" id="Councillors">
    <div class="row">
        <div class="text-center">
            <p class="my-5 fw-bold fs-1 text-yellow text-uppercase "> Know your councillors</p>
        </div>
    </div>

    <div class="row align-items-center justify-content-center">
    <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="card text-center m-1 card-hover">
                <div class="card-body">
                    <img src="<?php echo url("assets/img/COUNCILLORS/Mayor.png") ?>" class="card-img-top" alt="municipal councelor">
                </div>
                <p class="fw-bold text-secondary text-uppercase fs-3 lh-1">Mayor</p>
                <p class="fw-normal  fs-5 lh-1">Cllr MJ Cele-Luthuli</p>

            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12">
            <div class="card text-center m-1 card-hover">
                <div class="card-body">
                    <img src="<?php echo url("assets/img/COUNCILLORS/Deputymayor.png") ?>" class="card-img-top" alt="municipal councelor">
                </div>
                <p class="fw-bold text-secondary text-uppercase fs-3 lh-1">Deputy Mayor</p>
                <p class="fw-normal  fs-5 lh-1">Cllr P Thabethe</p>

            </div>
        </div>
    
        <div class="col-lg-2 col-md-6 col-sm-12 ">
            <div class="card text-center m-1 card-hover">
                <div class="card-body">
                    <img src="<?php echo url("assets/img/COUNCILLORS/Speaker.png") ?>" class="card-img-top" alt="municipal councelor">
                </div>  

                <p class="fw-bold text-secondary text-uppercase fs-3 lh-1">SPEAKER</p>
                <p class="fw-normal  fs-5 lh-1">Cllr ME Mbutho</p>
            </div>
        </div>

    </div>
</div>

<div class="container content-section " id="Calendar">
    <p class="text-left h1 fw-bold text-yellow text-uppercase pb-2">CALENDAR & EVENTS</p>
    <div class="row mt-5 text-center">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("projects/index") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <i class="bi bi-tools fs-1 m-3 text-yellow "></i>
                        <p class="h5 fw-bold text-blue">Projects</p>
                        <p class="fw-normal p-1 text-secondary"> Popular City Services like trash pickup & graffiti removal</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("events/index") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <i class="bi bi-chat-quote fs-1 m-3 text-yellow"></i>
                        <p class="h5 fw-bold text-blue">Events</p>
                        <p class="fw-normal p-1 text-secondary">Contacts of the Municipal officials & departments</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("notices/index") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <i class="bi bi-info-circle fs-1 m-3 text-yellow"></i>
                        <p class="h5 fw-bold text-blue">Notices</p>
                        <p class="fw-normal p-1 text-secondary">For notices, announcements and more</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="<?php echo buildurl("documents/index") ?>">
                <div class="card card-hover mb-3 card-border">
                    <div class="card-body">
                        <i class="bi bi-journals fs-1 text-yellow"></i>
                        <p class="h5 fw-bold text-blue">Documents Library</p>
                        <p class="fw-normal p-1 text-secondary">Access important documents related to Umdoni Municipality.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>



<div class="container content-section">
    <div class="row mt-5">
        <div class="col">
            <div class="alert alert-primary text-center card-hover">
                <p class="fw-bold">ANTI FRAUD AND CORRUPTION HOTLINE: 0801 111 660 – information@whistleblowing.co.za- Fax: 086 5222 816 – P.O. Box 51006, Musgrave, 4001</p>
                <p class="">UMDONI DISASTER MANAGEMENT CENTRE: (039) 974 6200</p>
                <p class="">UGU DISTRICT DISASTER MANAGEMENT CENTRE: (039) 682 2414</p>
            </div>
        </div>
    </div>
</div>



<div class="container content-section " id="News">
    <p class="text-left h1 fw-bold text-uppercase text-yellow pb-2">Trending News</p>
    <?php 
        $trendingNews = $data['news']; 
    ?>
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12 text-left pt-5">
             <?php
            foreach ($trendingNews as $key => $news) {
                if ($key <= 2) {
                    echo '        
                    <div class="card mb-3" style="max-width: 540px;">
                    <a href="' . buildurl("news/details?id=" . $news['id']) . '" ">
                        <div class="row g-0">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-sx-12" style="    max-height: 11em;
    display: flex
;">
                                <img src="' . $news["location"] . '" class="img-fluid rounded-start" style="object-fit: cover;">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="card-body">
                                    <h5 class="fs-6 text-black text-capitalize">' . $news["title"] . '</h5>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>';
                }
            }
            ?> 

            <p class="text-primary fs-5 text-end"><a href="<?php echo buildurl("news/index") ?>">See More</a></p>
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 text-left pt-5">
            <video autoplay loop muted plays-inline class="news-video">
                <source src="<?php echo url("assets/img/Umdoni Local Municipality.mp4") ?>" type="video/mp4">
            </video>
        </div>
    </div>
</div>


<div class="container content-section" id="partners">
    <p class="text-left h1 fw-bold text-uppercase text-yellow pb-2">Partners</p>
    <div class="row my-5 pt-5 mx-auto">
        <div class="col-md-2 col-sm-12 col-lg-2 text-center">
            <a href="http://www.ugu.gov.za" target="_blank">
            <div class="m-1">
                <img src="<?php echo url('assets/img/partners/ugu.jpg') ?>" class="img-thumbnail mx-auto" alt="ugu" />
            </div>
            </a>
        </div>

        <div class="col-md-2 col-sm-12 col-lg-2 text-center">
            <a href="http://www.umzumbe.gov.za" target="_blank">
            <div class="m-1">
                <img src="<?php echo url('assets/img/partners/mzumbe.png') ?>" class="img-thumbnail mx-auto" alt="ugu" />
            </div>
            </a>
        </div>
        <div class="col-md-2 col-sm-12 col-lg-2 text-center">
            <a href="http://www.rnm.gov.za" target="_blank">
            <div class="m-1">
                <img src="<?php echo url('assets/img/partners/ray-nkonyana.png') ?>" class="img-thumbnail mx-auto" alt="ugu" />
            </div>
            </a>
        </div>
        <div class="col-md-2 col-sm-12 col-lg-2 text-center">
            <a href="https://www.umuziwabantu.gov.za/" target="_blank">
            <div class="m-1">
                <img src="<?php echo url('assets/img/partners/umzi.png') ?>" class="img-thumbnail mx-auto" alt="ugu" />
            </div>
            </a>
        </div>
        <div class="col-md-2 col-sm-12 col-lg-2 text-center">
            <a href="https://uscda.org.za/" target="_blank">
            <div class="m-1">
                <img src="<?php echo url('assets/img/partners/uscda.jpg') ?>" class="img-thumbnail mx-auto" alt="ugu" />
            </div>
            </a>
        </div>
        <div class="col-md-2 col-sm-12 col-lg-2 text-center">
            <a href="https://www.sctie.co.za/" target="_blank">
            <div class="m-1">
                <img src="<?php echo url('assets/img/partners/south-coast-tourism.jpg') ?>" class="img-thumbnail mx-auto" alt="ugu" />
            </div>
            </a>
        </div>
    </div>
</div>