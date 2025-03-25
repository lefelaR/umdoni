<?php
global $context;
$data = $context->data[0];
// array_column
$crumbs = getCrumbs();
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

                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'VR':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'WP':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'IDP':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;


                case 'PB':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;

                case 'BR':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';



                    break;

                case 'IA':

                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;

                case 'CM':

                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;

                case 'SDA':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'LED':

                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';



                    break;

                case 'CM':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';

                    break;

                case 'SDBIP':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;

                case 'PA':


                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
                            ' . $data['body'] . '
                        </p>';


                    break;

                case 'NL':

                    echo '
                    <p class="h1 text-uppercase fw-bold mt-5 mb-1 text-secondary ">
                        ' . $data['title'] . '
                        </p>

                        <p class="fs-3 my-2 text-yellow">
                            ' . $data['subtitle'] . '
                        </p> ';


                    if (isUrlReachable($data['location'])) {
                        echo '<div class=" my-5 mx-auto">
                            <iframe
                            src="' . $data['location'] . '"
                            width="100%"
                            height="1000px"
                            loading="lazy"
                            title="PDF-file"
                        ></iframe> </div>';
                    } else {
                        $link = ltrim($data['location'], '.');
                        echo '<div class=" my-5 mx-auto">
                        <iframe
                        src="' . url($link) . '"
                        width="100%"
                        height="1000px"
                        loading="lazy"
                        title="PDF-file"
                    ></iframe> </div>';
                    }


                    echo
                    '<p class="my-5 fs-4 lh-lg  ">
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