<?php
global $context;
$data = $context->data;
$crumbs = getCrumbs();
$sPage = $sController = $sModule = '';

?>

<div class="row">
    <h1>
        Councillors
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
                $sPage = $sController.$crumb.'tablelist';
       echo ' <li class="breadcrumb-item '.$active.'" aria-current="page">'.$crumb.'</li>  ';
            }else{   
                $active = '';
                $sController = $crumb;
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
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <p class="card-title fw-light">Councillor List</p>
                    <div class="float-start float-lg-end">
                        <a class="btn btn-sm" href="<?php echo buildurl("dashboard/councillors/add") ?>" role="button">
                            <i class="bi bi-plus"></i> Add
                        </a>
                        <button class="btn  btn-sm" id="<?=$sPage?>" >
                            <i class="bi bi-download"></i> Save
                        </button>
                    </div>
                </div>
                <?php include('Includes/parts/alerts.php') ?>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>-</th>
                                <th>NAME</th>
                                <th>MIDDLE NAME</th>
                                <th>SURNAME</th>
                                <th>TELEPHONE</th>
                                <th>EMAIL</th>
                                <th>POSITION</th>
                                <th>CATEGORY</th>
                                <th>WARD</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="list">
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
                                    <td>' . $councillor['middlename'] . '</td>
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
                                    <a class="btn btn-sm" id="delete"  [id=' . $councillor['id'] . ']  href="delete?id=' .  $councillor['id'] . '"onclick="handleDelete(event, '.$councillor['id'].')">
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
    </section>
</div> </div>

<script>
    if($('#councillorsindextablelist').length > 0){
        $('#councillorsindextablelist').on('click', function(){
            debugger
            
        })

    }
</script>