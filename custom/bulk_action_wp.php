<?php 
/****** USERS ****************/ 
add_filter('bulk_actions-users', function($actions) {
    $actions['soachat'] = __('Add to Soachat', 'my-namespace');
    return $actions;
});

add_filter('handle_bulk_actions-users', function($redirect, $action, $ids) {
    $soachat = new Soachat();
    foreach ($ids as $id) {
        $user = get_userdata($id);
        $soachat::addUser($id, $user->data->display_name);
        add_user_meta($id, 'is_soa_chat', 1 , true);
    }
    $redirect_to = add_query_arg( 'soachat_bulk', 'Users are added into Soachat platform', $redirect );
    return $redirect_to;
}, 10, 3);

add_action( 'admin_notices', 'my_bulk_action_admin_notice' );
function my_bulk_action_admin_notice() {
    if ( ! empty( $_REQUEST['soachat_bulk'] ) ) {
        $emailed_count = $_REQUEST['soachat_bulk'];
        printf( '<div id="message" class="updated fade">' .
            _n( '%s',
                '%s',
                $emailed_count,
                'email_to_eric'
            ) . '</div>', $emailed_count );
    }
}

