<?php global $current_user; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Global Logistics Solutions</title>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
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
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/plugins/forms/checkboxes-radios.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->

<form action="" method="POST" id="loginform">

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
              <!--   <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
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
           <li class=" nav-item active"><a href="<?php echo site_url('/user-dashboard/post-load/'); ?>"><i class="fa fa-files-o"></i><span class="menu-title" data-i18n="">Post Load</span></a></li>
           <li class=" nav-item"><a href="<?php echo site_url('/user-dashboard/listing/'); ?>"><i class="fa fa-th-list"></i><span class="menu-title" data-i18n="">Listing </span></a></li>
           <!-- <li class=" nav-item"><a href="<?php echo site_url(''); ?>"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="">Discussion </span></a></li> -->
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
              <div class="card rounded">
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="top-heading clearfix">
                      <h2>C3 – Global Logistics Solutions</h2>
                      <h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" />Post Load <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" /></h1>
                    </div><!--top heading end-->
<!--<button name="file" class="uplon-btn2" onclick="document.getElementById('upload').click()"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/upload-img.jpg" class="img-full" alt=""></button>
<input type="file" id="upload" name="file">
<p class="pro-pic-txt">Profile Picture</p>-->

<div class="row">
  <div class="col-md-6 col-sm-12">
    <div class="form-group">
      <input type="date"  class="form-control" placeholder="Pick up Date:" name="Pick-up-Date">
    </div><!--form group end-->
  </div><!--col 6 end-->
  <div class="col-md-6 col-sm-12">
    <div class="form-group">
      <input type="text"  class="form-control" placeholder="Origin State:" name="Origin-State">
    </div><!--form group end-->
  </div><!--col 6 end-->
</div><!--row end-->
<div class="row">
  <div class="col-md-6 col-sm-12">
    <div class="form-group">
      <input type="text"  class="form-control" placeholder="Origin City:" name="Origin-City">
    </div><!--form group end-->
  </div><!--col 6 end-->
  <div class="col-md-6 col-sm-12">
    <div class="form-group">
      <input type="text"  class="form-control" placeholder="Destination State:" name="Destination-State">
    </div><!--form group end-->
  </div><!--col 6 end-->
</div><!--row end-->
<div class="row">
  <div class="col-md-6 col-sm-12">
    <div class="form-group">
      <input type="text"  class="form-control" placeholder="Destination Ciry:" name="Destination-City">
    </div><!--form group end-->
  </div><!--col 6 end-->
  <div class="col-md-6 col-sm-12">
    <div class="form-group">
      <input type="date"  class="form-control" placeholder="Delivery Drop off Date:" name="Delivery-Drop-off-Date">
    </div><!--form group end-->
  </div><!--col 6 end-->
</div><!--row end-->
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="form-group">
      <select class="form-control" name="Weight">
        <option>Weight (LBS):</option>
        <option value="1">1 LBS</option>
        <option value="2">2 LBS</option>
        <option value="3">3 LBS</option>
        <option value="4">4 LBS</option>
        <option value="5">5 LBS</option>
        <option value="6">6 LBS</option>
        <option value="7">7 LBS</option>
        <option value="8">8 LBS</option>
        <option value="9">9 LBS</option>
        <option value="10">10 LBS</option>
      </select>
    </div><!--form group end-->
  </div><!--col 6 end-->
</div><!--row end-->
<div class="row">
  <div class="col-md-12 skin skin-square">
    <div class="form-group p-2">
      <label>TYPE:</label>
      <fieldset>
        <input type="checkbox" id="input-25" name="type[]" value="Van">
        <label class="white" for="input-25">Van</label>
      </fieldset>
      <fieldset>
        <input type="checkbox" id="input-26" name="type[]" value="Flatbed">
        <label class="white" for="input-26">Flatbed</label>
      </fieldset>
      <fieldset>
        <input type="checkbox" id="input-27" name="type[]" value="Reefer">
        <label class="white" for="input-27">Reefer</label>
      </fieldset>
      <fieldset>
        <input type="checkbox" id="input-28" name="type[]" value="Etc">
        <label class="white" for="input-28">Etc</label>
      </fieldset>
    </div><!--form group end-->
            </div><!--col
            end-->
          </div><!--row end-->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                  <textarea name="discription" class="form-control" cols="30" rows="10">Description :</textarea>
              </div><!--form group end-->
            </div><!--col 6 end-->
          </div><!--row end-->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text"  class="form-control" placeholder="Company Name:" name="Company-Name">
              </div><!--form group end-->
            </div><!--col 6 end-->
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text"  class="form-control" placeholder="Contact Name:" name="Contact-Name">
              </div><!--form group end-->
            </div><!--col 6 end-->
          </div><!--row end-->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text"  class="form-control" placeholder="Contact Phone:" name="contact-Number">
              </div><!--form group end-->
            </div><!--col 6 end-->
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text"  class="form-control" placeholder="Email Address:" name="email">
              </div><!--form group end-->
            </div><!--col 6 end-->
          </div><!--row end-->
          <div id="errror"></div>
          <div class="cntr-btnn-main">
            <button type="submit">Send</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

</form>

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
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->

<script>
  jQuery(document).ready(function() {

    jQuery(document).on('submit', 'form#loginform', function(event) {
      event.preventDefault();
      var form = jQuery(this);
      form.find('button').prepend('<i class="fa fa-gear spinner"></i>&nbsp;');
      var formData = new FormData(jQuery(form)[0]);
      jQuery.ajax({
        type: 'post',
        url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_postaload',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
      })
      .done(function(value) {
        jQuery('#errror').html('<div class="'+value.class+' mb-2" role="alert">'+value.message+'</div>');
        form.find('button .spinner').remove();
        console.log(value);
        form.trigger('reset');
      })
      .fail(function() {
        form.find('button .spinner').remove();
        console.log("error");
      });

    });

  });
</script>



</body>
</html>