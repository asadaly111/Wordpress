<?php
/*
* Template Name: Registration
*/
get_header();
?>


<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content();?>
<?php endwhile;?>

<section class="registartion users">
	<div class="container">
		<div class="featured-box align-left porto-user-box reg">
			<div class="box-content">
				
				<div class="u-columns col2-set" id="customer_login">
					<?php
					if ( is_user_logged_in() ) {
						echo "<p class='looged-in'>Your Are Already Login</p>";
						wp_loginout( home_url() );
					}else{
						?>
						<h2>Register</h2>
						<form method="post" class="woocommerce-form woocommerce-form-register registerrol" id="registerrol">
							<p class="form-row form-row-first">
								<label for="reg_billing_first_name">First name<span class="required">*</span></label>
								<input type="text" name="rfname" required="required">
							</p>
							<p class="form-row form-row-last">
								<label for="reg_billing_last_name">Last name<span class="required">*</span></label>
								<input type="text" name="rlname" required="required">
							</p>
							<div class="clear"></div>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_email">Username<span class="required">*</span></label>
								<input type="tel" name="runame" required="required">
							</p>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_email">Phone<span class="required">*</span></label>
								<input type="tel" name="rphone" required="required">
							</p>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_email">Email Address<span class="required">*</span></label>
								<input type="email" name="remail" required="required">
							</p>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_email">Password<span class="required">*</span></label>
								<input type="password" name="rpass" required="required">
							</p>
							<p class="form-row">
								<label for="reg_role">Select User Type <span class="required">*</span></label>
								<select class="input-text" name="rrole" id="reg_role" required="required">
									<option value="">Select..!</option>
									<option value="individual">Individual</option>
									<option value="agency">Agency</option>
								</select>
							</p>
							<div class="woocommerce-privacy-policy-text"></div>
							<p class="woocommerce-FormRow form-row">
								<input type="submit" name="rsubmit" value="Register">
							</p>
							<div id="msgshow"></div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
get_footer();
?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#registerrol').submit(function(event) {
			event.preventDefault();
			jQuery(this).append('<div class="porto-ajax-loading"></div>');
			var formData = new FormData(jQuery(this)[0]);
			console.log(formData);
			jQuery.ajax({
				dataType: 'json',
				type: 'post',
				url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=registry',
				contentType: false,
				processData: false,
				data: formData,
			})
			.done(function(value) {
				jQuery('.porto-ajax-loading').remove();
				console.log(value);
				if (value.class == 'alert alert-success') {
					jQuery('#registerrol').trigger("reset");
				}
				jQuery('#msgshow').html('<div class="container errrrrrr"><div class="'+value.class+'">'+value.msg+'</div></div>');
			})
			.fail(function() {
				jQuery('.porto-ajax-loading').remove();
				console.log("error");
				jQuery('#msgshow').html('<div class="container errrrrrr"><div class="'+value.class+'">'+value.msg+'</div></div>');
			});
		});
	});
</script>