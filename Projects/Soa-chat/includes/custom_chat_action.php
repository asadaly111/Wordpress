<?php
//create a user in chat by hoook
add_filter( 'user_register', 'chat_user_create');
function chat_user_create($userid){
    $user = get_userdata($userid);
    if (in_array('subscriber', $user->roles)){
        $soachat = new Soachat();
        $soachat::addUser($userid, $user->data->display_name);
    }
}

// Restrict page for users
add_action('template_redirect','my_non_logged_redirect');
function my_non_logged_redirect(){
    if ((is_page('global-chat')) && !is_user_logged_in() ){
        wp_redirect( wp_login_url() );
        die();
    }
}
