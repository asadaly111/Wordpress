<?php 
global $user;
if (!in_array( 'agency', (array) $user->roles )): 
wp_redirect(site_url('/my-account/'));
exit();
endif; ?>


<div class="heading heading-primary heading-border heading-bottom-border">
	<h3 class="heading-primary">Add new Profile</h3>
</div>

<form action="" id="formsubmit">
	<div class="row">
		<div class="col-lg-6">
			<div class="input-group mb-3">
				<input type="text" name="profile_name" class="form-control" placeholder="Profile Name" required="">
			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit" class="btn btn-3d btn-primary mb-2">Add</button>
		</div>
	</div>
	<div id="msgShow"></div>
</form>



<script>
jQuery(document).ready(function() {

	jQuery(document).on('submit', '#formsubmit', function(event) {
		event.preventDefault();
		jQuery(this).append('<div class="porto-ajax-loading"></div>');
		var form = jQuery(this);
		var formData = new FormData(jQuery(this)[0]);
		jQuery.ajax({
			type: 'post',
			url: '<?php echo site_url(''); ?>/wp-admin/admin-ajax.php?action=black_add_new_service',
			dataType: 'json',
			contentType: false,
			processData: false,
			data: formData,
		})
		.done(function(value) {
			jQuery('.porto-ajax-loading').remove();

			jQuery('#msgShow').html('<div class="alert '+value.class+'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+value.msg+'</div>');
			console.log(value);
		})
		.fail(function() {
			jQuery('.loader-css').hide();
			console.log("error");
		});
	});






});

</script>


