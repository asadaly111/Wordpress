<?php do_action('c3_scripts'); 

global $obj, $wpdb;

$data = $obj->getRows($wpdb->prefix.'careers');

if (!empty($_GET['id'])) {
	$wpdb->delete( $wpdb->prefix.'careers', array( 'id' => $_GET['id'] ) );
	echo '<div class="notice notice-success is-dismissible">Deleted!</div>';
}

?>

<div class="card mb-3">
	<h3 class="card-header">Careers</h3>
	<div class="card-body">
		



		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Location</th>
					<th scope="col">City</th>
					<th scope="col">Intrest Level</th>
					<th scope="col">Existing Customer</th>
					<th scope="col">Resume</th>
					<th scope="col">Status</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>



				<?php if ($data):
					$i = 1;
					foreach ($data as $key): ?>
						<tr class="table-active">
							<th scope="row"><?php echo $i; $i++; ?></th>
							<td><?php echo $key->first_name.' '.$key->last_name; ?></td>
							<td><?php echo $key->email; ?></td>
							<td><?php echo $key->location; ?></td>
							<td><?php echo $key->city; ?></td>
							<td><?php echo $key->intrest_level; ?></td>
							<td><?php echo $key->existing_customer; ?></td>
							<td><a href="<?php echo wp_get_attachment_url($key->resume); ?>" target="_blank">Download attachment</a></td>
							<td><?php echo $key->status; ?></td>
							<td>
								<a href="?post_type=truck_load&page=career&id=<?php echo $key->id; ?>" class="btn btn-primary btn-sm">X</a>

							</td>
						</tr>
					<?php endforeach;
				endif; ?>




			</tbody>
		</table>




		
	</div>
</div>