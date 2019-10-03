<?php 

/***********************************************************************/ 
/************************* Common **************************************/ 
/***********************************************************************/ 

// registration for both
add_action( 'wp_ajax_registry', 'registry' );
add_action( 'wp_ajax_nopriv_registry', 'registry' );
function registry(){    
    global $common;
	print($common->register_user($_POST));
    exit();
}

// edit profile
add_action( 'wp_ajax_edit_profile', 'edit_profile' );
add_action( 'wp_ajax_nopriv_edit_profile', 'edit_profile' );
function edit_profile(){    
    global $individual;
	print($individual->edit_profile($_POST));
    exit();
}


add_action( 'wp_ajax_black_gallery', 'black_gallery' );
add_action( 'wp_ajax_nopriv_black_gallery', 'black_gallery' );
function black_gallery(){    
	$datainarray = get_post_meta( $_GET['id'], '_gallery', true);
	$attach_id = insert_attachment('file', $_GET['id']);
	$datainarray[] = $attach_id;
	update_post_meta($_GET['id'], '_gallery', $datainarray);
	exit();
}

add_action( 'wp_ajax_black_videos', 'black_videos' );
add_action( 'wp_ajax_nopriv_black_videos', 'black_videos' );
function black_videos(){    
	$datainarray = get_post_meta( $_GET['id'], '_videos', true);
	$attach_id = insert_attachment('file', $_GET['id']);
	$datainarray[] = $attach_id;
	update_post_meta($_GET['id'], '_videos', $datainarray);
	exit();
}

// deactivate account
add_action( 'wp_ajax_black_deactivate_account', 'black_deactivate_account' );
add_action( 'wp_ajax_nopriv_black_deactivate_account', 'black_deactivate_account' );
function black_deactivate_account(){ 
	 global $common;
	print($common->black_deactivate_account($_POST));
	exit();
}

// deactivate account
add_action( 'wp_ajax_black_profile_picture', 'black_profile_picture' );
add_action( 'wp_ajax_nopriv_black_profile_picture', 'black_profile_picture' );
function black_profile_picture(){ 
	$attach_id = insert_attachment('file', $_POST['post_id']);
	update_post_meta($_POST['post_id'], '_thumbnail_id', $attach_id);
	$thumbnail = wp_get_attachment_image_src($attach_id ,'thumbnail', true);
	$msg = array('url' => $thumbnail[0]);
	print(json_encode($msg));
	exit();
}

// black_reciver_send_messages
add_action( 'wp_ajax_black_reciver_send_messages', 'black_reciver_send_messages' );
add_action( 'wp_ajax_nopriv_black_reciver_send_messages', 'black_reciver_send_messages' );
function black_reciver_send_messages(){ 
	global $user_id,$obj,$wpdb;
	
	$msg = $obj->getRows($wpdb->prefix.'black_messages', ['where' =>['sender_id' => $_POST['sender'], 'post_id' => $_POST['postid'], 'reciver_id' => $user_id  ] ]);
	if ($msg):
		foreach ($msg as $key):
			if ($key->text_by == 'receiver') {
				echo '
				<div class="outgoing_msg">
				<div class="sent_msg">
				<p>'.$key->message.'</p>
				<span class="time_date">'.get_mesg_date($key->date).'</span>
				</div>
				</div>
				';
			}else{
				echo '
				<div class="incoming_msg">
				<div class="incoming_msg_img"> <img src="'.feature_img($key->post_id).'" alt="sunil"> </div>
				<div class="received_msg">
				<div class="received_withd_msg">
				<p>'.$key->message.'
				</p>
				<span class="time_date">'.get_mesg_date($key->date).'</span>
				</div>
				</div>
				</div>
				';
			}
		endforeach;
	endif;

	exit();
}


/***********************************************************************/ 
/*************************Individuals***********************************/ 
/***********************************************************************/ 
// #black_send_messages
add_action( 'wp_ajax_black_send_messages', 'black_send_messages' );
add_action( 'wp_ajax_nopriv_black_send_messages', 'black_send_messages' );
function black_send_messages(){ 
	 global $individual;
	print($individual->black_new_message_send($_POST));
	exit();
}


/***********************************************************************/ 
/*************************Agency****************************************/
/***********************************************************************/ 




add_action( 'wp_ajax_black_add_new_service', 'black_add_new_service' );
add_action( 'wp_ajax_nopriv_black_add_new_service', 'black_add_new_service' );
function black_add_new_service(){ 
	global $agency;
	print($agency->black_add_new_profile($_POST));
	exit();
}







