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
                    <div class="btn-group" role="group" id="municipal-settings"
                        aria-label="BMunicipal Profile Settings">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1">Category</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2">Ward</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio3">Political party</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                Message alert
            </div>
            <div class="card-body">
                <p class="fw-lighter">
                    This is the alert message that will show up on the home page
                </p>
                <div class="alert alert-primary text-center card-hover">
                    <p class="fw-bold">ANTI FRAUD AND CORRUPTION HOTLINE: 0801 111 660 –
                        information@whistleblowing.co.za- Fax: 086 5222 816 – P.O. Box 51006, Musgrave, 4001</p>
                    <p class="">UMDONI DISASTER MANAGEMENT CENTRE: (039) 974 6200</p>
                    <p class="">UGU DISTRICT DISASTER MANAGEMENT CENTRE: (039) 682 2414</p>
                </div>

                <textarea hidden class="form-control" name="alert" id="body" type="text" rows="10">


                </textarea>

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

            profile: {
                category: cat,
                ward: ward,
                political: pol
            },

        });

        const currentURL = window.location.href;
        const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));
        fetch(stripped + '/profile', {
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

    
    document.querySelector('.alert.alert-primary.text-center.card-hover').addEventListener('click',function() {
        
        this.style.display ='none';
    alertform = document.getElementById('alert') 
    alertform.removeAttribute('hidden');   
    alertform.style.display="block";
})

</script>