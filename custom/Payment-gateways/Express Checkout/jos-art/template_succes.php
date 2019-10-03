<?php
/*template name: Sucess*/
get_header();
nectar_page_header($post->ID);
$options = get_nectar_theme_options();
global $wpdb;
if (!empty($_GET['paymentID'])) {
	$get = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'ab_inquiries WHERE id = '.$_GET['paymentID'].' ');
}else{
	echo "<script>window.location = '".site_url('')."'</script>";
}
?>
<style>
	.col.span_12.succccc .col h3, .ttt h3 {
    color: #e1292d;
    float: left;
    width: 100%;
    text-align: left;
}
.col.span_12.succccc .col h3 span {
}

.col.span_12.succccc .col h3 span, .ttt h3 span {
    font-size: 19px;
    color: #333;
}
.col.span_12.succccc .col>div {
    border: 1px solid #dee4e8;
    float: left;
    margin-bottom: 16px;
    padding: 14px;
    box-shadow: 0px 1px 1px -1px;
}
</style>
<div class="container-wrap">
	<div class="container main-content events">
		<div class="row">
			<div class="col span_12 succccc">';
				<div class="col span_6">
					<?php $data = json_decode( $get->fields); ?>
					<?php
					foreach ($data->product as $key): ?>
						<div>
							<h3>Event Name: <span><?php echo $key->ItemName; ?></span></h3>
							<h3>Event Space: <span><?php echo $key->ItemQty; ?></span></h3>
							<h3>Event Price: <span><?php echo PPL_CURRENCY_CODE; ?> <?php echo $key->ItemPrice; ?></span></h3>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="ttt">
				<h3>Total: <span><?php echo PPL_CURRENCY_CODE; ?>  <?php echo $data->total; ?></span></h3>
				<h3>Transaction ID: <span><?php echo $get->transaction_id; ?></span></h3>
			</div>
		</div><!--/row-->
	</div><!--/container-->
</div>
<?php get_footer(); ?>