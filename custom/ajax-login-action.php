<?php 

// ajax
add_action( 'wp_ajax_easy_login', 'easy_login' );
add_action( 'wp_ajax_nopriv_easy_login', 'easy_login' );
function easy_login(){
	$creds = array();
	$creds['user_login'] = $_POST['username'];
	$creds['user_password'] = $_POST['passwor'];
	$creds['remember'] = false;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) )
	{
		$result['type'] = "error";
		$result['message'] =  $user->get_error_message();;
	}
	else
	{
		$result['type'] = "success";
		$result['message'] = $user->get_error_message();
	}
	print_r(json_encode($result));
	exit();
}


// another example 
// ajax Lgoin
add_action( 'wp_ajax_cms_loginform', 'cms_loginform' );
add_action( 'wp_ajax_nopriv_cms_loginform', 'cms_loginform' );
function cms_loginform(){
	$creds = array();
	$creds['user_login'] = $_POST['username'];
	$creds['user_password'] = $_POST['password'];
	$creds['remember'] = false;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) ){
		$result['type'] = "error";
		$result['class'] = "alert alert-danger";
		$result['message'] =  $user->get_error_message();
		$result['url'] = '';
	}else{
		$result['type'] = "success";
		$result['class'] = "alert alert-success";
		$result['message'] =  'You are logged in...';
		
		if (in_array('subscriber', $user->roles)) {
			$result['url'] = site_url('');
		}elseif (in_array('carrier', $user->roles)) {
			$result['url'] = site_url('/carrier-dashboard/');
		}else{
			$result['url'] = '';
		}
	}
	print_r(json_encode($result));
	exit();
} ?>


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