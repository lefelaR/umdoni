<?php
global $context;
$data = $context->data;
$crumbs = getCrumbs();
echo '
<div class="row">
    <h1>
        Settings
    </h1>
    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">';
foreach ($crumbs as $key => $crumb) {
    if ($key == (count($crumbs) - 1)) {
        $active = 'active';
        echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
    } else {
        $active = '';
        echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>';
    }
}
echo '
            </ol>
        </nav>
    </div>
</div>
';
?>

<?php



?>



<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                Profile settings
            </div>
            <div class="card-body">
                <div class="">
                    <p class="fw-lighter">
                        Order Councillors by:
                    </p>
                    <div class="btn-group" role="group" id="municipal-settings" aria-label="BMunicipal Profile Settings">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1">Category</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" >
                        <label class="btn btn-outline-primary" for="btnradio2">Ward</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" >
                        <label class="btn btn-outline-primary" for="btnradio3">Political party</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let cat = document.getElementById("btnradio1").checked;
    let ward = document.getElementById("btnradio2").checked;
    let pol = document.getElementById("btnradio3").checked;

    var profileSettings = document.getElementById("municipal-settings");
    profileSettings.addEventListener("change", (e) => {

        let formData = ({
             
            profile : {         
                category : cat,
                ward: ward,
                political: pol
            },
                 
     });
      

    const currentURL = window.location.href;
    const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));

   fetch(stripped+'/profile', {
    method: "post",
    body: formData,
  })
    .then((response) => {
      result = response;
    })
    .catch((error) => {
      throw error;
    });


    })
</script>