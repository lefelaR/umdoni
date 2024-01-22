
<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="index">
            <img src="<?php echo url("assets/img/icon/logo.png") ?>" style="height: 4em; alt=" Logo" srcset="" />
          </a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-item ">
          <a href="<?php echo buildurl("dashboard/index/index") ?>" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-book-fill"></i>
            <span>Event Management</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/projects/index") ?>">Projects</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/events/index") ?>">Events</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/notices/index") ?>">Notices</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/meetings/index") ?>">Meetings</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/agendas/index") ?>">Agendas</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-stack"></i>
            <span>Content Management</span>
          </a>

          <ul class="submenu">
            <li class="sidebar-title">Publications</li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/publications/index") ?>">Newsletters</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/news/index") ?>">News</a>
            </li>
          </ul>
        </li>


        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-inbox-fill"></i>
            <span>Service Management</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/services/index") ?>">All Services</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/services/requests") ?>">Service Requests</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-people-fill"></i>
            <span>Official Profiles</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/councillors/index") ?>"> Councillors</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/councillors/senior") ?>">Senior Management</a>
            </li>
          </ul>
        </li>


        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-archive-fill"></i>
            <span>Document Library</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/documents/index") ?>">Documents</a>
            </li>
            <!-- <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/documents/reports") ?>"> Annual Reports </a>
            </li> -->
          </ul>
        </li>

        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-award-fill"></i>
            <span>Human Resources</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/vacancies/index") ?>"> Vacancies </a>
            </li>
          </ul>
        </li>


        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-chat-right-fill"></i>
            <span>Community Engagement</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <!-- <a href="<?php echo buildurl("dashboard/wardinfo/index") ?>"> -->
              UMdoni Ward Profiles
              <!-- </a> -->
            </li>
          </ul>
        </li>


        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-wallet-fill"></i>
            <span>Economic Development</span>
          </a>

          <ul class="submenu">
            <li class="sidebar-title">Business Opportunities</li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/tenders/index") ?>"> Tenders</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/quotations/index") ?>">Quotations</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-gear-fill"></i>
            <span>System Settings</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/users/index") ?>">User Management</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/settings/index") ?>">Site Settings</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/logs/index") ?>">Activity Logs</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <hr class="dropdown-divider">
        </li>

        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-headset"></i>
            <span>Support</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/support/help") ?>">Help Center/ FAQ's</a>
            </li>
            <li class="submenu-item">
              <a href="<?php echo buildurl("dashboard/support/contact") ?>">Contact Support</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <hr class="dropdown-divider">
        </li>

        <li class="sidebar-item">
          <a href="<?php echo buildurl("Authentication/logout") ?>" class="sidebar-link">
            <i class="bi bi-box-arrow-left"></i>
            <span>Signout</span>
          </a>
        </li>
      </ul>
    </div>
    <button class="sidebar-toggler btn x">
      <i data-feather="x"></i>
    </button>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get all sidebar items
    var sidebarItems = document.querySelectorAll('.sidebar-item');

    // Add click event listener to each sidebar item
    sidebarItems.forEach(function (item) {
      item.addEventListener('click', function () {
        // Remove "active" class from all sidebar items
        sidebarItems.forEach(function (sidebarItem) {
          sidebarItem.classList.remove('active');
        });

        // Add "active" class to the clicked sidebar item or its parent if it has a submenu
        var parentItem = item.closest('.sidebar-item.has-sub') || item;
        parentItem.classList.add('active');
      });

      // Add click event listener to submenu items
      var submenuItems = item.querySelectorAll('.submenu-item');
      submenuItems.forEach(function (submenuItem) {
        submenuItem.addEventListener('click', function (event) {
          // Stop event propagation to prevent triggering the parent sidebar item click
          event.stopPropagation();

          // Remove "active" class from all sidebar items
          sidebarItems.forEach(function (sidebarItem) {
            sidebarItem.classList.remove('active');
          });

          // Add "active" class to the parent sidebar item of the clicked submenu item
          var parentItem = item.closest('.sidebar-item.has-sub') || item;
          parentItem.classList.add('active');
        });
      });
    });
  });
</script>