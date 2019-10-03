<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<script>
jQuery(document).ready(function() {
	var close = document.getElementsByClassName("closebtn");
	var i;

	for (i = 0; i < close.length; i++) {
		close[i].onclick = function(){
			var div = this.parentElement;
			div.style.opacity = "0";
			setTimeout(function(){ div.style.display = "none"; }, 600);
		}
	}
});
</script>
<style>
.alert {padding: 20px;background-color: #f44336;color: white;opacity: 1;transition: opacity 0.6s;margin-bottom: 15px;}
.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}
.closebtn {margin-left: 15px;color: white;font-weight: bold;float: right;font-size: 22px;line-height: 20px;cursor: pointer;transition: 0.3s;}
.closebtn:hover {color: black;}
</style>


<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Sign out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, eligendi iure error veniam a, doloremque quae quos suscipit voluptatem laudantium cumque perferendis exercitationem architecto sapiente illum, enim laboriosam modi officia.</p>

<?php 
global $wpdb, $obj;
$user_id  = get_current_user_id();
$existing = $obj->getRows($wpdb->prefix.'payments', ['where' =>['user_id' => $user_id ], 'return_type' => 'single', 'limit' => 1, 'order_by' => 'id desc' ]);
?>
<?php if (!empty($existing)): ?>
<?php if ($existing->status == 'active'): ?>
	<a class="nectar-button small regular accent-color  regular-button" style="margin-right: 10px; visibility: visible;" href="<?php echo site_url('/archive-page/'); ?>" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">Archive Page</a>
	<a class="nectar-button small regular accent-color  regular-button" style="margin-right: 10px; visibility: visible;" href="<?php echo site_url('/healing/'); ?>" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">Healing Page</a>
	<?php else: ?>
		<div class="alert">
			<span class="closebtn">&times;</span>  
			<strong>Error!</strong> Your subscription has been expired!
		</div>
	<?php endif; ?>
<?php else: ?>

<div class="alert">
  <span class="closebtn">&times;</span>  
  <strong>Error!</strong> You don't have subscription.
</div>



<?php endif; ?>



<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
