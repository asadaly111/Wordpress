<?php 
global $wpdb, $obj;
do_action('lms_scripts'); 

if (isset($_POST['insert'])) {
	unset($_POST['insert']);
	$wpdb->insert( $wpdb->prefix.'payments', $_POST);
	echo '<div class="notice notice-success is-dismissible"><p>Record inserted!</p></div>';
}

if (isset($_GET['edit'])) {
	$wpdb->update($wpdb->prefix.'payments', $_POST, ['id' => $_GET['id'] ]);
	echo '<div class="notice notice-success is-dismissible"><p>Record updated!</p></div>';
}

if (isset($_GET['delete'])) {
	$wpdb->delete( $wpdb->prefix.'payments', ['id' => $_GET['id'] ]);
	echo '<div class="notice notice-success is-dismissible"><p>Record deleted!</p></div>';
}


$results = $wpdb->get_results('
SELECT *
	FROM '.$wpdb->prefix.'payments
	WHERE type = "manual"
	');


$users = get_users(); 
?>

<div class="card mb-3">
	<h3 class="card-header">Add user in Subscription:</h3>
	<div class="card-body">

		
	<?php if (empty($_GET['edit'])): ?>
		<form action="" method="POST">
				<input type="hidden" name="insert" value="true"> 
			<input type="hidden" name="type" value="manual"> 
			<input type="hidden" name="cycle" value="monthly"> 
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						Select User
						<select class="custom-select" name="user_id" required="">
							<option selected="">Select</option>
							<?php if ($users):
								foreach ($users as $key): ?>
									<option value="<?php echo $key->data->ID; ?>"><?php echo $key->data->user_email.' '.$key->data->user_nicename; ?></option>
								<?php endforeach;
							endif; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						Subscription status
						<select class="custom-select" name="status" required="">
							<option selected="">Select</option>
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
							<option value="expired">Expired</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label for="">End Date</label>
					<input type="date" name="payment_end_date" class="form-control" required="required">
				</div>				
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	<?php else: 


$results2 = $wpdb->get_row('
SELECT *
	FROM '.$wpdb->prefix.'payments
	WHERE id = '.$_GET['id'].'
	'); ?>

		



		<form action="" method="POST">
			<input type="hidden" name="type" value="manual"> 
			<input type="hidden" name="cycle" value="monthly"> 
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						Select User
						<select class="custom-select" name="user_id" required="">
							<option value="<?php echo $results2->user_id; ?>"><?php echo get_user_name($results2->user_id); ?></option>
							<?php if ($users):
								foreach ($users as $key): ?>
									<option value="<?php echo $key->data->ID; ?>"><?php echo $key->data->user_email.' '.$key->data->user_nicename; ?></option>
								<?php endforeach;
							endif; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						Subscription status
						<select class="custom-select" name="status" required="">
							<option value="<?php echo $results2->status; ?>"><?php echo $results2->status; ?></option>
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
							<option value="expired">Expired</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label for="">End Date</label>
					<input type="date" name="payment_end_date" value="<?php echo $results2->payment_end_date; ?>" class="form-control" required="required">
				</div>	
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>


	<?php endif ?>



	</div>
</div>


<div class="card mb-3">
	<h3 class="card-header">Manual Payments:</h3>
	<div class="card-body">
		
		<table class="table table-hover" style="font-size: 12px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>status</th>
					<th>End Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($results))  { ?>
				<?php $i =1; foreach ($results as $row_item): ?>
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo get_user_name($row_item->user_id); ?></td>
					<td><?php echo $obj->get_user_email_by_id($row_item->user_id); ?></td>
					<td><?php echo $row_item->status; ?></td>
					<td><?php echo $row_item->payment_end_date; ?></td>
					<td>
						<a href="?page=Add_user_in_Subscription&edit=true&id=<?php echo $row_item->id; ?>"  class="btn btn-xs btn-primary">Edit</a>
						<a href="?page=Add_user_in_Subscription&delete=true&id=<?php echo $row_item->id; ?>"  class="btn btn-xs btn-primary">Delete</a>
					</td>
				</tr>
				<?php endforeach ?>
				<?php } ?>
			</tbody>
		</table>
		
	</div>
</div>