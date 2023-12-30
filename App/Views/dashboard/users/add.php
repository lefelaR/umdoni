<?php
    global $context;
    if(!is_null($context->data)) 
        $data = $context->data;

        use App\Models\Countries;

    $crumbs = getCrumbs(); //this function will get the query string.

echo '
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Details</h1> 
    <ol class="breadcrumb">';
    
    foreach ($crumbs as $key => $crumb) 
    {
        if($key == (count($crumbs)-1))
        {
            $active = 'active';
            echo '<li class="breadcrumb-item '.$active.'" aria-current="page">'.$crumb.'</li>';
        }
        else
        {
             $active = '';
             echo '<li class="breadcrumb-item '.$active.'" aria-current="page">'.$crumb.'</li>';
        }
    }
      echo'

    </ol>
  </div>';

             if(isset($data['user_id']))
            {
                $user_id =  $data['user_id'];
                $action = 'update';
            }
            else
            {
                $user_id = '';
                $action = 'save';
            }
            $first_name = (isset($data['first_name'])) ? $data['first_name'] : '';
            $last_name = (isset($data['last_name'])) ? $data['last_name'] : '';
            $email = (isset($data['email'])) ? $data['email'] : '';
            $mobile_number = (isset($data['mobile_number'])) ? $data['mobile_number'] : '';
            $mobile_number= (isset($data['mobile_number'])) ? $data['mobile_number'] : '';
            $address_1=  (isset($data['address_1'])) ? $data['address_1'] : '';
            $address_2= (isset($data['address_2'])) ? $data['address_2'] : '';
           
            $town = (isset($data['town'])) ? $data['town'] : '';
            $postal_code= (isset($data['postal_code'])) ? $data['postal_code'] : '';

        

echo'<div class="col-xl-8 col-lg-7 mb-4">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                      <div class="dropdown-header">Action</div>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" id="delete"  href="delete?id='.$user_id.'"> <i class="far fa-trash-alt"></i>&nbsp; Delete</a>
                    </div>

                  </div>
            </div>

            <div class="card-body">
                <form class="form" action="'.$action.'" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden"  id="user_id" value="'.$user_id.'" >
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="first-name">Name</label>
                                <input type="text" class="form-control" name="first_name" value="'.$first_name.'" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Well never share your
                                    email with anyone else.</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="last-name">Surname</label>
                                <input type="text" class="form-control" name="last_name" id="last-name" value="'.$last_name.'">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="'.$email.'">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="mobile_number">Phone Number</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="'.$mobile_number.'">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="mobile_number">Address line 1</label>
                                <input type="text" class="form-control" name="address_1" id="address_1" value="'.$address_1.'">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="mobile_number">Address line 2</label>
                                <input type="text" class="form-control" name="address_2" id="address_2" value="'.$address_2.'">
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group ">
                            <label for="mobile_number">Province</label>';

                            $provinces = countries::getProvinces();
                            $provinces = array_column($provinces,'ProvinceName','ProvinceID');

                            $province = (isset($data['province_id'])) ? $data['province_id'] : '';
                            $selectedProvince = (!empty($province))? $provinces[$province] : '' ;

                            echo' <select class="form-control mb-3" name="province" id="province">

                                    <option value="'.$province.'">'.$selectedProvince.'</option>';
                                    
                                    foreach ($provinces as $ikey => $val) 
                                    {
                                        echo '<option value="'.$ikey.'">'.$val.'</option>';
                                    }

                            echo'</select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="mobile_number">city</label>';

                            if(isset($province) && $province > 0)
                            {
                                $regions = countries::getRegion($province);
                                $regions = array_column($regions, 'RegionName', 'RegionID');
                            } 
                            else{
                                $regions = countries::getRegions();
                                $regions = array_column($regions, 'RegionName', 'RegionID');
                            }   

                            $city =   (isset($data['region_id'])) ? $data['region_id'] : '';
                            $selectedRegion = (!empty($city))? $regions[$city] : '' ; 

                            echo' <select class="form-control mb-3" name="city" id="city">
                                      <option value="'.$city.'">'.$selectedRegion.'</option>';

                                        foreach ($regions as $key => $region) 
                                        {  
                                            echo '<option value="'.$key.'">'.$region.'</option>';
                                        }
   
                                  echo'</select>
                                </div>
                        </div>

                       
                      
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_number">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="postal_code" value="'.$postal_code.'">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="submit-btn" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>';
?>

<script>

$(function(){
 $("#province").change(function(){
     debugger
  let num = $("#province").val();
    $.ajax({
        url: "<?php echo buildurl('dashboard/users/regions?ProvinceID=')?>"+num, 
        type: "GET",
    
        success: function(result){
debugger;
            console.log(result);
  }});

 })
});

</script>
