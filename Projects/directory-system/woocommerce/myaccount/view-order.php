<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<p>
  <?php
	/* translators: 1: order number 2: order date 3: order status */
	printf(
		__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
		'<mark class="order-number">' . $order->get_order_number() . '</mark>',
		'<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>',
		'<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>'
	);
?>
</p>
<?php if (isset($_POST['sell_id'])):
global $wpdb;
$check = getRows($wpdb->prefix.'postmeta', ['where' =>[
	'meta_key' 		=> '_seller_product',
	'meta_value' 	=> $_POST['sell_id'],
],
'return_type' => 'single'
]); ?>
<?php 
if (empty($check)) {
	$post = get_post( $_POST['sell_id'] );
	unset($post->ID,$post->post_modified,$post->post_modified_gmt,$post->guid,$post->post_date,$post->post_date_gmt);
	$post->post_type = 'seller-listing';
	$post->post_status = 'pending';
	$metaforimages = get_post_meta( $_POST['sell_id'], '_thumbnail_id', true );
	$lastid =  wp_insert_post( $post, false );
	add_post_meta( $lastid, '_thumbnail_id', $metaforimages, true);
	add_post_meta( $lastid, '_seller_product', $_POST['sell_id'], true);
	add_post_meta( $lastid, '_sellerinfo', $_POST['sellerinfo'], true);
	echo '<div class="alert alert-success">You product has been in seller Listing</div>';
}else{
	echo '<div class="alert alert-danger">product already added..</div>';
}



endif ?>
<?php if (empty($_GET['sell_id'])): ?>
<?php if ( $notes = $order->get_customer_order_notes() ) : ?>
<h2>
  <?php _e( 'Order updates', 'woocommerce' ); ?>
</h2>
<ol class="woocommerce-OrderUpdates commentlist notes">
  <?php foreach ( $notes as $note ) : ?>
  <li class="woocommerce-OrderUpdate comment note">
    <div class="woocommerce-OrderUpdate-inner comment_container">
      <div class="woocommerce-OrderUpdate-text comment-text">
        <p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
        <div class="woocommerce-OrderUpdate-description description"> <?php echo wpautop( wptexturize( $note->comment_content ) ); ?> </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <?php endforeach; ?>
</ol>
<?php endif; 

$order = wc_get_order( $order_id );

$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>
<section class="woocommerce-order-details">
  <h2 class="woocommerce-order-details__title">
    <?php _e( 'Order details', 'woocommerce' ); ?>
  </h2>
  <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
    <thead>
      <tr>
        <th class="woocommerce-table__product-name product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
        <th class="woocommerce-table__product-table product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
        <th class="woocommerce-table__product-table product-total"><?php _e( 'Action', 'woocommerce' ); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
				foreach ( $order->get_items() as $item_id => $item ) {
					$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item ); //echo "<pre>"; print_r($item); ?>
      <tr>
        <td class="woocommerce-table__product-name product-name"><?php
							$is_visible        = $product && $product->is_visible();
							$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
							echo apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( '<a href="%s">%s</a>', $product_permalink, $item->get_name() ) : $item->get_name(), $item, $is_visible );
							echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item->get_quantity() ) . '</strong>', $item );
							do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order );
							wc_display_item_meta( $item );
							wc_display_item_downloads( $item );
							do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order );
							?></td>
        <td class="woocommerce-table__product-total product-total"><?php echo $order->get_formatted_line_subtotal( $item ); ?></td>
        <td><?php if ($order->get_status() == 'completed'): ?>
          <a href="?sell_id=<?php echo $item['product_id']; ?>&userid=<?php echo get_current_user_id(); ?>" class="woocommerce-button button">Sell this Product</a>
          <?php endif ?></td>
      </tr>
      <?php }
			?>
      <?php do_action( 'woocommerce_order_items_table', $order ); ?>
    </tbody>
    <tfoot>
      <?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
      <tr>
        <th scope="row"><?php echo $total['label']; ?></th>
        <td colspan="2"><?php echo $total['value']; ?></td>
      </tr>
      <?php
				}
			?>
    </tfoot>
  </table>
  <?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
  <?php if ( $show_customer_details ) : ?>
  <?php wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) ); ?>
  <?php endif; ?>
</section>
<?php else: ?>
<form method="POST">
  <div class="row">
    <div class="col span_6">
      <input type="text" name="sellerinfo['Name']" placeholder="Name" required="">
    </div>
    <div class="col span_6">
      <input type="text" name="sellerinfo['Email']" placeholder="Email" required="">
    </div>
  </div>
  <div class="row">
    <div class="col span_6">
      <input type="text" name="sellerinfo['Phone']" placeholder="Phone" required="">
    </div>
    <div class="col span_6">
      <input type="text" name="sellerinfo['SWRP_Code']" placeholder="SWRP Code" required="">
    </div>
  </div>
  <div class="row">
    <input type="hidden" name="sell_id" value="<?php echo $_GET['sell_id']; ?>">
    <input type="hidden" name="userid" value="<?php echo $_GET['userid']; ?>">
    <div class="col span_12">
      <input type="submit" value="Submit">
    </div>
  </div>
</form>
<?php endif ?>
