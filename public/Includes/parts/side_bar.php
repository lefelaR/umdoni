<?php
global $context;
$crumbs = getCrumbs();
$permissions = array();


// use crumbs to determine what is active
$sidebarItems = [
  (object)[
    'label' => 'Dashboard',
    'name' => 'dashboard',
    'icon' => 'bi bi-grid-fill',
    'hasSub' => false, 
    'url' => buildurl("dashboard/index/index")
  ],
  (object)[
    'label' => 'Event Management',
    'name' => 'eventManagement',
    'icon' => 'bi bi-book-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Projects', 'url' => buildurl("dashboard/projects/index")],
      (object)['label' => 'Events', 'url' => buildurl("dashboard/events/index")],
      (object)['label' => 'Notices', 'url' => buildurl("dashboard/notices/index")],
      (object)['label' => 'Meetings', 'url' => buildurl("dashboard/meetings/index")],
      (object)['label' => 'Agendas', 'url' => buildurl("dashboard/agendas/index")]
    ]
  ],
  (object)[
    'label' => 'Content Management',
    'name' => 'contentManagement',
    'icon' => 'bi bi-stack',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Newsletters', 'url' => buildurl("dashboard/newsletters/index")],
      (object)['label' => 'News', 'url' => buildurl("dashboard/news/index")],
    ]
  ],

  (object)[
    'label' => 'Service Management',
    'name' => 'serviceManagement',
    'icon' => 'bi bi-inbox-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Services', 'url' => buildurl("dashboard/services/index")],
      (object)['label' => 'Requests', 'url' => buildurl("dashboard/services/requests")],
    ]
  ],
  (object)[
    'label' => 'Official Profiles',
    'name' => 'officialProfiles',
    'icon' => 'bi bi-people-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Exco Members', 'url' => buildurl("dashboard/councillors/exco")],
      (object)['label' => 'Councillors', 'url' => buildurl("dashboard/councillors/index")],
      (object)['label' => 'Senior Management', 'url' => buildurl("dashboard/councillors/senior")],
    ]
  ],
  (object)[
    'label' => 'Document Library',
    'name' => 'documentLibrary',
    'icon' => 'bi bi-archive-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Documents', 'url' => buildurl("dashboard/documents/index")],
    ]
  ],

  (object)[
    'label' => 'Human Resources',
    'name' => 'humanResources',
    'icon' => 'bi bi-award-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Vacancies', 'url' => buildurl("dashboard/vacancies/index")],
    ]
  ],


  (object)[
    'label' => 'Economic Development',
    'name' => 'economicDevelopment',
    'icon' => 'bi bi-wallet-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Tenders', 'url' => buildurl("dashboard/tenders/index")],
      (object)['label' => 'Quotations', 'url' => buildurl("dashboard/quotations/index")],
      (object)['label' => 'Request For Proposal', 'url' => buildurl("dashboard/rfps/index")],
    ]
  ],

  (object)[
    'label' => 'System Settings',
    'name' => 'systemSettings',
    'icon' => 'bi bi-gear-fill',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Activity Logs', 'url' => buildurl("dashboard/logs/index")],
      (object)['label' => 'Roles', 'url' => buildurl("dashboard/roles/index")],
      (object)['label' => 'Site Settings', 'url' => buildurl("dashboard/settings/index")],
      (object)['label' => 'User Management', 'url' => buildurl("dashboard/users/index")],
      
    ]
  ],
  (object)[
    'label' => 'Support',
    'name' => 'support',
    'icon' => 'bi bi-headset',
    'hasSub' => true,
    'subItems' => [
      (object)['label' => 'Help Center/ FAQs', 'url' => buildurl("dashboard/support/help")],
      (object)['label' => 'Contact Support', 'url' => buildurl("dashboard/support/contact")],
    ]
  ],
];
?>

<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="index">
            <img src="<?php echo url("assets/img/icon/logo.png") ?>" style="height: 4em;" alt="Logo" srcset="" />
          </a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>

    <?php
 

    if(!isset($_SESSION['sidebar']))
    {
      $_SESSION['sidebar'] = $sidebarItems;
    }


    if (isset($_SESSION['role'][0]['permissions'])) {
      $permissions = json_decode($_SESSION['role'][0]['permissions']);
    }

    echo '<div class="sidebar-menu">
      <ul class="menu">';

    foreach ($sidebarItems as $link) {

      if ($link->hasSub === true) {
        $sub = 'has-sub';
        $subItems = $link->subItems;
        $sidebarItemActive = '';
        foreach ($subItems as $value) {
          if ($crumbs[1] == strtolower($value->label)) $sidebarItemActive = 'active';
        }

        if (property_exists($permissions, $link->name) && $permissions->{$link->name} == 'on') {

          echo
          '<li class="sidebar-item  ' . $sidebarItemActive . ' ' . $sub . '">
          <a href="#" class="sidebar-link">
          <i class="' . $link->icon . '"></i>
          <span>' . $link->label . '</span>
          </a>';
        }
        echo ' <ul class="submenu  ' . $sidebarItemActive . ' ">';

        foreach ($subItems as $key => $subItem) {
          $page = strtolower($subItem->label);
          if ($page == $crumbs[1]) $submenuItemActive = 'active';
          else $submenuItemActive = '';
          echo '
            <li class="submenu-item  ' . $submenuItemActive . ' ">
              <a href="' . $subItem->url . '">' . $subItem->label . '</a>
            </li>';
        }
        echo '</ul></li>';
      } else {
        $sub = '';

        echo '
      <li class="sidebar-item   ' . $sub . '">
        <a href="' . $link->url . '" class="sidebar-link">
        <i class="' . $link->icon . '"></i>
        <span>' . $link->label . '</span>
        </a>
      </li>
      ';
      }
    }

    ?>
    <li class="sidebar-item">
      <a href="<?php echo buildurl("Authentication/logout") ?>" class="sidebar-link">
        <i class="bi bi-box-arrow-left"></i>
        <span>Signout</span>
      </a>
    </li>
    <?php
    echo '</ul>';
    echo '</div>';
    ?>
  </div>
  <button class="sidebar-toggler btn x">
    <i data-feather="x"></i>
  </button>
</div>