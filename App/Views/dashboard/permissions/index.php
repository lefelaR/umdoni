<?php
global $context;
$data = $context->data;
$crumbs = getCrumbs();
?>

<div class="row">
    <h1>
        Permissions
    </h1>


<div class="col-md-12 order-md-2 order-first">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
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
    </nav>
</div>
</div>


<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
            <p class="card-title fw-light">Permision List</p>
                <div class="float-start float-lg-end">
                    <a class="btn btn-sm" href="<?php echo buildurl("dashboard/roles/add") ?>" role="button">
                        <i class="bi bi-plus"></i> Add
                    </a>
                    <button class="btn  btn-sm">
                        <i class="bi bi-download"></i> Save
                    </button>
                </div>
            </div>
            <div class="card-content">
            <?php include('Includes/parts/alerts.php') ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>NO#</th>
                                    <th>NAME</th>
                                    <th>PERMISSIONS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $role) {
                                    $key++;
                                    echo '
                                <tr>
                                    <td class="text-bold-500">' . $key . '</td>
                                    <td>' . $role['name'] . '</td>
                                    <td>' . $role['permissions'] . '</td>
                                    <td>
                                       
                                        <a class="btn  btn-sm" href="add?id=' .  $role['id'] . '" >
                                        <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm" href="delete?id='.  $role['id'] .'" onclick="handleDelete(event, '.$role['id'].')">
                                         <i class="bi bi-trash"></i>
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