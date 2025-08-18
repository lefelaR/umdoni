<?php
global $context;

$data = $context->data;

?>

<div class="row">
    <h1>
        Meetings
    </h1>

    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Meetings</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <p class="card-title fw-light">Meeting List</p>
                <div class="float-start float-lg-end">
                    <a class="btn btn-sm" href="<?php echo buildurl("dashboard/meetings/add") ?>" role="button">
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

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>

                                    <th>TITLE</th>
                                    <th>SUBTITLE</th>
                                    <th>BODY</th>
                                    <th>CREATED</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($data as $key => $meeting) {
                                    $key++;
                                    echo '
                                <tr>
                                 
                                    <td>' . $meeting['title'] . '</td>
                                    <td>' . $meeting['subtitle'] . '</td>
                                    <td>' . strip_tags($meeting['body']) . '</td>
                                    <td>' . formatDate( $meeting['createdAt']) . '</td>
                                    <td>
                                    <a class="btn  btn-sm" href="add?id=' .  $meeting['id'] . '">
                                    <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm" href="delete?id=' .  $meeting ['id'] . '"onclick="handleDelete(event, '.$meeting['id'].')">
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