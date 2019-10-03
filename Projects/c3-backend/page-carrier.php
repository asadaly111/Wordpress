<?php global $current_user; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 
   <title>Global Logistics Solutions</title>
   <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
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
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/index.html">
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
              <a class="dropdown-toggle nav-link dropdown-user-link" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                <span class="user-name"><?php echo $current_user->data->display_name; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/#"><i class="ft-user"></i> Edit Profile</a>
            <!--     <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/#"><i class="ft-menu"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">        
           <li class="nav-item active"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/become-a-career.html"><i class="fa fa-truck"></i><span class="menu-title" data-i18n="">Become a Carrier</span></a></li>      
           <li class=" nav-item"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/find-load.html"><i class="fa fa-search"></i><span class="menu-title" data-i18n="">Find a load</span></a></li>
           <li class=" nav-item"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/post-load.html"><i class="fa fa-files-o"></i><span class="menu-title" data-i18n="">Post Load</span></a></li>
           <li class=" nav-item"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/listing.html"><i class="fa fa-th-list"></i><span class="menu-title" data-i18n="">Listing </span></a></li>
           <li class=" nav-item"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/careers.html"><i class="fa fa-briefcase"></i><span class="menu-title" data-i18n="">Careers </span></a></li>
           <li class=" nav-item"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/discussion.html"><i class="fa fa-comments"></i><span class="menu-title" data-i18n="">Discussion </span></a></li>
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
                   	<h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" />Carrier Setup <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" /></h1>
                   	<p>Please enter details in the below fields to facilitate the Setup of your Carrier</p>
                   </div><!--top heading end-->
                   
     
  <!--<button name="file" class="uplon-btn2" onclick="document.getElementById('upload').click()"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/upload-img.jpg" class="img-full" alt=""></button>
<input type="file" id="upload" name="file">
<p class="pro-pic-txt">Profile Picture</p>-->
         
                                                           
  <div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group">
 <input type="text"  class="form-control" placeholder="MC Number:" name="employeename">
</div><!--form group end-->

</div><!--col 6 end-->

<div class="col-md-6 col-sm-12">
<div class="form-group">
 <input type="text"  class="form-control" placeholder="Carrier Name:" name="employeename">
</div><!--form group end-->


</div><!--col 6 end-->


</div><!--row end-->


  <div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group">
  <input type="text"  class="form-control" placeholder="DOT Number:" name="employeename">
</div><!--form group end-->

</div><!--col 6 end-->

<div class="col-md-6 col-sm-12">
<div class="form-group">
 <input type="text"  class="form-control" placeholder="Contact Person:" name="employeename">
</div><!--form group end-->


</div><!--col 6 end-->


</div><!--row end-->


  <div class="row">
<div class="col-md-12 skin skin-square">
<div class="form-group p-2">
 <label>Equipment:</label> 
<fieldset>
<input type="checkbox" id="input-25">
<label class="white" for="input-25">Van</label>
</fieldset>
<fieldset>
<input type="checkbox" id="input-26">
<label class="white" for="input-26">Flat</label>
</fieldset> 
 <fieldset>
<input type="checkbox" id="input-27">
<label class="white" for="input-27">Reefer</label>
</fieldset>
<fieldset>
<input type="checkbox" id="input-28">
<label class="white" for="input-28">Specialized</label>
</fieldset>
<fieldset>
<input type="checkbox" id="input-29">
<label class="white" for="input-29">Drayagev</label>
</fieldset>

 
              
</div><!--form group end-->

</div><!--col 
 end-->


</div><!--row end-->



   <div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group">
<input type="text"  class="form-control" placeholder="Phone Number:" name="employeename">
</div><!--form group end-->

</div><!--col 6 end-->

<div class="col-md-6 col-sm-12">
<div class="form-group">
<input type="text"  class="form-control" placeholder="Email:" name="employeename">
</div><!--form group end-->


</div><!--col 6 end-->


</div><!--row end-->
 

   <div class="row">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<input type="text"  class="form-control" placeholder="City, State:" name="employeename">
</div><!--form group end-->

</div><!--col 6 end-->



</div><!--row end-->
 

  <div class="row">
<div class="col-md-12 skin skin-square">
<div class="form-group p-2">
 
<fieldset>
<input type="checkbox" id="input-30">
<label class="white" for="input-30">Is this a Customs Broker request?</label>
</fieldset>
       
</div><!--form group end-->

</div><!--col 
 end-->


</div><!--row end-->



   <div class="row">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<textarea  class="form-control carer-txtara" placeholder="Comments:"></textarea>
</div><!--form group end-->

</div><!--col 6 end-->



</div><!--row end-->


 <div class="row">
<div class="col-md-12 skin  skin-square">
<div class="form-group p-2">
 <label>Do you have an empty truck?:</label> 
<fieldset>
<input type="radio" name="input-radio-3" id="input-radio-11">
<label for="input-radio-11">Yes</label>
</fieldset>
<fieldset>
<input type="radio" name="input-radio-3" id="input-radio-12" checked>
<label for="input-radio-12">No</label>
 </fieldset>
 
              
</div><!--form group end-->

</div><!--col 
 end-->


</div><!--row end-->




<div class="dorn-btn-main">
<p>Download the complete Form in PDF, fillout and submit here.</p>
  <button><i class="fa fa-download" aria-hidden="true"></i> Download PDF</button>
 <button><i class="fa fa-upload" aria-hidden="true"></i> Upload Here</button>          	
</div>
     <br>
        <div class="cntr-btnn-main">

  <button>Cancel</button>
 <button>Send</button>          	
</div>   
        
  <p align="center">* Please enter either one of the MC# or DOT# and either one of email or phone#</p>
  
  
  
                    
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
</body>
</html>