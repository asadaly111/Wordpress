<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

  <meta name="author" content="PIXINVENT">
  <title>Micheal Anthony</title>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
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
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/assets/css/style.css">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <!-- END Custom CSS-->
</head>


<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-10 col-10 box-shadow-2 p-0">
              <div class="card rad border-grey border-lighten-3 px-1 py-1 m-0">
                
                  <div class="card-title text-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" class="img-fluid" alt="branding logo">
                  </div>
                  
              
                <div class="card-content logn-form">
                  
                  <div class="card-body">
                    <form class="form-horizontal" action="" id="loginform" method="POST" novalidate>
                      <div class="form-group">
                        <input type="text" class="form-control" name="username" id="user-name" placeholder="User Name"
                        required>
                        </div>
                        
                     
                     <div <?php echo get_stylesheet_directory_uri(); ?>/assets/class="form-group">
                        <input type="password" class="form-control" name="password" id="user-password" placeholder="Password"
                        required>
                        </div>
                    
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/recover-password.html" class="card-link">Forgot Password?</a></div>
                      </div>

                      <div id="errror">
                        
                      </div>
                      <button type="submit" class="btn btn-outline-primary btn-block"> Login</button>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
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


  <script>
    jQuery(document).ready(function() {

      jQuery(document).on('submit', 'form#loginform', function(event) {
        event.preventDefault();
        var form = jQuery(this);
        form.find('button').prepend('<i class="fa fa-gear spinner"></i>');
        var formData = new FormData(jQuery(form)[0]);
        jQuery.ajax({
          type: 'post',
          url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_loginform',
          dataType: 'json',
          contentType: false,
          processData: false,
          data: formData,
        })
        .done(function(value) {
            jQuery('#errror').html('<div class="'+value.class+' mb-2" role="alert">'+value.message+'</div>');
            if (value.url != '') {
              window.location = value.url;
              form.trigger('reset');
            }else{
              form.find('button .spinner').remove();
            }
            console.log(value);
          })
        .fail(function() {
          form.find('button .spinner').remove();
          console.log("error");
        });

      });


    });
  </script>


  <!-- END PAGE LEVEL JS-->
</body>
</html>