<?php
global $context;

$data = $context->data;
$crumbs = getCrumbs();
echo '
<div class="row">
    <h1>
        Services
    </h1>
<div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">';

foreach ($crumbs as $key => $crumb) {
    if ($key == (count($crumbs) - 1)) {
        $active = 'active';
        echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
    } else {
        $active = '';
        echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>';
    }
}
echo '         
        </ol>
        </nav>
    </div>
</div>';
?>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
              
                <p class="card-title fw-light">Service Requests</p>
                <div class="float-start float-lg-end">
                    <button class="btn  btn-sm">
                        <i class="bi bi-download"></i> Save
                    </button>
                </div>
            </div>
            <?php include ('Includes/parts/alerts.php') ?>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>NO#</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONENUMBER</th>
                                    <th>SERVICE TYPE</th>
                                    <th>COMMENTS</th>
                                    <th>DATE</th>
                                    <th>ACTIONS</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $request) {
                                    $key++;
                                    echo '
                                <tr>
                                    <td class="text-bold-500">' . $key . '</td>
                                    <td>' . $request['name'] . '</td>
                                    <td>' . $request['email'] . '</td>
                                    <td class="text-bold-500">' . $request['telephone'] . '</td>
                                    <td>' . $request['servicetype'] . '</td>
                                    <td>' . $request['comments'] . '</td>
                                    <td>' . $request['createdAt'] . '</td>
                                    <td>
                                        <a class="btn  btn-sm" href="check?id=' .  $request['id'] . '">
                                        <i class="bi bi-check-square"></i>
                                        </a>
                                       
                                    </td>
                                </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>