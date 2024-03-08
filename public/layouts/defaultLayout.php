<?php
include_once '../Components/Helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="@description">
  <meta name="keywords" content="@keywords">
  <meta name="author" content="rakheoana">
  <title>Umdoni | Municipality </title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url('assets/img/icon/umdoni-icon.ico'); ?>" />                 
  <link rel="stylesheet" href="<?php echo url('assets/css/offcanvas-navbar.css') ;?> ">
  <link rel=" manifest" href="<?php echo url('manifest.json'); ?>">
  <link rel="mask-icon" href="<?php echo url('assets/img/icon/safari-pinned-tab.svg'); ?>" color="#c99001">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#c99001">
  <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
  <link rel="canonical" href="https://www.umdoni.co.za/index">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="canonical" href="https://www.umdoni.co.za/index/index">
  <link rel="stylesheet" href="<?php echo url('themes/mazor/assets/vendors/simple-datatables/style.css') ?>">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo url('assets/css/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/bootstrap-icons/bootstrap-icons.css") ?>">
  <link href="<?php echo url('assets/fonts/fonts/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="<?php echo url('assets/css/site.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  
</head>

<body>
  <?php include '../public/Includes/frontendheader.php'; ?>
  {{content}}
  <?php include '../public/Includes/frontendfooter.php' ?>
  <?php include '../public/Includes/include-js.php' ?>
 

</body>
<!-- <?php #include '../public/Includes/cookie.php' ?> -->
</html>