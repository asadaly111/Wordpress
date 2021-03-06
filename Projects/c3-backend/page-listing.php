<?php global $current_user; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Global Logistics Solutions</title>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
  <!-- END Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/plugins/calendars/fullcalendar.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/calendars/fullcalendar.min.css">
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="navbar-brand" href="index.html">
            <img class="brand-logo" alt="stack admin logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
        </ul>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="avatar avatar-online">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                <span class="user-name"><?php echo $current_user->data->display_name; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo wp_logout_url(site_url('/login/')); ?>"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="<?php echo site_url('/c3/user-dashboard/'); ?>"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="">Dashboard</span></a></li>
        <li class=" nav-item"><a href="<?php echo site_url('/user-dashboard/post-load/'); ?>"><i class="fa fa-files-o"></i><span class="menu-title" data-i18n="">Post Load</span></a></li>
        <li class=" nav-item active"><a href="<?php echo site_url('/user-dashboard/listing/'); ?>"><i class="fa fa-th-list"></i><span class="menu-title" data-i18n="">Listing </span></a></li>
        <!-- <li class=" nav-item"><a href="<?php //echo site_url(''); ?>"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="">Discussion </span></a></li> -->
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">


<?php if (empty($_GET['detail'])): ?>
  
                <div class="card-content collapse show">
                  <div class="card-body  card-dashboard">
                    <div class="top-heading clearfix">
                      <h2>C3 – Global Logistics Solutions</h2>
                      <h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" />Listing <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" /></h1>
                    </div><!--top heading end-->
                    <div class="maain-tabble table-responsive">
                      <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                          <tr>
                            <th>S.no</th>
                            <th>Customer Name</th>
                            <th>Pickup Date </th>
                            <th>Delivery Drop Off Date </th>
                            <th>Status</th>
                            <th>Weight </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // Current ID 
                          $user_id  = get_current_user_id();
                          $q = new WP_Query(
                            array(
                              'post_type' => array('truck_load'),
                              'author' => $user_id,
                              'orderby' => 'date',
                              'order' => 'DESC',
                              'post_status' => array('publish','pending'),
                            )
                          );
                          
                          if ($q->have_posts()):
                           $i = 1;
                          while ($q->have_posts()) : $q->the_post();
                            $load_origin_city       = get_post_meta( get_the_ID(), 'load_origin_city', true);
                            $load_destination_city  = get_post_meta( get_the_ID(), 'load_destination_city', true);
                            $load_origin_state      = get_post_meta( get_the_ID(), 'load_origin_state', true);
                            $load_destination_state = get_post_meta( get_the_ID(), 'load_destination_state', true);
                            $Pick_up_Date           = get_post_meta( get_the_ID(), 'Pick_up_Date', true);
                            $Delivery_Drop_off_Date = get_post_meta( get_the_ID(), 'Delivery_Drop_off_Date', true);
                            $load_restinfo            = get_post_meta( get_the_ID(), 'load_restinfo', true);
                            $Weight = get_post_meta( get_the_ID(), 'Weight', true);
                            ?>
                            <tr>
                              <td><?php echo $i;$i++; ?></td>
                              <td><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Profile_03.png" class="tab-img" alt="" /><?php echo $load_restinfo['Contact-Name']; ?></td>
                              <td><?php echo $Pick_up_Date; ?></td>
                              <td><?php echo $Delivery_Drop_off_Date; ?></td>
                              <td><?php echo get_post_status(); ?></td>
                              <td><?php echo $Weight; ?> LBS <div class="btn-group mr-1 mb-1">
                                <button type="button" class="btn dropdown-toggle btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 21px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a class="dropdown-item" href="<?php echo site_url('/user-dashboard/listing/?detail=ture&id='.get_the_ID()); ?>"><i class="fa fa-eye"></i>View</a>
                                  <!-- <a class="dropdown-item" href="<?php //echo site_url('/user-dashboard/listing/?detail=ture&id='.get_the_ID()); ?>"><i class="fa fa-pencil"></i>Edit</a> -->
                                </div>
                              </div></td>
                            </tr>
                          <?php endwhile;
                        
                          endif;  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>


