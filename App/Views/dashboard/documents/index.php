<?php
global $context;
$data = $context->data;

$crumbs = getCrumbs();
echo '
<div class="row">
    <h1>
        Documents
    </h1>
    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">';
            foreach ($crumbs as $key => $crumb) 
            {
                if($key == (count($crumbs)-1))
                {
                    $active = 'active';
           echo ' <li class="breadcrumb-item '.$active.'" aria-current="page">'.$crumb.'</li>  ';
                }else{   
                    $active = '';
              echo '<li class="breadcrumb-item '.$active.'" aria-current="page">'.$crumb.'</li>';
                }
            }
            echo'
            </ol>
        </nav>
    </div>
</div>
';
?>
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <p class="card-title fw-light">Document List</p>
                <div class="float-start float-lg-end">
                    <a class="btn btn-sm" href="<?php echo buildurl("dashboard/documents/add") ?>" role="button">
                        <i class="bi bi-plus"></i> Add
                    </a>
                    <button class="btn  btn-sm">
                        <i class="bi bi-download"></i> Save
                    </button>
                </div>
            </div>
            <?php include('Includes/parts/alerts.php') ?>
            <?php
            echo '
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                  
                                    <th>TITLE</th>
                                    <th>SUMMARY</th>
                                    <th>BODY</th>
                                    <th>CREATED DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($data as $key => $document) {
                $key++;

                echo '
                                <tr>
                                 
                                    <td>' . $document['title'] . '</td>
                                    <td>' . $document['subtitle'] . '</td>
                                    <td>' . $document['body'] . '</td>
                                    <td>' . $document['createdAt'] . '</td>
                                    <td>
                                        <a class="btn  btn-sm" href="add?id=' .  $document['id'] . '">
                                        <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm" href="delete?id=' .  $document['id'] . '">
                                         <i class="bi bi-trash"></i>
                                    </a>
                                    </td>
                                </tr>';
            }

            echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
