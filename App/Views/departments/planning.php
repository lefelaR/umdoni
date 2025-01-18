<?php
$crumbs = getCrumbs();
?>
<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Beach_strip2.jpg") ?>');
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
                    Planning & Development
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">

        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <?php
                    if (isset($crumbs)) {
                        foreach ($crumbs as $key => $crumb) {
                            if ($key == (count($crumbs) - 1)) {
                                $active = 'active';
                                echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
                            } else {
                                $active = '';
                                echo '<li class="breadcrumb-item ' . $active . '" aria-current="page"><a href="#" class="btn btn-sm btn-primary btn-outline" onclick="history.back()">' . $crumb . '</a></li>';
                            }
                        }
                    }
                    ?>
                </ol>
            </nav>
    
            
            <p class="h1 text-uppercase fw-bold text-secondary">
            GM : Mr Sefiso Nxele 
            </p>

            <!-- <p class="fw-lighter fs-3 my-5">
                The Department Financial Services consists of two branches namely, Expenditure and Income, which are further divided into various divisions and sections to cover the spectrum of related functions and actions being delivered to the community.
            </p> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 mx-auto">


            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Building Control</p>
                    </div>
                    <ul>
                        <li> Plans Examination and Approval</li>
                        <li> Building Inspections</li>
                        <li> Law Enforcement</li>
                        <li>Demolitions and Signage</li>
                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Town Planning</p>
                    </div>
                    <ul>
                        <li>Handling & Processing of Special Consent, Rezoning & Development Applications</li>
                        <li>Land Use Management</li>
                        <li> Formal Authority Applications</li>
                        <li> Relaxation of Building Lines, Sides & Rear Spaces Applications</li>
                        <li> Spatial Development Framework</li>
                       
                    </ul>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4">Environmental Management</p>
                    </div>
                    <ul>
                        <li>Management of privately owned vacant properties with overgrown vegetation</li>
                        <li>  Identification of Flora/Tree Felling</li>
                        <li>Scrutinizing Building Applications</li>
                        <li>Scrutinizing Town Planning Applications</li>
                        <li>Provision of comments on EIA Applications, basic assessment, and scoping report</li>
                        <li> Compliance monitoring & Enforcement</li>
                       
                    </ul>
                </a>


                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <p class="my-3 h4"> Local Economic Development</p>
                    </div>
                    <ul>
                        <li>SMME & Co-Operative Support</li>
                        <li> Informal Economy Support</li>
                        <li>Development & Maintenance of Local Business Database</li>
                        <li>Local Economic Development Strategy development & Implementation</li>
                        <li>Sectoral Development support</li>
                        <li>Business Licensing</li>
                        <li>Provision of market stalls for informal traders</li>
                        
                    </ul>
                </a>
            </div>
        </div>
    </div>
</div>