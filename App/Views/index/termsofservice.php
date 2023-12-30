<?php
global $context;
$data = $context->data;

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
                    Terms of Service
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold">
            Terms of Use for Umdoni Municipality Website
            </p>
            <p class="fw-lighter fs-3 my-5">

              
                Last Updated: 12 Dec 2023<br>
                <br>

                Welcome to the Umdoni Municipality Website. Accessing or using our site signifies your agreement to the following terms and conditions. Please review these terms carefully.
                <br><br>
                Acceptance of Terms:
                By using the Umdoni Municipality Website, you agree to these Terms of Use, comply with all applicable South African laws and regulations, and accept responsibility for compliance with any local laws.
                <br><br>
                Changes to Terms:
                We reserve the right to modify these Terms of Use at any time. Your continued use of the site after such changes constitutes your acceptance of the new terms.
                <br><br>
                Website Access:
                You are granted a limited, revocable, non-exclusive right to access and use the website for its intended purpose. Unauthorized use may result in legal action.
                <br><br>
                User Conduct:

                Use the website lawfully and in accordance with all applicable laws and regulations.
                Avoid any activity that could harm, disrupt, or impair the website or its services.
                <br><br>
                Privacy Policy:
                Your use of the website is also governed by our Privacy Policy, which is available [here]. By using the site, you agree to the terms of the Privacy Policy.
                <br><br>
                Intellectual Property:
                All content on this website is the property of Umdoni Municipality and is protected under South African intellectual property laws. Reproduction, distribution, or public display of content without explicit permission is prohibited.
                <br><br>
                Third-Party Links:
                The website may include links to third-party sites. These links do not imply endorsement, and we are not responsible for the content or practices of these sites.
                <br><br>
                Disclaimer of Warranties:
                The website is provided "as is," without any warranties, express or implied. We do not guarantee the accuracy, reliability, or completeness of the content.
                <br><br>
                Limitation of Liability:
                Umdoni Municipality and its affiliates will not be liable for any damages arising from the use of this website.
                <br><br>
                Governing Law:
                These Terms of Use are governed by the laws of South Africa, and you consent to the exclusive jurisdiction and venue of courts in South Africa for any disputes.

                For questions about these Terms of Use, please contact us at [Contact Email].


            </p>
        </div>
    </div>


    <div class="row">
        <?php
        foreach ($data as $key => $value) {

            echo '
        <div class=" col-md-4 col-lg-4 col-sm-12">
        <a href="' . buildurl("news/details?id=" . $value['id']) . '">
            <div class="card mb-3 card-hover" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="' . $value["location"] . '" class="img-fluid rounded-start" style="    object-fit: cover;
                    height: 130px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">' . $value["title"] . '</h5>
                            <p class=" text-truncate">' . $value["body"] . '</p>
                            
                         
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