
<?php

class Card{

    public function IconCard(icon, title, sub, link)
    {

            echo
                    '
            <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="<?php echo buildurl("services/info") ?>">
                            <div class="card card-hover mb-3 card-border">
                                <div class="card-body">
                                    <div class="text-center m-2">
                                        <i class="bi bi-house fs-1 text-yellow"></i>
                                    </div>
                                    <p class="h5 my-3 fw-bold text-blue text-center ">Neighborhood Info</p>
                                    <p class="card-text text-secondary text-center">Find your local trash pick-up days, utilities and more.</p>
                                </div>
                            </div>
                        </a>
            </div>
            ';

    }


    
}
?>