<?php do_action('lms_scripts');
$econdir_company_name  = get_post_meta( $_GET['post'],'econdir_company_name', true);
$econdir_company_phone  = get_post_meta( $_GET['post'],'econdir_company_phone', true);
$econdir_contact_person_name  = get_post_meta( $_GET['post'],'econdir_contact_person_name', true);
$econdir_city  = get_post_meta( $_GET['post'],'econdir_city', true);
$econdir_category  = get_post_meta( $_GET['post'],'econdir_category', true);
$econdir_subcats  = get_post_meta( $_GET['post'],'econdir_subcats', true);
$econdir_website  = get_post_meta( $_GET['post'],'econdir_website', true);
$company_email  = get_post_meta( $_GET['post'],'company_email', true);
$econdir_location = get_post_meta( $_GET['post'],'company_location', true);
$catalogue = get_post_meta( $_GET['post'],'catalogue', true);


global $wpdb;
$econdir_gallery_published  = getRows($wpdb->prefix.'post_images', ['where' =>['post_id' =>$_GET['post'], 'adminDeleteApprove' => 0, 'adminPendingApprove' => 1 ] ]);
?>
<?php if (!empty($_GET['post'])): ?>
	<div class="row">
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">company name:</label>
			<input type="text" name="company_name" class="form-control" value="<?php echo $econdir_company_name; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">company_phone:</label>
			<input type="text" name="company_phone" class="form-control" value="<?php echo $econdir_company_phone; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">Contact Person Name:</label>
			<input type="text" name="contact_person_name" class="form-control" value="<?php echo $econdir_contact_person_name; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">City:</label>
			<input type="text" name="city" class="form-control" value="<?php echo $econdir_city; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">Location:</label>
			<input type="text" name="Location" class="form-control" value="<?php echo $econdir_location; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">Category:</label>
			<input type="text" name="category" class="form-control" value="<?php echo $econdir_category; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">Sub Category:</label>
			<input type="text" name="subcats" class="form-control" value="<?php echo $econdir_subcats; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">Website:</label>
			<input type="text" name="website" class="form-control" value="<?php echo $econdir_website; ?>">
		</div>
		<div class="col-md-6" style="max-width: 47% !important;">
			<label for="input" class="control-label">Company Email:</label>
			<input type="text" name="company_email" class="form-control" value="<?php echo $company_email; ?>">
		</div>
	</div>
	<div class="row">
		<style>
		ul.imagesnew {
			padding-left: 1%;
			width: 100%;
		}
		ul.imagesnew li {
			    float: left;
    position: relative;
    margin-right: 20px;
		}
		ul.imagesnew li input[type="checkbox"]{position: absolute;}
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
	</style>


	<div class="col-md-12">
		<p>Publish Images:</p>
		<ul class="imagesnew">
			<?php foreach ($econdir_gallery_published as $key9):
				$thumbnail = wp_get_attachment_image_src($key9->image,'thumbnail', true);
				?>
				<li><img src="<?php echo $thumbnail[0]; ?>" alt=""><span data-attachment="<?php echo $key9->image; ?>" data-id="<?php echo $key9->id; ?>">x</span></li>
			<?php endforeach ?>
		</ul>
	</div>




<?php if (!empty($catalogue)): ?>
	
	<div class="col-md-12">
	<p>Catalogue PDF</p>
		<a href="<?php echo wp_get_attachment_url($catalogue); ?>">Download</a>
	</div>
<?php endif ?>


</div>


<?php endif ?>