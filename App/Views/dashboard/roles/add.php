<?php

global $context;
if(!is_null($context->data)) 
        $data = $context->data;


$crumbs = getCrumbs();

echo '
<div class="row">
    <h1>
       Add Role
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
            echo '   
            </ol>
        </nav>
    </div>
</div>';

if(isset($data['id']))
{
    $id =  $data['id'];
    $action = 'update';
}
else
{
    $id = '';
    $action = 'save';
}
$name = (isset($data['name'])) ? $data['name'] : '';
$permissions = (isset($data['permissions'])) ? $data['permissions'] : '';

echo'
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add a role</h4>
    </div>
    <form class="form" action="'.$action.'" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <input type="hidden"  id="id" name="id" value="'.$id.'" >
                    <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" id="name" name="name" value="'.$name.'">
                    </div>

                    <div class="form-switch">
                        <label for="helperText">Permissions</label>
                        <input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="" name="switch" id="" >
                    </div>

                    <div id="editor"></div>
                <button class="btn btn-primary btn-lg">
                    submit
                </button>
                </div>
            </div>
        </div>
    </form>
</div>';
?>
