<?php
global $context;

$data = $context->data;

?>

<div class="row">
    <h1>
        Projects
    </h1>

    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Events</li>
                <li class="breadcrumb-item active" aria-current="page">Projects</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Project List</h4>
                <div class="float-start float-lg-end">
                    <a class="btn btn-sm" href="<?php echo buildurl("dashboard/councillors/add") ?>" role="button">
                        <i class="bi bi-plus"></i> Add
                    </a>
                    <button class="btn  btn-sm">
                        <i class="bi bi-download"></i> Save
                    </button>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>-</th>
                                    <th>TITLE</th>
                                    <th>DATE</th>
                                    <th>DOCUMENT</th>
                                    <th>SUBTITLE</th>
                                    <th>POSITION</th>
                                    <th>CATEGORY</th>
                                    <th>WARD</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($data as $key => $councillor) {
                                    $key++;
                                    echo '
                                <tr>
                                    <td>
                                        <div class="avatar me-3">
                                            <img src="' . $councillor['location'] . '" alt="avatar" >
                                        </div>
                                    </td>
                                    <td>' . $councillor['name'] . '</td>
                                    <td>' . $councillor['surname'] . '</td>
                                    <td>' . $councillor['telephone'] . '</td>
                                    <td>' . $councillor['email'] . '</td>
                                    <td>' . $councillor['title'] . '</td>
                                    <td>' . $councillor['category'] . '</td>
                                    <td>' . $councillor['ward'] . '</td>
                                    <td>
                                    <a class="btn  btn-sm" href="add?id=' .  $councillor['id'] . '">
                                    <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm" href="delete?id=' .  $councillor['id'] . '">
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