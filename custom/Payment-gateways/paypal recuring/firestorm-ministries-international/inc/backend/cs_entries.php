<?php 
global $wpdb, $obj;
do_action('booking_script_css');
$results = $wpdb->get_results('
SELECT 
	s.id as booking_id,s.stripe_cus_id, s.first_name, s.last_name, s.email, s.street_address, s.city, s.state, s.zip , s.country, s.status, s.date,
	b.name as size_name,
	su.name as subscription_name
	FROM '.$wpdb->prefix.'bird_booking_subscription AS s 
		INNER JOIN '.$wpdb->prefix.'bird_size AS `b` ON ( `s`.`size` = `b`.`id` )
		INNER JOIN '.$wpdb->prefix.'bird_subscriptions AS `su` ON ( `s`.`subscription` = `su`.`id` )
	');
?>

<div class="card mb-3">
	<h3 class="card-header">Subscriptions:</h3>
	<div class="card-body">
		
		<table class="table table-hover" style="font-size: 12px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Stripe Customer ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Size</th>
					<th>Subscription</th>
					<th>Status</th>
					<th>Date</th>
					<th>Payment Details</th>
					<th>Billing Details</th>
					<th>Shipping Details</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($results))  { ?>
				<?php $i =1; foreach ($results as $row_item): ?>
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $row_item->stripe_cus_id; ?></td>
					<td><?php echo $row_item->first_name; ?></td>
					<td><?php echo $row_item->last_name; ?></td>
					<td><?php echo $row_item->email; ?></td>
					<td><?php echo $row_item->size_name; ?></td>
					<td><?php echo $row_item->subscription_name; ?></td>
					<td><?php echo $row_item->status; ?></td>
					<td><?php echo $row_item->date; ?></td>
					<td><a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=booking_details&id='.$row_item->booking_id); ?>" data-featherlight="ajax" class="btn btn-primary btn-sm">Details</a></td>
					<td><a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=booking_billing_detail&id='.$row_item->booking_id); ?>" data-featherlight="ajax" class="btn btn-primary btn-sm">Billing Details</a></td>
					<td><a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=booking_shipping_detail&id='.$row_item->booking_id); ?>" data-featherlight="ajax" class="btn btn-primary btn-sm">Shipping Details</a></td>
				</tr>
				<?php endforeach ?>
				<?php } ?>
			</tbody>
		</table>
		
	</div>
</div>