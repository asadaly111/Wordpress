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
                     <div class="col-lg-12 col-md-12 col-12 box-shadow-2 p-0">
                        <div class="card rad border-grey border-lighten-3 px-1 py-1 m-0">
                           <div class="card-content collapse show">
                              <div class="card-body card-dashboard">
                                 <div class="top-heading clearfix">
                                    <h2>C3 – Global Logistics Solutions</h2>
                                    <h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" />Carrier Setup <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/heading-line.jpg" alt="" /></h1>
                                    <p>Please enter details in the below fields to facilitate the Setup of your Carrier</p>
                                 </div>
                                 <!--top heading end-->
                                 <!--<button name="file" class="uplon-btn2" onclick="document.getElementById('upload').click()"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/upload-img.jpg" class="img-full" alt=""></button>
                                    <input type="file" id="upload" name="file">
                                    <p class="pro-pic-txt">Profile Picture</p>-->
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="MC Number:" name="mc_number">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="Carrier Name:" name="carrier_name">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                 </div>
                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="DOT Number:" name="dot_number">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="Contact Person:" name="contact_person">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                 </div>
                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-12 skin skin-square">
                                       <div class="form-group p-2">
                                          <label>Equipment:</label>
                                          <fieldset>
                                             <input type="checkbox" id="input-25" name="equipment[]" value="Van">
                                             <label class="white" for="input-25">Van</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="checkbox" id="input-26" name="equipment[]" value="Flat">
                                             <label class="white" for="input-26">Flat</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="checkbox" id="input-27" name="equipment[]" value="Reefer">
                                             <label class="white" for="input-27">Reefer</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="checkbox" id="input-28" name="equipment[]" value="Specialized">
                                             <label class="white" for="input-28">Specialized</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="checkbox" id="input-29" name="equipment[]" value="Drayagev">
                                             <label class="white" for="input-29">Drayagev</label>
                                          </fieldset>
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col
                                       end-->
                                 </div>
                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="Phone Number:" name="phone_number">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="Email:" name="email">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                 </div>
                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                       <div class="form-group">
                                          <input type="text"  class="form-control" placeholder="City, State:" name="city_state">
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                 </div>
                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-12 skin skin-square">
                                       <div class="form-group p-2">
                                          <fieldset>
                                             <input type="checkbox" id="input-30" name="is-this-a-customs-broker-request">
                                             <label class="white" for="input-30">Is this a Customs Broker request?</label>
                                          </fieldset>
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col
                                       end-->
                                 </div>
                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                       <div class="form-group">
                                          <textarea  class="form-control carer-txtara" placeholder="Comments:" name="comments"></textarea>
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col 6 end-->
                                 </div>


                                 <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <input type="text" class="form-control" placeholder="UserName:" name="UserName">
                                    </div><!--form group end-->
                                  </div><!--col 6 end-->
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <input type="password" class="form-control" placeholder="Password:" name="Password">
                                    </div><!--form group end-->
                                  </div><!--col 6 end-->
                                </div>

                                 <!--row end-->
                                 <div class="row">
                                    <div class="col-md-12 skin  skin-square">
                                       <div class="form-group p-2">
                                          <label>Do you have an empty truck?:</label>
                                          <fieldset>
                                             <input type="radio" name="do-you-have-an-empty-truck" id="input-radio-11" value="yes">
                                             <label for="input-radio-11">Yes</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="radio" name="do-you-have-an-empty-truck" id="input-radio-12" checked value="no">
                                             <label for="input-radio-12">No</label>
                                          </fieldset>
                                       </div>
                                       <!--form group end-->
                                    </div>
                                    <!--col
                                       end-->
                                 </div>
                                 <!--row end-->
                                 <div class="dorn-btn-main">
                                    <p>Download the complete Form in PDF, fillout and submit here.</p>
                                    <a href="<?php echo site_url('/wp-content/uploads/2018/11/c3-gls-carrier-packet-2018-1-6847-ver-43.docx'); ?>">Download PDF</a>
                                    <button><i class="fa fa-upload" aria-hidden="true"></i> Upload Here</button>
                                 </div>




                            <label for="uploadfile"><i class="fa fa-upload" aria-hidden="true"></i> uploadfile file</label>
                            <input type="file" name="uploadfile" id="uploadfile">


                                 <br>
                                 <div class="cntr-btnn-main">
                                    <button>Cancel</button>
                                    <button type="submit">Send</button>
                                 </div>
                                 <p align="center">* Please enter either one of the MC# or DOT# and either one of email or phone#</p>
                                 
                                 <div id="msg"></div>

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
      <!-- ////////////////////////////////////////////////////////////////////////////-->
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
           url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_registrationform',
           dataType: 'json',
           contentType: false,
           processData: false,
           data: formData,
        }).done(function(value) {
            jQuery('#errror').html('<div class="'+value.class+' mb-2" role="alert">'+value.message+'</div>');
            form.find('button .spinner').remove();
            jQuery('#msg').html('<div class="'+value.class+'" role="alert">'+value.msg+'</div>');
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