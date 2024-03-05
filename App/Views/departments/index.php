<style>
    #service-page {
        background-image: linear-gradient(rgba(15, 7, 50, 0.079), rgba(12, 3, 51, 0.084)),
            url('<?php echo url("assets/img/strips/Umdoni-Beach_strip2.jpg") ?>');
        min-height: 40vh;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
    }



    #service-page p {
        bottom: 0px;
        position: absolute;
        font-size: 8em !important;
    }


    nav {
        width: 100%;
        position: relative;
        top: 0;
        left: 0;
        padding: 8px 1%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 20;
        background-color: #fff;
        color: #000;
    }

    nav ul li a {
        color: #000;
    }

    nav ul li i {
        color: #000;
    }
</style>


<div class="container-fluid" id="service-page">
    <div class="row">
        <div class="tag-header">
            <div class="col">
                <p class="h1 m-5 fs-1 text-white">
                    Municipal Departments
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container content-section">
    <div class="row">

        <div class="col-md-12 col-lg-12">
            <p class="h1 text-uppercase fw-bold text-secondary">
                List of Municipal Departments
            </p>
            <p class="fw-lighter fs-5 my-5">
                Discover the core departments of Umdoni Municipality, each dedicated to serving our community's diverse needs. Our departments include:<br/>
                * The Office of the Municipal Manager: Overseeing municipal operations and strategic leadership.<br/>
                * Corporate Services: Handling administrative functions and human resources.<br/>
                * Finance Department: Managing municipal finances, budgeting, and fiscal planning.<br/>
                * Technical Services: Focused on infrastructure, maintenance, and technical projects.<br/>
                * Community Services: Providing social, health, and recreational services to residents.<br/>
                * Planning and Development: Responsible for urban planning, development, and environmental management.<br/>
                Explore each department for insights into their roles and contributions to Umdoni's growth and well-being.<br/>
            </p>
        </div>

        <div class="col-md-4 my-2">
            <a href="<?php echo buildurl('departments/manager') ?>">
                <div class="card card-hover">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-globe fs-1 text-yellow m-3"></i>
                            <p class="h5 m-3"> Office of the Municipal Manager</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 my-2">
            <a href="<?php echo buildurl('departments/finance') ?>">
                <div class="card  card-hover">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-cash fs-1 text-yellow m-3"></i>
                            <p class="h5 m-3">Finance Department</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 my-2">
            <a href="<?php echo buildurl('departments/corporate') ?>">
                <div class="card  card-hover">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-building fs-1 text-yellow m-3"></i>
                            <p class="h5 m-3">Corporate Services Department</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 my-2">
            <a href="<?php echo buildurl('departments/technical') ?>">
                <div class="card  card-hover">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-tools fs-1 text-yellow m-3"></i>
                            <p class="h5 m-3">Technical Services Department</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 my-2">
            <a href="<?php echo buildurl('departments/community') ?>">
                <div class="card  card-hover">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-flag fs-1 text-yellow m-3"></i>
                            <p class="h5 m-3">Community Services Department</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 my-2">
            <a href="<?php echo buildurl('departments/planning') ?>">
                <div class="card  card-hover">
                    <div class="card-body">
                        <div class="d-flex inline">
                            <i class="bi bi-pentagon fs-1 text-yellow m-3"></i>
                            <p class="h5 m-3">Planning and Development</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>