<?php
global $context;
$data = $context->data;
// array_column
$crumbs = getCrumbs();
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800">Users</h1>

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
  </div>


  <div class="col-xl-8 col-lg-7 mb-4">
    <div class="card">
      <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
      >
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        <a class="m-0 float-right btn btn-default btn-md" title="Add" href="add"
          ><i class="far fa-plus-square"></i>  </a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
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

           $img ='';
        
           foreach ($data as $key => $user) 
           {    
            if(isset($user['profile_image_id'])&& $user['profile_image_id'] != null)
            {
                $img = '<img src='.url("assets/img/".$user['user_id']."/pro.png").' style="width:30px">';
            }
            else{
                $img = '<img src='.url("assets/img/pro.jpg").' style="width:30px">';
            }
            echo '<tr>
                    <td><a href="#">'.$img.'</a></td>
                    <td>'.$user['username'].'</td>
                    <td>'.$user['email'].'</td>
                    <td><span class="badge bg-light-primary">active</span></td>
                    <td><a href="add?id='.$user['user_id'].'" class="btn btn-sm btn-primary">Detail</a></td>
                </tr>';
            }
        ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
</div>
