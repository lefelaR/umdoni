<?php

global $context;
$data = $context->data;

?>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <?php

                                $requests = $data['requests'];
                                $requestCount = count($requests);

                                echo '
                               
                                <div class="col-md-8"  data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Service requests to the municipality">
                                <a href="'.buildurl("dashboard/services/requests").'">
                                    <h6 class="text-muted font-semibold">Service Requests</h6>
                                    <h6 class="font-extrabold mb-0">' . $requestCount . '</h6>
                                    </a>
                                </div>
                                
                                ';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>

                                <?php
                                $projects = $data['projects'];
                                $projectCount = count($projects);
                                echo '
                                <div class="col-md-8"  data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Municipal project">
                                <a href="'.buildurl("dashboard/projects/index").'">
                                <h6 class="text-muted font-semibold">Projects</h6>
                                <h6 class="font-extrabold mb-0">' . $projectCount . '</h6>
                                </a>
                            </div>
                                '
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>

                                <?php
                                $events = $data['events'];
                                $eventCount = count($events);
                                echo '
                                
                                  <div class="col-md-8"  data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Municipal events">
                                  <a href="'.buildurl("dashboard/events/index").'">
                                    <h6 class="text-muted font-semibold">Events</h6>
                                    <h6 class="font-extrabold mb-0">' . $eventCount . '</h6>
                                    </a>
                                </div>
                                
                                ';
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>

                                <?php

                                $notices = $data['notices'];
                                $noticeCount = count($notices);

                                echo '
                                 <div class="col-md-8"  data-bs-toggle="tooltip" data-bs-placement="top"
                                 title="Municipal notices">
                                 <a href="'.buildurl("dashboard/notices/index").'">
                                    <h6 class="text-muted font-semibold">Notices</h6>
                                    <h6 class="font-extrabold mb-0">' . $noticeCount . '</h6>
                                </a>
                                    </div>
                                '
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Activity log</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit">
                                <!-- you can find this data in themes pages dashboard -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
               <!-- <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                         <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                             <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" /> 
                                        </svg>
                                        <h5 class="mb-0 ms-3">Europe</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">862</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-europe"></div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                            <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">1025</h5>
                                </div>
                                <div class="col-12">
                                    <div id="chart-indonesia"></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>-->



                <!-- upcoming events -->
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upcoming Events</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if (isset($data['events']) && count($data['events']) > 0) {
                                            $events = $data['events'];

                                            foreach ($events as $key => $event) {
                                                if ($key < 3) {
                                                    echo '
                                                <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="' . $event['location'] . '">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">' . $event['title'] . '</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">' . $event['body'] . '</p>
                                                </td>
                                                </tr>
                                                ';
                                                }
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- upcoming event s -->
            </div> 
        </div>


        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <a href="<?php echo buildurl('admin/user/index') ?>">
                        <div class="d-flex align-items-center">
                            <?php
                            $profile = $data['profile'];
                            $avatar = isset($profile['location'])  ? $profile['location'] : url('assets/img/profile/pro.png');  
                            
                    echo '
                         <div class="avatar avatar-xl">
                        <img src="' . $avatar . '" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">' . $profile['first_name'] . '</h5>
                        <h6 class="text-muted mb-0">' . $profile['email'] . '</h6>
                    </div>
                        ';

                            ?>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>INTERNAL USERS</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1">SAMRAS</h5>
                            <h6 class="text-muted mb-0">
                                <a title="SamrasWebPortal" href="https://samras.umdoni.gov.za/INpJus02/loginDefault" target="_blank" rel="noopener noreferrer">Samras.Web</a>
                            </h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1">EMAIL LOGIN</h5>
                            <h6 class="text-muted mb-0">
                                <a title="EmailsOnWeb" href="https://webmail.umdoni.gov.za/owa/" target="_blank" rel="noopener noreferrer">Email Login</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
  var service_requests = <?php echo json_encode($requests)?>
</script>