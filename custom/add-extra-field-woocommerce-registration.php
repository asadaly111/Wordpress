<?php  

// Add fields on registration page
function wooc_extra_register_fields() {
    // your extra fields goes here
    require 'cs_register_extra_field.php';
}
add_action( 'woocommerce_register_form', 'wooc_extra_register_fields' );


function add_user_additional_details_frontend_reg( $user_id )
{
    $registered_user = get_user_by('ID',$user_id);
    if($registered_user) {
        $user_role = $registered_user->roles;
        if((in_array('customer', (array) $user_role))){
            /* The field below "front_end_cust_form" is just a hidden field I added to check and make sure that this is coming from the Front end Reg form where I added the additional fields */
            if($_POST['front_end_cust_form'] == 'front_end_cust_form')
            {
                $first_name = $_POST['billing_first_name'];
                $last_name = $_POST['billing_last_name'];

                update_user_meta($user_id, 'billing_first_name', $first_name);
                update_user_meta($user_id, 'billing_last_name', $last_name);

                $update_data = array(
                    'ID' => $user_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name
                );
                $user_id = wp_update_user($update_data);
                $registered_user->add_role('custom_role');
            }

        }
    }
}

add_action( 'user_register', 'add_user_additional_details_frontend_reg', 10, 1 );



