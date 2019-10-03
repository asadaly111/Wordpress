<!-- example 1 -->
<?php
if ( ! is_user_logged_in() ) { // Display WordPress login form:
    $args = array(
        'redirect' => admin_url('/my-account/'),
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Username Or Email' ),
        'label_password' => __( 'Password' ),
// 'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'remember' => true
    );
    wp_login_form( $args );
} else { // If logged in:
    echo "<script>window.location = '".site_url('/my-account/')."';</script>";
// wp_loginout( home_url() ); // Display "Log Out" link.
// echo " | ";
// echo "<a href='".admin_url('/my-account/')."'>My Account</a>"; // Display "Site Admin" link.
}
?>




<!-- example 2 -->
<?php
if (is_user_logged_in() ) {
    echo "<script>window.location = '".site_url('/my-account/')."';</script>";
}
?>
<form name="loginform-custom" action="<?php echo site_url('/wp-login.php'); ?>" method="post" _lpchecked="1">
    <div class="form-row">
        <div class="col-md-12 form-group">
            <i class="fa fa-user-circle"></i><input id="user_login" type="text" class="form-control" name="log" placeholder="Username Or Email " value="" size="20">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 form-group">
            <i class="fas fa-key"></i><input type="password" name="pwd" class="form-control" placeholder="password">
        </div>
    </div>
    <!-- <div class="checkbox text-right"><p>remember me</p> <input type="checkbox"></div> -->
    <button class="form-control" type="submit" name="wp-submit">Login</button>
    <input type="hidden" name="redirect_to" value="<?php echo site_url('/my-account/'); ?>">
</form>



<!-- logout url -->
<?php echo wp_logout_url(site_url()); ?>









<!-- Woocommerce ka login form -->
<div class="clearfix"></div>
<div class="login">
  <div class="container">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="login_inner"> <img src="<?php bloginfo('template_directory'); ?>/images/login_img.jpg" class="img-responsive center-block" alt=""/>
        <div class="clearfix"></div>
        <h2>Login Now</h2>
        <form method="post">
            <?php do_action( 'woocommerce_login_form_start' ); ?>
    
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="john@econdire.com">
            </div>
    

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="*************">
            </div>
            
            
            <div class="form-group">
                <p>
                    <input type="checkbox" name="rememberme">
                Remmber Me</p>
            </div>

            
            <div class="form-group">
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                <input type="submit" name="login" value="Login" class="btn_submit">
                <p class="pull-right"> Forgot Password? </p>
            </div>
          <?php do_action( 'woocommerce_login_form_end' ); ?>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>




<script type="text/javascript">
     var form = jQuery("#login");
     form.validate();
     jQuery('#login').submit(function(event) {
          event.preventDefault();
          if (jQuery(this).valid() == false) {
               return jQuery(this).valid();
          }
          jQuery.LoadingOverlay("show");
          var form = jQuery(this);
          var formData = new FormData(jQuery(this)[0]);
          jQuery.ajax({
               type: 'post',
               url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=general_login',
               contentType: false,
               processData: false,
               dataType: 'json',
               data: formData,
          })
          .done(function(value) {
               console.log(value);
               jQuery.LoadingOverlay("hide");
               if (value.status) {
                    form.trigger('reset');
                    swal('Thank You!', value.msg ,'success');
                    window.location = value.url;
               } else {
                    swal({
                         type: 'error',
                         title: 'Oops...',
                         html: value.msg,
                    });
               }
          })
          .fail(function() {
               jQuery.LoadingOverlay("hide");
               console.log("error");
               swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'something went wrong!',
               });
          });
     });
</script>

