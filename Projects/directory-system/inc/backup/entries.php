<?php if (empty($_GET['view'])): ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Directory Name</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			global $wpdb;
			$user_id  = get_current_user_id();
			$data = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'posts WHERE  post_type = "directories" AND post_author = '.$user_id.' ');
			if ($data): ?>
				<?php
				$i = 1;
				foreach ($data as $key): ?>
					<tr>
						<td><?php echo $i;$i++; ?></td>
						<td><?php echo $key->post_title; ?></td>
						<td><?php echo $key->post_status; ?></td>
						<td><a class="btn btn-primary" href="?view=true&id=<?php echo $key->ID;  ?>">View</a></td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
	<?php
else:
	global $wpdb;
	$data = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'posts WHERE ID = '.$_GET['id'].'  AND post_type = "directories" ');
	$econdir_company_name  = get_post_meta( $data->ID,'econdir_company_name', true);
	$econdir_company_phone  = get_post_meta( $data->ID,'econdir_company_phone', true);
	$econdir_contact_person_name  = get_post_meta( $data->ID,'econdir_contact_person_name', true);
	$econdir_category  = get_post_meta( $data->ID,'econdir_category', true);
	$econdir_city  = get_post_meta( $data->ID,'econdir_city', true);
	$econdir_subcats  = get_post_meta( $data->ID,'econdir_subcats', true);
	$econdir_website  = get_post_meta( $data->ID,'econdir_website', true);
	$company_email  = get_post_meta( $data->ID,'company_email', true);
	$catalogue = get_post_meta( $data->ID,'catalogue', true);

	$econdir_gallery  = getRows($wpdb->prefix.'post_images', ['where' => ['post_id' =>$data->ID, 'isDelete' => 0, 'adminDeleteApprove' => 0] ]); 



	$update_gallery = get_post_meta( $data->ID, 'update_gallery', true);

	$reason_for_cancellation__reason  = get_post_meta( $data->ID,'reason_for_cancellation__reason', true);

	?>



<?php if (!empty($reason_for_cancellation__reason)): ?>
	
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo $reason_for_cancellation__reason; ?>
</div>
<?php endif ?>



	<form method="POST" id="validation">
		<div class="contact-inner-1 row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="company_name" class="form-control" placeholder="Company Name" required="required" value="<?php echo $data->post_title; ?>">
				</div>
				<div class="form-group">
					<input type="number" step="1" name="company_phone" class="form-control" placeholder="Company Phone" required="required" value="<?php echo $econdir_company_phone; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="website" class="form-control" placeholder="Company Website (if any)" value="<?php echo $econdir_website; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="contact_person_name" class="form-control" placeholder="Contact Person Name" value="<?php echo $econdir_contact_person_name; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="company_email" class="form-control" placeholder="Email" value="<?php echo $company_email; ?>">
				</div>				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea id="message" name="company_description" class="form-control" placeholder="Company Description" required=""><?php echo $data->post_content; ?></textarea>
				</div>
					<?php if (!empty($catalogue)): ?>
							<strong>Catalogue PDF</strong>
							<div><a href="<?php echo wp_get_attachment_url($catalogue); ?>">Download</a></div>
					<?php endif ?>
			</div>
		</div>
		<div class="contact-inner-2 row">
			<div class="col-md-6 contact-inner-box-1">
				<div class="col-md-12">
					<h6>Select your category:</h6>
					<img src="images/icon1.png" class="icon" alt="">
					<select class="selectpicker" name="category" id="category" required="">

		





						
	

						<?php
						$category = array(
							'Construction' => 'construction consultancy',
							'Decorations' => 'decorations',
							'Flooring' => 'flooring',
							'Gardens' => 'gardens and swimming pools',
							'Aluminum' => 'aluminum and windows',
							'Kitchens' => 'kitchens and bathrooms',
						);
						$selectedkey = array_search ($econdir_category, $category);

						if (($key = array_search($econdir_category, $category)) !== false) {
							unset($category[$key]);
						}

						?>
							

						<option value="<?php echo $econdir_category; ?>" data-sub="<?php echo $selectedkey; ?>"><?php echo ucwords($econdir_category); ?></option>

						<?php foreach ($category as $categorykey => $categoryvalue): ?>
							<option value="<?php echo $categoryvalue; ?>" data-sub="<?php echo $categorykey; ?>"><?php echo ucwords($categoryvalue); ?></option>
						<?php endforeach ?>

					</select>
				</div>


				<div class="col-md-12 hidewhenchange">
					<h6>Selected your sub-category(s):</h6>
					<div class="col-md-12">
						<?php $sb = explode(',', $econdir_subcats); ?>
						<?php foreach ($sb as $key1 => $value1): ?>
							<label>
								<input type="checkbox" name="subcats[]" value="<?php echo $value1; ?>" checked>
								<?php echo $value1; ?>
							</label>

						<?php endforeach ?>
					</div>
				</div>


				<div class="col-md-12 contact-inner-box-2 sub_cats" >
					<h6>Select your sub-category(s):</h6>








					<div class="col-md-12 sub" id="Construction" style="display: none;">
						<label>
							<input type="checkbox" name="subcats[]" value="Consultancy">
						Consultancy</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Construction small building">
						Construction small building</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Construction big building">
						Construction big building</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Mechanical and plumbing">
						Mechanical and plumbing</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Air conditioning and electrical">
						Air conditioning and electrical</label>
						<label>
							<input type="checkbox" name="subcats[]" value="General maintenance">
						General maintenance</label>
					</div>
					<div class="col-md-12 sub" id="Decorations" style="display: none;">
						<label>
							<input type="checkbox" name="subcats[]" value="Interior design">
						Interior design</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Painting">
						Painting </label>
						<label>
							<input type="checkbox" name="subcats[]" value="Fit out">
						Fit out </label>
						<label>
							<input type="checkbox" name="subcats[]" value="Gypsum and ceiling">
						Gypsum and ceiling</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Wallpaper">
						Wallpaper</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Cabinet and carpenter">
						Cabinet and carpenter </label>
						<label>
							<input type="checkbox" name="subcats[]" value="Furniture">
						Furniture</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Others">
						Others</label>
					</div>
					<div class="col-md-12 sub" id="Flooring" style="display: none;">
						<label>
							<input type="checkbox" name="subcats[]" value="Marble">
						Marble</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Granite">
						Granite </label>
						<label>
							<input type="checkbox" name="subcats[]" value="Tile">
						Tile</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Stone">
						Stone</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Others">
						Others </label>
					</div>
					<div class="col-md-12 sub" id="Gardens" style="display: none;">
						<label>
							<input type="checkbox" name="subcats[]" value="Landscape">
						Landscape</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Swimming pool">
						Swimming pool</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Tent and outdoor decoration">
						Tent and outdoor decoration</label>
					</div>
					<div class="col-md-12 sub" id="Aluminum" style="display: none;">
						<label>
							<input type="checkbox" name="subcats[]" value="Windows">
						Windows</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Exterior doors and Garage">
						Exterior doors and Garage</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Others">
						Others </label>
					</div>
					<div class="col-md-12 sub" id="Kitchens" style="display: none;">
						<label>
							<input type="checkbox" name="subcats[]" value="Kitchen">
						Kitchen</label>
						<label>
							<input type="checkbox" name="subcats[]" value="Sanitary and Bathroom">
						Sanitary and Bathroom </label>
						<label>
							<input type="checkbox" name="subcats[]" value="Others">
						Others </label>
					</div>
				</div>
			</div>
			<div class="col-md-6 contact-inner-box-3">
				<div class="col-md-12">
					<h6>Choose your city:</h6>
					<img src="images/icon6.png" class="icon" alt="">
					<select class="selectpicker" name="city" required="">
						<option value="<?php echo $econdir_city; ?>"><?php echo ucwords($econdir_city); ?></option>
						<?php
						$city = array(
							'abudhabi' ,'dubai' ,'sharjah' ,'ajman' ,'um alquwain' ,
							'ras alkhaima' , 'alfujairah' , 'alain'
						);

						if (($key = array_search($econdir_city, $city)) !== false) {
							unset($city[$key]);
						}

						foreach ($city as $citykey => $cityvalue): ?>
							<option value="<?php echo $cityvalue; ?>"><?php echo ucwords($cityvalue); ?></option>
						<?php endforeach ?>


	


					</select>
				</div>
			</div>
		</div>
		<div class="contact-inner-3 row">
			<div class="col-md-12 contact-inner-box-4">
				<input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
				<input type="submit" class="btn" value="Submit">
			</div>
		</div><br>
		<div id="msg">
		</div>
	</form>





