<?php
// commented out code
global $context;
$user = $context->data;

$crumbs = getCrumbs();
?>


<div class="row">
  <h1>
   User Profile
  </h1>
  <div class="col-12 col-md-12 order-md-2 order-first">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
      <ol class="breadcrumb">
       <?php
       foreach ($crumbs as $key => $crumb) {
        if ($key == (count($crumbs) - 1)) {
            $active = 'active';
            echo ' <li class="breadcrumb-item" ' . $active . ' aria-current="page">' . $crumb . '</li>  ';
        } else {
            $active = '';
            echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">'.$crumb.'</li>';
        }
    }
       ?>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md">
    <section class="section">
      <div class="card">
        <div class="card-header">

          <p class="card-title fw-light"><?php echo $user['username']; ?></p>
          <div class="float-start float-lg-end">
            <a class="btn btn-sm" href="<?php echo buildurl("dashboard/councillors/add") ?>" role="button">
              <i class="bi bi-plus"></i> Add
            </a>
            <button class="btn  btn-sm">
              <i class="bi bi-download"></i> Save
            </button>
          </div>
        </div>
        <?php include('Includes/parts/alerts.php') ?>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your
                email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
  </div>
  </section>
</div>
</div>