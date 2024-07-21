<?php
global $context;
$exco = $context->data;
$crumbs = getCrumbs();

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

    .card {
        border: 4px solid #A5A3A3;
    }

    .card-body {
        padding: 0 !important;
        width: auto;
        height: 12em;
        overflow: hidden;
    }

    .card-footer {
        min-height: 10em;
    }

    .card-footer p {
        line-height: 20px;
    }

    @media (max-width: 575.98px) {
        .card {
            width: auto;
            border: 4px solid #A5A3A3;
        }

        .card-body {
            padding: 0 !important;
            height: 16em;
            overflow: hidden;
        }

        .card-footer p {
            line-height: 22px;
        }
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
            <p class="fw-lighter fs-3 my-5">
                Umdoni Municipality comprises of 37 Councillors, categorised into two which are Ward Councillors and
                Proportional Representative (PR) Councillors. The Speaker is the ex-officio member of all committees of
                Council and is the Chairperson of Council Meetings.<br><br>
                The number of Councillors that serve in the Umdoni Council is broken down as follows:<br>
                19 – Ward Councillors and 18 PR Councillors.<br>
                <br>
                ‌

                <span class="fs-5 fw-bold">Umdoni municipality’s current composition of Council is as
                    follows:</span><br>

                18 – African National Congress (ANC)<br>

                1 - Abantu Batho Congress (ABC)<br>

                1- Al-Jama –Ah<br>

                1 – Allied Movement for Change (AM4C)<br>

                6 – Democratic Alliance (DA)<br>

                5 – Economic Freedom Fighters (EFF)<br>

                5 – Inkatha Freedom Party (IFP)<br>

            </p>
        </div>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <div id="flush-collapseOne" class="accordion-collapse " data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <p class="fs-1 text-uppercase my-5">
                                EXECUTIVE COMMITTEE (Exco)
                            </p>
                            <p class="fw-lighter fs-3 my-5">
                                The Umdoni Local Municipality’s Executive Committee (EXCO) comprises of the made of the
                                Mayor as the Chairperson of the committee, Deputy Mayor and four (4) other Councillors.
                                All members of EXCO & the Speaker are full time Councillors. Administratively, Senior
                                Management also forms part of EXCO.
                            </p>
                        </div>
                        <?php
                        foreach ($exco as $key => $value) {
                            if (isset($value['name'])) {
                                $name = substr($value['name'], 0, 1);
                            }
                            $options = array(
                    
                                "CP"    => "CHAIRPERSON",
                                "DM"    => "DEPUTY MAYOR",
                                "S"     => "SPEAKER",
                                "M"     => "EXCO MEMBER" ,
                                "CLLR"  => "COUNCILLOR",
                                "MM"    => "THE MUNICIPAL MANAGER",
                                "GMTS"  => "GENETAL MANAGER TECHNICAL SERVICES",
                                "GMCS"  => "GENERAL MANAGER COMMUNITY SERVICES ",
                                "GMPD"  => "GENERAL MANAGER PLANNING AND DEVELOPMENT  ",
                                "CFO"   => "GENERAL MANAGER TREASURY"
                            );

                                echo ' <div class="col-md-2 col-lg-2 col-sm-12 my-1">
                                <div class="card text-center m-1">
                                    <div class="card-body">
                                        <img src="' . $value['location'] . '" class="card-img-top" alt="municipal councelor">
                                    </div>

                                    <div>
                                    <div class="card-footer">
                                    <p class="fw-bold text-secondary text-uppercase fs-6">' . $value['title'] . '</p>
                                        <p>
                                        <span class="fw-normal"> '.$options[$value['category']].'<br/>' . strtoupper($name) . " " . $value['surname'] . '</span><br>
                                        <span class="fw-lighter">' . $value['telephone'] . '</span><br>
                                        
                                        <span class="fw-lighter small">Ward:' . $value['ward'] . '</span>
                                        </p>
                                    </div>
                                    </div>
                                    </div>
                                </div>';
                            }
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>