<style>
ul.imagesnew li {
float: left;
position: relative;
margin-right: 20px;
margin-bottom: 20px;
}
ul.imagesnew li span {
position: absolute;
right: -10px;
width: 20px;
height: 20px;
background: black;
text-align: center;
color: #fff;
font-size: 14px;
border-radius: 100%;
top: -6px;
cursor: pointer;
}
form.dropzone.dz-clickable {
float: left;
}
</style>






<ul class="imagesnew">
	<?php foreach ($econdir_gallery as $key2):
		$thumbnail = wp_get_attachment_image_src($key2->image,'thumbnail', true);
	?>
	<li><img src="<?php echo $thumbnail[0]; ?>" alt=""><span data-attachment="<?php echo $key2->image; ?>" data-id="<?php echo $key2->id; ?>">x</span></li>
	<?php endforeach ?>
</ul>


<form action="<?php echo site_url().'/wp-admin/admin-ajax.php?action=cs_update_gallery&id='.$data->ID; ?>" class="dropzone">
	<div class="fallback">
		<input name="file" type="file" multiple id="myupload">
	</div>
</form>

<div class="clearfix"></div>




<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/dropzone/basic.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/dropzone/dropzone.css">
<script src="<?php echo get_template_directory_uri(); ?>/vendor/dropzone/dropzone.js"></script>


	<script>
		jQuery(document).ready(function() {

			jQuery(document).on('submit', '#validation', function(event) {
				event.preventDefault();
				var formData = new FormData(jQuery(this)[0]);
				jQuery.ajax({
					type: 'post',
					url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit_1',
					dataType: 'json',
					contentType: false,
					processData: false,
					data: formData,
				})
				.done(function(value) {
					jQuery('#msg').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+value.msg+'</div>');
					console.log(value);
				})
				.fail(function() {
					console.log("error");
				});
			});


			jQuery(document).on('change', '#category', function(event) {
				event.preventDefault();
				jQuery('.hidewhenchange').remove();
			});


		});
	</script>

<script>
	jQuery(document).on('click', 'ul.imagesnew li span', function(event) {
		event.preventDefault();
		var t = jQuery(this);
		var v = jQuery(this).data('attachment');
		var p = jQuery(this).data('id');
		jQuery.post('<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_deleteattachment', {attachment: v, id: p }, function(data, textStatus, xhr) {
			t.closest('li').remove();
		});
	});
</script>


	<?php endif ?>