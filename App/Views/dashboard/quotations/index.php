<?php
global $context;

$data = $context->data;

$crumbs = getCrumbs();

?>

<div class="row">
    <h1>
        Quotations
    </h1>

    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
             
        <?php
        
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
        ?>
        

        </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <p class="card-title fs-5">Quotation List</p>
                <div class="float-start float-lg-end">
                    <a class="btn btn-sm" href="<?php echo buildurl("dashboard/quotations/add") ?>" role="button">
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
                                    <th>TITLE</th>
                                    <th>SUMMARY</th>
                                    <th>BODY</th>
                                    <th>POSTED BY</th>
                                    <th>CREATED DATE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $service) {
                                    $key++;

                                    switch ($service['status']) {
                                        case '1':
                                     $status =  '<span class="badge bg-light-primary">Current</span>';
                                            break;
                                        case '2':
                                            $status =  '<span class="badge bg-light-success">Open</span>';
                                            break;
                                        case '3':
                                            $status = '<span class="badge bg-light-secondary">Awarded</span>';
                                            break;

                                        default:
                                        $status =  '<span class="badge bg-light-secondary">Awarded</span>';
                                            break;
                                    }
                                    
                            echo '
                                <tr>
                                    <td class="text-bold-500">' . $key . '</td>
                                    <td>' . $service['title'] . '</td>
                                    <td>' . $service['subtitle'] . '</td>
                                    <td>' . $service['body'] . '</td>
                                    <td class="text-bold-500">' . $service['updatedBy'] . '</td>
                                    <td class="text-bold-500">' . $service['createdAt'] . '</td>
                                    <td> 
                                        '.$status.'
                                    </td>
                                    <td>
                                        <a class="btn  btn-sm" href="add?id=' .  $service['id'] . '">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm" href="delete?id=' .  $service['id'] . '" onclick="handleDelete(event, '.$service['id'].')">
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

<script>
    function updateStatus(id, status) {
        fetch('/dashboard/quotations/updateStatus', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id,
                    status
                }),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                // You can update the table or perform any other action after updating the status
                location.reload(); // For simplicity, reload the page
            })
            .catch(error => {
                console.error('Error updating status:', error);
            });
    }

    
</script>