<?php 
do_action('lms_scripts');  
global $wpdb;
$data = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'inquiry ');
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
					<th scope="col">Payment Info</th>
					<th scope="col">Transaction ID</th>
					<th scope="col">Staus</th>
				</tr>
			</thead>
			<tbody>



<?php if ($data): ?>
	<?php foreach ($data as $key): ?>
	
				<tr class="table-primary">
					<th scope="row"><?php echo $key->id; ?></th>
					<td>
						<ul>
							<?php 
							$fields = json_decode($key->fields);
							foreach ($fields->billing_details_form as $key1 => $value1): ?>
								<li><strong><?php echo $key1; ?>:</strong> <?php echo $value1; ?></li>
							<?php endforeach; ?>
						</ul>
					</td>
					<td>
						<ul>
							<?php 
							foreach ($fields->payment as $key2 => $value2): ?>
								<li><strong><?php echo $key2; ?>:</strong> <?php echo $value2; ?></li>
							<?php endforeach; ?>
						</ul>
					</td>
					<td>
						<?php echo $fields->paymentstatus->TRANSACTIONID; ?>
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