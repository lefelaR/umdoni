<?php
global $context;
$data = $context->data;
$crumbs = getCrumbs();
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800">Users</h1>

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
          <p class="card-title fw-light">User List</p>
          <div class="float-start float-lg-end">
            <div class="card-content">
              <?php include('Includes/parts/alerts.php') ?>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="table1">
              <thead class="thead-light">
                <tr>
                  <th>Avator</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $img = '';
                foreach ($data as $key => $user) {
                  if (isset($user['location']) && $user['location'] != null) {
                    $img = '<img src=' . $user['location'] . ' style="width:30px">';
                  } else {
                    $img = '<img src=' . url("assets/img/pro.jpg") . ' style="width:30px">';
                  }

                  $key++;

                ?>

                  <tr>
                    <td><a href="#"><?php echo $img; ?></a></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                      <?php echo $user['verified'] === "1" ? '<span class="badge bg-light-primary">Confirmed</span>' : '<span class="badge bg-light-warning">Unconfirmed</span>'; ?>
                      <?php echo $user['locked'] === "1" ? '<span class="badge bg-light-success">Active</span>' : '<span class="badge bg-light-danger">Inactive</span>' ?>
                    </td>
                    <td>
                      <a href="details?id=<?php echo $user['user_id']; ?>" class="btn btn-sm">
                        <i class="bi bi-clipboard"></i>
                      </a>
                
                      <span class="form-switch">
                        <input class="form-check-input" type="checkbox" name="switch" id="<?php echo $user['user_id']; ?>" >
                      </span>

                      <button class="btn btn-sm " onclick="handleOptions(event)" id="<?php echo $user['user_id']; ?>">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                    </td>
                  </tr>
                <?php
                }
                ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

    <script>
      const handleOptions = (event) => {
        const user_id = event.currentTarget.id;
        showStatusModal(user_id);
        const formData = new FormData();
        formData.append("user_id", user_id);
        const currentURL = window.location.href;
        fetch(currentURL, {
          method: "POST",
          body: formData,
        })

      }
    </script>