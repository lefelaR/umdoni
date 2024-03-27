<?php
global $context;
$logs = $context->data; // Assuming you have a variable named $logs with activity log data
$crumbs = getCrumbs();
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800">Contact Support</h1>

    <ol class="breadcrumb">
      <?php
      foreach ($crumbs as $key => $crumb) {
        if ($key == (count($crumbs) - 1)) {
          $active = 'active';
          echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
        } else {
          $active = '';
          echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>';
        }
      }
      ?>
    </ol>
  </div>

  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header">
          <p class="card-title fw-light">Support</p>
          <div class="float-start float-lg-end">
            <div class="card-content">
              <?php include('Includes/parts/alerts.php') ?>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive" >
          
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
  </div>
</div>
