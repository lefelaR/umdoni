<nav class="navbar navbar-expand-lg bg-transparent" aria-label="Main navigation">
  <div class="container-fluid">
    <span class="my-0 mr-md-auto navbar-brand pl-5"><a href="<?php echo buildurl('index/index'); ?>">
        <img src="<?php echo url("assets/img/icon/logo.png")
                  ?>" class="logo" class="logo" style="width: 80px;
          position: relative;" />
      </a>
    </span>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <div class="d-flex" role="search">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a href="<?php echo buildurl("services/index") ?>" class="fw-bold">Services</a></li>
          <li class="nav-item"><a href="<?php echo buildurl("councillors/index") ?>" class="fw-bold">Leadership</a></li>
          <li class="nav-item"><a href="<?php echo buildurl("calendar/index") ?>" class="fw-bold">Calendar</a></li>
          <li class="nav-item"><a href="<?php echo buildurl("news/index") ?>" class="fw-bold">News</a></li>
          <li class="nav-item"><a href="<?php echo buildurl("contact/index") ?>" class="fw-bold">Contact Us</a></li>
          <!-- <li class="nav-item"><i class="fa-solid fa-language fs-5"></i></li> -->
          <li>
            <a href="<?php echo buildurl('dashboard/index/index') ?>" data-toggle="tooltip" title="login">
              <i class="bi bi-lock-fill"></i>
            </a>
          </li>
      </div>
    </div>
  </div>
</nav>