<?php
    include_once '../Components/Helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Umdoni Municipality | Authentication</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url('assets/img/icon/umdoni-icon.ico'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
  <link rel="stylesheet" href="<?php echo url("themes/mazor/assets/vendors/bootstrap-icons/bootstrap-icons.css") ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css')?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/default.css')?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/util.css')?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>

    {{content}}
    <?php include '../public/Includes/backendfooter.php' ?>
    <?php include '../public/Includes/include-js.php' ?>
</body>
</html>