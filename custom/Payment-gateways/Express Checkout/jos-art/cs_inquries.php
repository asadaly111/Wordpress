<?php 
do_action('lms_scripts');  
global $wpdb;
$data = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'ab_inquiries ');
?>
<style>
	tr.table-primary ul li {
    display: inline-block;
    margin-right: 15px;
}
</style>

<div class="card mb-3">
	<h3 class="card-header">Inquires</h3>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Billing Info</th>
					<th scope="col">Product Info</th>
					<th scope="col">Transaction ID</th>
					<th scope="col">Staus</th>
				</tr>
			</thead>
			<tbody>



<?php if ($data): ?>
	<?php 
	$i = 1;
	foreach ($data as $key): ?>
	
				<tr class="table-primary">
					<th scope="row"><?php echo $i; $i++; ?></th>
					<td>
						<ul>
							<?php 
							$fields = json_decode($key->fields); ?>
							<?php foreach ($fields as $key2 => $value2): ?>
								<?php if ($key2 != 'product'): ?>
									<li><strong><?php echo $key2; ?>:</strong> <?php echo $value2; ?></li>
								<?php endif ?>
							<?php endforeach; ?>
						</ul>
					</td>
					<td>
						<ul>
							<?php 
							foreach ($fields->product as $key1): ?>
								<li><strong>ItemName :</strong> <?php echo $key1->ItemName; ?>, <strong>ItemQty :</strong> <?php echo $key1->ItemQty; ?> , <strong>ItemPrice :</strong> <?php echo $key1->ItemPrice; ?></li>
							<?php endforeach; ?>
						</ul>
					</td>
					<td>
						<?php echo $key->transaction_id; ?>
					</td>					


					<td><?php echo $key->status; ?></td>
				</tr>

	<?php endforeach; ?>
	<?php else: ?>

	<tr>
		<td colspan="3">No record found!</td>
	</tr>

<?php endif; ?>








			</tbody>
		</table>
	</div>
</div>