<?php else: 

$post_id = $_GET['id'];
$args = array(
  'p'         => $post_id,
  'post_type' => array('truck_load'),
  'post_status' => array('publish', 'pending'),
);
$my_posts = new WP_Query($args);
while ( $my_posts->have_posts() ) : $my_posts->the_post(); 

$load_origin_city         = get_post_meta( get_the_ID(), 'load_origin_city', true);
$load_origin_state        = get_post_meta( get_the_ID(), 'load_origin_state', true);
$load_destination_city    = get_post_meta( get_the_ID(), 'load_destination_city', true);
$load_destination_state   = get_post_meta( get_the_ID(), 'load_destination_state', true);
$Pick_up_Date             = get_post_meta( get_the_ID(), 'Pick_up_Date', true);
$Delivery_Drop_off_Date   = get_post_meta( get_the_ID(), 'Delivery_Drop_off_Date', true);
$load_restinfo            = get_post_meta( get_the_ID(), 'load_restinfo', true);
$Weight                   = get_post_meta( get_the_ID(), 'Weight', true);
//pr($load_restinfo); ?>


<div class="card-content collapse show">
    <div class="card-body  card-dashboard">
      <div class="top-heading clearfix">
        <h2>C3 – Global Logistics Solutions</h2>
        <h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="">Listing Details <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt=""></h1>
      </div><!--top heading end-->
      <div class="listing-detail-main">
        <div class="row">
          <div class="col-md-2 col-sm-12"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-profile-img.jpg" class="profile-img" alt=""></div>
          <div class="col-md-10 col-sm-12">
            <h2><?php echo $load_restinfo['Contact-Name']; ?> <!-- <span>Lorem Ipsum</span> --></h2>
            <p><?php echo get_the_content(); ?></p>
            <div class="row listing-detail-main-bottom">
              <div class="col-md-4 col-sm-12">
                <p><i class="fa fa-transgender"></i>Name <span class="client-innr-span"><?php echo $load_restinfo['Contact-Name']; ?></span></p>
                <p><i class="fa fa-calendar"></i>Pick Up Date <span class="client-innr-span"><?php echo $Pick_up_Date; ?></span></p>
                <p><i class="fa fa-envelope"></i>Email<span class="client-innr-span"><?php echo $load_restinfo['email']; ?></span></p>

                <p><i class="fa fa-globe"></i>Origin City<span class="client-innr-span"><?php echo $load_origin_city ?></span></p>
                <p><i class="fa fa-globe"></i>Origin State<span class="client-innr-span"><?php echo $load_origin_state ?></span></p>

              </div>
              <div class="col-md-4 col-sm-12">
                <p><i class="fa fa-phone"></i>Phone Number <span class="client-innr-span"><?php echo $load_restinfo['contact-Number']; ?></span></p>
                <p><i class="fa fa-calendar"></i>Delivery Drop Off Date: <span class="client-innr-span"><?php echo $Delivery_Drop_off_Date; ?></span></p>
                <!-- <p><i class="fa fa-map-marker"></i>Address <span class="client-innr-span">14 Street Rosville, California USA</span></p> -->
                
                <p><i class="fa fa-globe"></i>Destination City<span class="client-innr-span"><?php echo $load_destination_city ?></span></p>
                <p><i class="fa fa-globe"></i>Destination State<span class="client-innr-span"><?php echo $load_destination_state ?></span></p>
                <p><i class="fa fa-globe"></i>Weight<span class="client-innr-span"><?php echo $Weight; ?> LBS</span></p>
              
              </div>
            </div>
            <!-- <div class="cntr-btnn-main">
              <button>Talk to Admin</button>
            </div> -->
          </div>
        </div><!--row end-->
      </div><!--listing detail main end-->
    </div>
  </div>






<?php endwhile; ?>


<?php endif; ?>





              </div>



            </div>
          </div>
        </section>
        <!-- // Basic form layout section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-dark">
    <p>2018 © C3. All Right Reserved.  </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/extensions/moment.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/extensions/fullcalendar.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/extensions/fullcalendar.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>
</html>