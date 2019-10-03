<?php
/*
*
* template name: login form
*/
get_header();
?>
<!--resgister form start here-->
<section class="login-form">
    <div class="container">
        <div class="row">
            <div class="col span_12 col-md-12">
                <div class="form-sec">
                    <h1>login</h1>
                    <hr>
                    <form class="form-horizontal" action="" id="loginform" method="POST" novalidate>
                        <div class="form-group">
                            <div class="row">
                                <div class="col span_12 col-md-12">
                                    <div class="login_page_feild-1">
                                        <input type="text" class="form-control" name="username" id="user-name" placeholder="User Name" required>
                                    </div>
                                    <div class="login_page_feild-2">
                                        <input type="password" class="form-control" name="password" id="user-password" placeholder="Password"
                                        required>
                                    </div>
                                </div>
                                <div class="send_btn">
                                    <button type="submit" class=""> Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--resgister form end here-->
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/loadingoverlay.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/sweetalert.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(document).on('submit', 'form#loginform', function(event) {
            event.preventDefault();
            var form = jQuery(this);
            jQuery.LoadingOverlay("show");
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
                jQuery.LoadingOverlay("hide");
                if (value.status) {
                    window.location = value.url;
                    form.trigger('reset');
                }else{
                    Swal({
                        type: 'error',
                        title: 'Oops...',
                        html: value.message,
                    });
                }
                console.log(value);
            })
            .fail(function() {
                jQuery.LoadingOverlay("hide");
                console.log("error");
            });
        });
    });
</script>