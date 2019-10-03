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


if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])){ 
	$attach_id = insert_attachment('file', $post_id);
	update_post_meta( $post_id, '_thumbnail_id', $attach_id);
}


// single upload
add_action( 'wp_ajax_photo_shared', 'OBT_myajax_submit' );
add_action( 'wp_ajax_nopriv_photo_shared', 'OBT_myajax_submit' );
function OBT_myajax_submit() {

	$id = $_POST['postid'];

	<input name="img">

	$attach_id = insert_attachment('img', $id);
	
	update_post_meta( $post_id, '_thumbnail_id', $attach_id);




	$response = json_encode(array( 'class' => 'alert-success', 'msg'));
	header( "Content-Type: application/json" );
	echo $response;
	exit;
}


<input type="file" name="project_photos[]" multiple>


// Multiple upload
if (isset($_FILES['project_photos'])) {
	$files = $_FILES["project_photos"];
	foreach ($files['name'] as $key => $value) {
		if ($files['name'][$key]) {
			$file = array(
				'name' => $files['name'][$key],
				'type' => $files['type'][$key],
				'tmp_name' => $files['tmp_name'][$key],
				'error' => $files['error'][$key],
				'size' => $files['size'][$key]
			);
			$_FILES = array ("my_file_upload" => $file);
			foreach ($_FILES as $file => $array) {
				$newupload[] = insert_attachment($file, $post_id);
			}
		}
	}





	global $wpdb;
	foreach ($newupload as $key => $value) {
		$images = array(
			'post_id' => $post_id,
			'image' => $value,
		);
		$wpdb->insert($wpdb->prefix.'post_images', $images);
	}



}



// If files isset
if (file_exists($_FILES['logo']['tmp_name']) || is_uploaded_file($_FILES['logo']['tmp_name'])) {
	$attach_id = insert_attachment('logo', $_POST['post_id']);
	update_post_meta( $_POST['post_id'], '_thumbnail_id', $attach_id);
}
