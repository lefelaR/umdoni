<?php

global $context;
if (!is_null($context->data))
    $data = $context->data;


$crumbs = getCrumbs();

echo '
<div class="row">
    <h1>
       Exco Memebers
    </h1>
    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">';

foreach ($crumbs as $key => $crumb) {
    if ($key == (count($crumbs) - 1)) {
        $active = 'active';
        echo ' <li class="breadcrumb-item" ' . $active . ' aria-current="page">' . $crumb . '</li>  ';
    } else {
        $active = '';
        echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">'.$crumb.'</li>';
    }
}
echo '   
            </ol>
        </nav>
    </div>
</div>';

if (isset($data[0]['id'])) {
    $id =  $data[0]['id'];
    $action = 'updateExcoAction';
    $page = 'Edit';
} else {
    $page = 'Add';
    $id = '';
    $action = 'saveExcoAction';
}
$initials = (isset($data[0]['initials']))? $data[0]['initials']:'' ;
$name = (isset($data[0]['name'])) ? $data[0]['name'] : '';
$surname = (isset($data[0]['surname'])) ? $data[0]['surname'] : '';
$middlename = (isset($data[0]['middlename'])) ? $data[0]['middlename']: '';
$email = (isset($data[0]['email'])) ? $data[0]['email'] : '';
$telephone = (isset($data[0]['telephone'])) ? $data[0]['telephone'] : '';
$position = (isset($data[0]['position'])) ? $data[0]['position'] : '';
$category = (isset($data[0]['category'])) ? $data[0]['category'] : '';
$title = (isset($data[0]['title'])) ? $data[0]['title'] : '';
$ward = (isset($data[0]['ward'])) ? $data[0]['ward'] : '';
$location = (isset($data['location'])) ? $data[0]['location'] : '';
$img_file = (isset($data[0]['img_file'])) ? $data[0]['img_file'] : '';
echo '
<div class="card">
    <div class="card-header">
        <h4 class="card-title">'.$page.' a Manager</h4>
    </div>
    <form class="form" action="'.$action.'" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
            <div class="col-md-6 mb-4">
            <h6>Initials</h6>
            <fieldset class="form-group">';

            $initialOptions = array(
                "Dr"=>"Dr." ,
                "Mr"=>"Mr." ,
                "Mrs"=>"Mrs." ,
                "Ms"=> "Ms." ,
                "Sir"=>"Sir." 
            );

            echo'
                <select class="form-select" id="initials" name="initials" value="'.$initials.'">';
                
                foreach ($initialOptions as $key => $opt) {
                    $selected = ($initials == $key) ? "selected" : "";
                    echo '<option value="'.$key.'" '.$selected.'>'.$opt.'</option>';
                }

                echo '</select>
            </fieldset>
            </div>
                <div class="col-md-6">
                    <input type="hidden" id="id" name="id" value="'.$id.'">
                    <div class="form-group">
                        <label for="basicInput">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="'.$name.'">
                    </div>

                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="basicInput">Middle Name</label>
                    <input type="text" class="form-control" id="middlename" name="middlename" value="'.$middlename.'">
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="'.$surname.'">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="'.$email.'">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Telephone</label>
                        <input type="number" class="form-control" id="telephone" name="telephone" pattern="^(\+27|0)([0-9]|\([0-9]+\))([0-9]{8})$" value="'.$telephone.'">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Position</label>
                        <input type="text" class="form-control" id="title" name="title" value="'.$title.'">
                    </div>
                </div>

            

                <div class="col-md-6 mb-4">
                <h6>Category</h6>
                <fieldset class="form-group">';

                $options = array(
                    
                    "CP"    => "CHAIRPERSON" ,
                    "DM" => "DEPUTY MAYOR",
                    "S" =>"SPEAKER",
                    "M"     => "EXCO MEMBER" ,
                    "CLLR"  => "COUNCILLOR",
                    "MM"    => "THE MUNICIPAL MANAGER",
                    "GMTS"  => "GENERAL MANAGER TECHNICAL SERVICES",
                    "GMCS"  => "GENERAL MANAGER COMMUNITY SERVICES ",
                    "GMPD"  => "GENERAL MANAGER PLANNING AND DEVELOPMENT  ",
                    "CFO"   => "GENERAL MANAGER TREASURY"
                );

                echo  ' <select class="form-select" id="category" name="category" value="'.$category.'">';
                 
                foreach ($options as $key => $value) {
                    
                    $selected = ($category == $key) ? "selected" : "";
                    echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>'; 
                }
                echo '
                    </select>
                </fieldset>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Ward</label>
                        <input type="text" class="form-control" id="ward" name="ward" value="'.$ward.'">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control" id="image" name="name" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="'.$location.'">
                    </div>
                </div>
                <div class="col-md-6">
                <button class="btn btn-primary btn-lg shadow">
                    submit
                </button>
                </div>
            </div>
        </div>
    </form>
</div>';

?>