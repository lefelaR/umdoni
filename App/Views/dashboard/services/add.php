<?php

global $context;
if(!is_null($context->data)) 
        $data = $context->data;


$crumbs = getCrumbs();

echo '
<div class="row">
    <h1>
       Add Services
    </h1>
    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
           
            ';

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
$title = (isset($data['title'])) ? $data['title'] : '';
$subtitle = (isset($data['subtitle'])) ? $data['subtitle'] : '';
$body = (isset($data['body'])) ? $data['body'] : '';

echo'
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add a service</h4>
    </div>
    <form class="form" action="'.$action.'" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <input type="hidden"  id="id" name="id" value="'.$id.'" >
                    <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="'.$title.'">
                    </div>

                    <div class="form-group">
                        <label for="helperText">Subtitle</label>
                        <input type="text" id="subtitle" name="subtitle" class="form-control" value="'.$subtitle. '">
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control text-black" id="image" name="name" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea type="text" name="body" class="form-control text-black" id="full" value="'.$body.'" rows="3">
                        </textarea>
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
