<?php 
global $wpdb, $obj;
do_action('lms_scripts');
$results = $wpdb->get_results('
SELECT *
	FROM '.$wpdb->prefix.'payments
	WHERE type = "ontime"
	');
?>

<div class="card mb-3">
	<h3 class="card-header">One Time Payment:</h3>
	<div class="card-body">
		
		<table class="table table-hover" style="font-size: 12px;">
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>TRANSACTIONID</th>
					<th>status</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($results))  { ?>
				<?php $i =1; foreach ($results as $row_item):

					$data = json_decode( $row_item->data);

				 ?>
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $data->first_name; ?></td>
					<td><?php echo $data->last_name; ?></td>
					<td><?php echo $data->email; ?></td>
					<td><?php echo $row_item->TRANSACTIONID; ?></td>
					<td><?php echo $row_item->TRANSACTIONID; ?></td>
				</tr>
				<?php endforeach ?>
				<?php } ?>
			</tbody>
		</table>
		
	</div>
</div>