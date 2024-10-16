<?php

global $context;
if(!is_null($context->data)) 
        $data = $context->data;


$crumbs = getCrumbs();

echo '
<div class="row">

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
$reference = (isset($data['reference'])) ? $data['reference'] : '';
$createdAt = (isset($data['createdAt'])) ? $data['createdAt'] : '';
$duedate = (isset($data['dueDate'])) ? $data['dueDate'] : '';
$status = (isset($data['status'])) ? $data['status'] : '';

$options = array(
    "1" => "Current",
    "2" =>"Open",
    "3" => "Awarded",
    "4" => "Closed",
);

echo'
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add a Quotation</h4>
    </div>
    <form class="form" action="' . $action . '" method="post" enctype="multipart/form-data" >
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
            <input type="hidden"  id="id" name="id" value="' . $id . '" >
                <div class="form-group">
                    <label for="basicInput">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="' . $title . '">
                </div>

                <div class="form-group">
                    <label for="helperText">Subtitle</label>
                    <input type="text" id="subtitle" name="subtitle" class="form-control" value="' . $subtitle . '">
                </div>

                <div class="form-group">
                <label for="helperText">Reference</label>
                <input type="text" id="reference" name="reference" class="form-control" value="' . $reference . '">
            </div>

            <div class="form-group">
            <label for="helperText">Created Date</label>
            <input type="date" id="createdAt" name="createdAt" class="form-control" value="' . $createdAt . '">
            </div>
                
                <div class="form-group">
                    <label for="helperText">End Date</label>
                    <input type="date" id="duedate" name="duedate" class="form-control" value="' . $duedate . '">
                </div>



                <div class="form-group">

                <label for="helperText">Status</label>
                 <select class="form-select" id="status" name="status" value="'.$status.'">';
                
                    foreach ($options as $key => $value) {
                        $selected = ($status == $key) ? "selected":"";
                        echo ' <option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                    }
                echo'    </select>
            
            </div>

                <div class="form-group">
                <label for="helperText">File upload</label>
                    <input type="file" class="form-control" id="image" name="name" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value=""accept="application/pdf>
                </div>
            
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" class="form-control text-black" id="body" value="' . $body . '" rows="3">
                    '.$body.'
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
