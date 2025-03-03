<?php
global $context;
$data = $context->data;

$crumbs = getCrumbs();

echo '
<div class="row">
    <h1>
        Past Documents
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
                </div>
            </div>
            <?php include('Includes/parts/alerts.php') ?>
            <?php
        
            echo '
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">';

                    sort($data);

            foreach($data as $ikey => $aFile){
                echo '<li>'.$aFile;
               
                echo '</li>';
            }
          
                   echo' </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
