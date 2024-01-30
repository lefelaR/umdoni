<?php
include_once '../Components/Helpers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
    <link rel="stylesheet" href="<?php echo url('themes/mazor/assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/perfect-scrollbar/perfect-scrollbar.css") ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url('assets/img/icon/umdoni-icon.ico'); ?>" />
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/css/app.css") ?>">
    <link rel="stylesheet" href="<?php echo url('themes/mazor/assets/vendors/iconly/bold.css') ?>">
    <!-- from the theme -->
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/sweetalert2/sweetalert2.min.css") ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/bootstrap-icons/bootstrap-icons.css") ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/simple-datatables/style.css") ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/quill/quill.bubble.css") ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/quill/quill.snow.css") ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/toastify/toastify.css") ?>">
    <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/images/favicon.svg") ?>">
    <link rel="stylesheet" href="<?php echo url('assets/vendors/simple-datatables/style.css') ?>">
</head>

<body>
    <div id="app">
        <!-- loader -->
        <?php include '../public/Includes/loader.php'; ?>
        <!-- Sidebar -->
        <?php include '../public/Includes/parts/side_bar.php'; ?>
        <!-- Sidebar -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            {{content}}
        </div>
        
        <?php include '../public/Includes/modals.php'; ?>
     
    </div>
    <?php include '../public/Includes/backendfooter.php'; ?>

    <script src="<?php echo url("assets/js/all.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/js/mazer.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/vendors/apexcharts/apexcharts.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/js/pages/dashboard.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/vendors/simple-datatables/simple-datatables.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/js/extensions/sweetalert2.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/vendors/sweetalert2/sweetalert2.all.min.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/vendors/toastify/toastify.js") ?>"></script>
    <script src="<?php echo url("themes/mazor/assets/js/extensions/toastify.js") ?>"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="<?php echo url("themes/mazor/assets/js/pages/form-editor.js") ?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>