<?php
global $context;
$data = $context->data;
$crumbs = getCrumbs();
// create interface
?>

<div class="row">
    <h1>
    Senior Management
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
                 echo '<li class="breadcrumb-item '.$active.'" aria-current="page">Add</li>';
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
                
                <p class="card-title fw-light">Manager List</p>
                <div class="float-start float-lg-end">
                    <a class="btn btn-sm" href="<?php echo buildurl("dashboard/councillors/sadd") ?>" role="button">
                        <i class="bi bi-plus"></i> Add
                    </a>
                    <button class="btn  btn-sm">
                        <i class="bi bi-download"></i> Save
                    </button>
                </div>
            </div>
            <?php include('Includes/parts/alerts.php') ?>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>-</th>
                                    <th>NAME</th>
                                    <th>SURNAME</th>
                                    <th>TELEPHONE</th>
                                    <th>EMAIL</th>
                                    <th>POSITION</th>
                                    <th>CATEGORY</th>
                                    <th>WARD</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($data as $key => $manager) {
                                    $key++;


                                    $valueToString = [
                                        'SM' => 'SENIOR MANAGEMENT',
                                        'CSD' => 'COMMUNICTY SERVICES DEPARTMENT',
                                        'PDD' => 'PLANNING AND DEVELOMENT DEPARTMENT',
                                        'TSD' => 'TECHNICAL SERVICES DEPARTMENT',
                                        'COSD' => 'CORPORATE SERVICES DEPARTMENT',
                                        'OTMM' => 'OFFICE OF THE MUNICIPAL MANAGER',
                                        'FM' => 'FINANCE DEPARTMENT', 
                                        'CD' => 'COMMUNICATIONS DEPARTMENT', 
                                    ];

                                    echo '
                                <tr>
                                    <td>
                                        <div class="avatar me-3">
                                            <img src="' . $manager['location'] . '" alt="avatar" >
                                        </div>
                                    </td>
                                    <td>' . $manager['name'] . '</td>
                                    <td>' . $manager['surname'] . '</td>
                                    <td>' . $manager['telephone'] . '</td>
                                    <td>' . $manager['email'] . '</td>
                                    <td>' . $manager['title'] . '</td>
                                    <td>' . $valueToString[$manager['category']] . '</td>
                                    <td>' . $manager['ward'] . '</td>
                                    <td>
                                    <a class="btn  btn-sm" href="sadd?id=' .  $manager['id'] . '">
                                    <i class="bi bi-pencil"></i>
                                    </a>
                                <a class="btn btn-sm" href="deleteMan?id=' .  $manager['id'] . '">
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