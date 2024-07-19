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
$permissions =  (isset($data['permissions'])) ? json_decode($data['permissions']) : '';

//////////////////permissions toggle\\\\\\\\\\\\
$eventManagement        =   (isset($permissions->eventManagement)       && $permissions->eventManagement    != "") == 'on' ? "checked" : ""; 
$contentManagement      =   (isset($permissions->contentManagement)     && $permissions->contentManagement  != "") == 'on' ? "checked" : ""; 
$serviceManagement      =   (isset($permissions->serviceManagement)     && $permissions->serviceManagement  != "") == 'on' ? "checked" : "";
$officialProfiles       =   (isset($permissions->officialProfiles)      && $permissions->officialProfiles     != "") == 'on' ? "checked" : "";;
$documentLibrary        =   (isset($permissions->documentLibrary)       && $permissions->documentLibrary    != "") == 'on' ? "checked" : "";;
$humanResources         =   (isset($permissions->humanResources)        && $permissions->humanResources     != "") == 'on' ? "checked" : "";;
$communityEngagement    =   (isset($permissions->communityEngagement)   && $permissions->communityEngagement != "") == 'on' ? "checked" : "";;
$economicDevelopment    =   (isset($permissions->economicDevelopment)   && $permissions->economicDevelopment != "") == 'on' ? "checked" : "";;
$systemSettings         =   (isset($permissions->systemSettings)        && $permissions->systemSettings      != "") == 'on' ? "checked" : "";;
$support                =   (isset($permissions->support)               && $permissions->support            != "") == 'on' ? "checked" : "";;
//////////////////\\\\\\\\\\\\\\\\\\\\\\

?>

<div class="card">
<div class="card-header">
    <h4 class="card-title">Add a role</h4>
</div>
<form class="form" action="' . $action . '" method="post" enctype="multipart/form-data">
<div class="card-body">
<div class="row">
<div class="col-md-6">
<input type="hidden"  id="id" name="id" value="<?=$id?>" >
<div class="form-group">
<label for="basicInput">Title</label>
<input type="text" class="form-control" id="name" name="name" value="<?=$name?>">
</div>


<div class="my-5">
<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="eventManagement" name="eventManagement" id="eventManagement" <?=$eventManagement?>  >
<label class="form-check-label" for="helperText">Event Management</label>
</div>


<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="contentManagement" name="contentManagement" id="contentManagement" <?=$contentManagement?> >
<label class="form-check-label" for="helperText">Content Management</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="serviceManagement" name="serviceManagement" id="serviceManagement" <?=$serviceManagement?> >
<label class="form-check-label" for="helperText">Service Namagement</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="officialProfiles" name="officialProfiles" id="officialProfiles" <?=$officialProfiles?>>
<label class="form-check-label" for="helperText">Official Profiles</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="documentLibrary" name="documentLibrary" id="documentLibrary"  <?=$documentLibrary?>>
<label class="form-check-label" for="helperText">Docuemnt Library</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="HumanResources" name="humanResources" id="humanResources" <?=$humanResources?> >
<label class="form-check-label" for="helperText">Human Resources</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="communityEngagement" name="communityEngagement" id="communityEngagement" <?=$communityEngagement?>>
<label class="form-check-label" for="helperText">Community Engagement</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="economicDevelopment" name="economicDevelopment" id="economicDevelopment" <?=$economicDevelopment?> >
<label class="form-check-label" for="helperText">Economic Development</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="systemSettings" name="systemSettings" id="systemSettings" <?=$systemSettings?> >
<label class="form-check-label" for="helperText">System Settings</label>
</div>

<div class="form-switch form-check form-group">
<input class="form-check-input" type="checkbox" onclick="handleToggle(event)" data_id="support" name="support" id="support" <?=$support?> >
<label class="form-check-label" for="helperText">support</label>
</div>
</div>

<button class="btn btn-primary btn-lg">
submit
</button>
</div>
</div>
</div>
</form>
</div>';
?>
