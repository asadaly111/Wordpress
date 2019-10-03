<?php
/**
* Refil
*/
class individual extends black_dbmanager{

	public function edit_profile($form = array()){

		$user_id  = get_current_user_id();
		$post_id  = $form['post_id'];

		// Update post 37
		$my_post = array(
			'ID'           => $post_id ,
			'post_title'   => $form['black_ful_name'],
			'post_content' => $form['black_bio'],
		);
		
		// Update the post into the database
		wp_update_post( $my_post );
		
		update_post_meta( $post_id, 'black_age', $form['black_age']);
		update_post_meta( $post_id, 'black_city', $form['black_city']);
		update_post_meta( $post_id, 'black_ethnicity', $form['black_ethnicity']);
		update_post_meta( $post_id, 'black_hair', $form['black_hair']);
		update_post_meta( $post_id, 'black_height', $form['black_height']);
		update_post_meta( $post_id, 'black_location', $form['black_location']);
		update_post_meta( $post_id, 'black_phone', $form['black_phone']);
		update_post_meta( $post_id, 'black_rates', $form['black_rates']);
		update_post_meta( $post_id, 'black_smoker', $form['black_smoker']);
		update_post_meta( $post_id, 'black_state', $form['black_state']);
		update_post_meta( $post_id, 'black_travel', $form['black_travel']);
		update_post_meta( $post_id, 'black_weight', $form['black_weight']);
		update_post_meta( $post_id, 'black_wroking_hours', $form['black_wroking_hours']);
		update_post_meta( $post_id, 'black_social_media', $form['black_social_media']);

		


		$msg = array('msg' => 'Profile has been updated!', 'class' => 'alert alert-success' );
		return json_encode($msg);
	}

	public function black_new_message_send(){
		global $wpdb, $obj;
		$wpdb->insert( $wpdb->prefix.'black_messages', $_POST);
		$lastid = $wpdb->insert_id;
		$msg = $obj->getRows($wpdb->prefix.'black_messages', ['where' =>['id' => $lastid  ], 'return_type' => 'single'  ]);
		$msg->date = get_mesg_date($msg->date);
		return json_encode($msg);
	}
	
}
$individual = new individual();