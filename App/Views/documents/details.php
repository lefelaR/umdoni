<?php
global $context;
$data = $context->data[0];
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

            <?php

            switch ($data['category']) {
                case 'AR':
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                break;

                case 'VR':

                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

               
                break;

                case 'WP':
                   
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                break;

                case 'IDP':
                   
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                break;


                case 'PB':
                       
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                break;

                case 'BR':

                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                break;

                case 'IA':
                        $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'CM':
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'SDA':

                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'LED':
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;

                case 'CM':

                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'NL':
                    $link = ltrim($data['location'],'.');
                    echo '
                            <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> 
                    
                        <span class="py-3 mb-3">
                            <a href="' . $data['location'] . '" class="img-fluid" style="width: 50%;" alt="' . $data['title'] . '" target="_blank">' . $data['title'] . '</a>
                        </span>


                        <div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe>
                    </div>
                        <p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                default:
                    # code...
                    break;
            }


            ?>

        </div>
    </div>
</div>
</div>