<?php global $current_user; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta name="author" content="PIXINVENT">
   <title>Micheal Anthony</title>
   <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
   rel="stylesheet">
   <!-- BEGIN VENDOR CSS-->
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/vendors.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/forms/icheck/icheck.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/forms/icheck/custom.css">
   <!-- END VENDOR CSS-->
   <!-- BEGIN STACK CSS-->
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/app.css">
   <!-- END STACK CSS-->
   <!-- BEGIN Page Level CSS-->
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/pages/login-register.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/forms/icheck/icheck.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/core/colors/palette-gradient.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/css/plugins/forms/checkboxes-radios.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/css/forms/icheck/custom.css">
   <!-- END Page Level CSS-->
   <!-- BEGIN Custom CSS-->
   <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/assets/css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
   <!-- END Custom CSS-->
</head>
<body class="bg-full-screen-image blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
         <form action="" id="loginRegistration" method="POST" enctype="multipart/form-data">
            <section class="container">
               <div class="col-12 d-flex align-items-center justify-content-center">
                  <div class="row">
                     <div class="col-12">
                        <div class="card rounded">
                           <div class="card-content collapse show">
                              <div class="card-body card-dashboard">
                                 <div class="top-heading clearfix">
                                    <h2>C3 – Global Logistics Solutions</h2>
                                    <h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" />User Registration <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" /></h1>
                                    <p>JOIN OUR GROWING TEAM!!!</p>
                                 </div>
                                 <!--top heading end-->
                                          <!--<button name="file" class="uplon-btn2" onclick="document.getElementById('upload').click()"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/upload-img.jpg" class="img-full" alt=""></button>
                                          <input type="file" id="upload" name="file">
                                          <p class="pro-pic-txt">Profile Picture</p>-->
                                          <div class="row">
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                   <input type="text"  class="form-control" placeholder="First Name:" name="First_Name">
                                                </div>
                                                <!--form group end-->
                                             </div>
                                             <!--col 6 end-->
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                   <input type="text"  class="form-control" placeholder="Last Name:" name="Last_Name">
                                                </div>
                                                <!--form group end-->
                                             </div>
                                             <!--col 6 end-->
                                          </div>
                                          <!--row end-->
                                          <div class="row">
                                             <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                   <input type="email"  class="form-control" placeholder="Email:" name="Email">
                                                </div>
                                                <!--form group end-->
                                             </div>
                                          </div>

                                          <div class="row">
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                   <input type="text"  class="form-control" placeholder="Username:" name="Username">
                                                </div>
                                                <!--form group end-->
                                             </div>
                                             <!--col 6 end-->
                                             <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                   <input type="password"  class="form-control" placeholder="password:" name="password">
                                                </div>
                                                <!--form group end-->
                                             </div>
                                             <!--col 6 end-->
                                          </div>

                                          <!--row end-->
                                          <!--row end-->
                                          <div class="cntr-btnn-main">
                                             <button type="submit">Submit</button>
                                          </div>
                                          <div id="msg"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  </form>
               </div>
            </div>
         </div>
         <!-- BEGIN VENDOR JS-->
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
         <!-- BEGIN VENDOR JS-->
         <!-- BEGIN PAGE VENDOR JS-->
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
         type="text/javascript"></script>
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
         <!-- END PAGE VENDOR JS-->
         <!-- BEGIN STACK JS-->
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/core/app.js" type="text/javascript"></script>
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
         <!-- END STACK JS-->
         <!-- BEGIN PAGE LEVEL JS-->
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
         <script>
         jQuery(document).ready(function() {
            jQuery(document).on('submit', 'form#loginRegistration', function(event) {
               event.preventDefault();
               var form = jQuery(this);
               form.find('button[type="submit"]').prepend('<i class="fa fa-gear spinner"></i>&nbsp;');
               var formData = new FormData(jQuery(form)[0]);
               jQuery.ajax({
                  type: 'post',
                  url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_user_registration',
                  dataType: 'json',
                  contentType: false,
                  processData: false,
                  data: formData,
               }).done(function(value) {
                  form.find('button .spinner').remove();
                  jQuery('#msg').html('<div class="'+value.class+'" role="alert">'+value.message+'</div>');
                  form.trigger('reset');
                  console.log(value);
               }).fail(function() {
                  form.find('button .spinner').remove();
                  console.log("error");
               });
            });
         });
         </script>
      </body>
      </html>