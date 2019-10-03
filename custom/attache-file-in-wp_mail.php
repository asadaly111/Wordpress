<?php 





if (!function_exists('insert_attachment')) {
	function insert_attachment($file_handler, $post_id, $setthumb=false) {

		if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
			return __return_false();
		}
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		$attach_id = media_handle_upload( $file_handler, $post_id );
		
		

		return $attach_id;
	}
}



add_action( 'wp_ajax_applyform', 'applyform' );
add_action( 'wp_ajax_nopriv_applyform', 'applyform' );
function applyform(){
//echo "Test";
extract($_POST);

$attach_id = insert_attachment('apfile', $appostname);
$attach_id = get_attached_file($attach_id);
$attachments = array($attach_id);


$subject = 'User Inquiry';

$headers = array('Content-Type: text/html; charset=UTF-8');

$message = '<html><body>';
$message .= '<h2>User Inquiry For Job</h2>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $apname . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong></td><td>" . $apemail . "</td></tr>";
$message .= "<tr><td><strong>Phone:</strong></td><td>" . $apphone . "</td></tr>";
$message .= "<tr><td><strong>Address:</strong></td><td>" . $apaddress . "</td></tr>";
$message .= "<tr><td><strong>Job Name:</strong></td><td>" . get_the_title( $appostname ) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";


$mail = wp_mail($email , $subject, $message, $headers, $attachments);

if ($mail) {
    $msg = array('msg' => 'Inquiry submited!', 'class' => 'isa_sucess' );
}else{
    $msg = array('msg' => 'Something went wrong!', 'class' => 'isa_error' );
}

print(json_encode($msg));

exit();
}
?>


<form id="target" class="form-user" method="POST" enctype="multipart/form-data">
	<h2>Please Fill Fields For Apply</h2>
	<input type="name" name="apname" placeholder="Name:" required="required">
	<input type="email" name="apemail" placeholder="Email:" required="required">
	<input type="tel" name="apphone" placeholder="Phone:" required="required">
	<input type="text" name="apaddress" placeholder="Address:">
	<input type="file" name="apfile" id="filed" required="required">
	<input type="submit" name="submit" value="submit">
	<input type="hidden" name="appostname" value="<?php echo get_the_ID();?>">
	<input type="hidden" name="email" value="<?php echo $email;?>">
	<div class="ajax-response"></div>
</form>
                
	<script type="text/javascript">
	jQuery(document).ready(function() {
	var form = jQuery("#target");
	jQuery(document).on('submit', '#target', function(event) {
		event.preventDefault();
		var formData = new FormData(jQuery(this)[0]);
		jQuery.ajax({
			type: 'post',
			url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=applyform',
			dataType: 'json',
			contentType: false,
			processData: false,
			data: formData,
		})
		.done(function(value) {
			console.log(value);
			form.trigger('reset');
			jQuery('.ajax-response').text(value.msg);
	// jQuery('.loader-css').hide();
	// console.log(value);
	})
		.fail(function() {
			console.log("error");
		});
	});
	});
	</script>
