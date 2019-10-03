<style>
.edit-profile .col-lg-6, .edit-profile .col-lg-12{margin-bottom: 10px;}
</style>
<?php global $user, $obj, $wpdb; //pr($user); //20
$dataservices = $obj->getRows($wpdb->prefix.'posts', ['where' =>['post_author' => $user->ID, 'post_type'=> 'services']]);
// pr($dataservices);
?>
<?php if (!isset($_GET['edit']) && !isset($_GET['gallery']) && !isset($_GET['videos'])):  ?>
	
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error id, expedita voluptates necessitatibus dolorum sequi amet magni, quasi, ullam vel enim obcaecati. Maxime ipsam autem illo, ullam aspernatur facere laudantium.

	<table class="table table-striped">
		<thead>
			<tr>
				<th>
					#
				</th>
				<th>
					Name
				</th>
				<th>
					Profile Status
				</th>
				<th>
					Actions
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($dataservices): ?>
				<?php foreach ($dataservices as $key): ?>
					<tr>
						<td>
							1
						</td>
						<td>
							<?php echo $key->post_title; ?>
						</td>
						<td>
							<?php echo $key->post_status; ?>
						</td>
						<td>
							<a href="?edit=true&id=<?php echo $key->ID;  ?>" class="btn btn-3d btn-primary btn-xs mb-2">Edit Profile</a>
							<a href="?gallery=true&id=<?php echo $key->ID;  ?>" class="btn btn-3d btn-primary btn-xs mb-2">Add Gallery</a>
							<a href="?videos=true&id=<?php echo $key->ID;  ?>" class="btn btn-3d btn-primary btn-xs mb-2">Add Videos</a>
							<a href="<?php echo get_the_permalink( $key->ID);  ?>" target="_blank" class="btn btn-3d btn-primary btn-xs mb-2">View Profile</a>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>









<?php 
elseif (isset($_GET['edit'])):

	$id = $_GET['id'];
	$post   = get_post( $id );
	$black_age = get_post_meta( $id , 'black_age', true );
	$black_city = get_post_meta( $id , 'black_city', true);
	$black_ethnicity = get_post_meta( $id , 'black_ethnicity', true);
	$black_hair = get_post_meta( $id , 'black_hair', true);
	$black_height = get_post_meta( $id , 'black_height', true);
	$black_location = get_post_meta( $id , 'black_location', true);
	$black_phone = get_post_meta( $id , 'black_phone', true);
	$black_rates = get_post_meta( $id , 'black_rates', true);
	$black_smoker = get_post_meta( $id , 'black_smoker', true);
	$black_state = get_post_meta( $id , 'black_state', true);
	$black_travel = get_post_meta( $id , 'black_travel', true);
	$black_weight = get_post_meta( $id , 'black_weight', true);
	$black_wroking_hours = get_post_meta( $id , 'black_wroking_hours', true);
	$black_social_media = get_post_meta( $id , 'black_social_media', true); ?>

	
<div class="heading heading-primary heading-border heading-bottom-border">
	<h3 class="heading-primary">Edit Profile</h3>
</div>

<form action="" method="POST" id="formsubmit">
<input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
<div class="row edit-profile">
	<div class="col-lg-6">
		Full Name
		<input type="text" name="black_ful_name" class="form-control" value="<?php echo get_the_title($id); ?>">
	</div>
 	<div class="col-lg-6">
			Age
		<input type="number" name="black_age" class="form-control" value="<?php if(!empty($black_age)){ echo $black_age;} ?>">
	</div>	
	<div class="col-lg-12">
			Bio
			<textarea name="black_bio" class="form-control" rows="3" required="required"><?php echo $post->post_content; ?></textarea>
	</div>
	<div class="col-lg-6">
			Phone Number
		<input type="number" name="black_phone" class="form-control" value="<?php if(!empty($black_phone)){ echo $black_phone;} ?>">
	</div>

	<div class="col-lg-6">
			Hair
		<input type="text" name="black_hair" class="form-control" value="<?php if(!empty($black_hair)){ echo $black_hair;} ?>">
	</div>
	<div class="col-lg-6">
			Travel
		<select name="black_travel" class="form-control" required="required">
				<?php if (!empty($black_travel)): 
					echo '<option value="'.$black_travel.'">'.$black_travel.'</option>';
					else: ?>
					<option value="">Select</option>
				<?php endif ?>
			<option value="yes">YES</option>
			<option value="no">NO</option>
		</select>
	</div>
	<div class="col-lg-6">
			Weight 
			<select name="black_weight" class="form-control" required="required">
				<?php if (!empty($black_weight)): 
					echo '<option value="'.$black_weight.'">'.$black_weight.'</option>';
					else: ?>
					<option value="">Select</option>
				<?php endif ?>
				<option value="40">40 KG</option>
				<option value="41">41 KG</option>
				<option value="42">42 KG</option>
				<option value="43">43 KG</option>
				<option value="44">44 KG</option>
				<option value="45">45 KG</option>
				<option value="46">46 KG</option>
				<option value="47">47 KG</option>
				<option value="48">48 KG</option>
				<option value="49">49 KG</option>
				<option value="50">50 KG</option>
				<option value="51">51 KG</option>
				<option value="52">52 KG</option>
				<option value="53">53 KG</option>
				<option value="54">54 KG</option>
				<option value="55">55 KG</option>
				<option value="56">56 KG</option>
				<option value="57">57 KG</option>
				<option value="58">58 KG</option>
				<option value="59">59 KG</option>
				<option value="60">60 KG</option>
				<option value="61">61 KG</option>
				<option value="62">62 KG</option>
				<option value="63">63 KG</option>
				<option value="64">64 KG</option>
				<option value="65">65 KG</option>
				<option value="66">66 KG</option>
				<option value="67">67 KG</option>
				<option value="68">68 KG</option>
				<option value="69">69 KG</option>
				<option value="70">70 KG</option>
				<option value="71">71 KG</option>
				<option value="72">72 KG</option>
				<option value="73">73 KG</option>
				<option value="74">74 KG</option>
				<option value="75">75 KG</option>
				<option value="76">76 KG</option>
				<option value="77">77 KG</option>
				<option value="78">78 KG</option>
				<option value="79">79 KG</option>
				<option value="80">80 KG</option>
				<option value="81">81 KG</option>
				<option value="82">82 KG</option>
				<option value="83">83 KG</option>
				<option value="84">84 KG</option>
				<option value="85">85 KG</option>
				<option value="86">86 KG</option>
				<option value="87">87 KG</option>
				<option value="88">88 KG</option>
				<option value="89">89 KG</option>
				<option value="90">90 KG</option>
				<option value="91">91 KG</option>
				<option value="92">92 KG</option>
				<option value="93">93 KG</option>
				<option value="94">94 KG</option>
				<option value="95">95 KG</option>
				<option value="96">96 KG</option>
				<option value="97">97 KG</option>
				<option value="98">98 KG</option>
				<option value="99">99 KG</option>
				<option value="100">100 KG</option>
			</select>
	</div>
	<div class="col-lg-6">
			Height
			<input type="number" name="black_height" class="form-control" value="<?php if(!empty($black_height)){ echo $black_height; } ?>">
	</div>
	<div class="col-lg-6">
		Ethnicity
		<select name="black_ethnicity" id="black_ethnicity" class="form-control" required="required">
				<?php if (!empty($black_ethnicity)): 
					echo '<option value="'.$black_ethnicity.'">'.$black_ethnicity.'</option>';
					else: ?>
					<option value="">Select</option>
				<?php endif ?>
		</select>
	</div>
	<div class="col-lg-6">
			Rates (AUD)
		<input type="text" name="black_rates" class="form-control" value="<?php if(!empty($black_rates)){ echo $black_rates;} ?>">
	</div>
	<div class="col-lg-6">
			Smoker
		<select name="black_smoker" class="form-control" required="required">
				<?php if (!empty($black_smoker)): 
					echo '<option value="'.$black_smoker.'">'.$black_smoker.'</option>';
					else: ?>
					<option value="">Select</option>
				<?php endif ?>
			<option value="yes">YES</option>
			<option value="no">NO</option>
		</select>		
	</div>
	<div class="col-lg-6">
			Location
		<input type="text" name="black_location" class="form-control" value="<?php if(!empty($black_location)){ echo $black_location;} ?>">
	</div>
	<div class="col-lg-6">
			State
		<select name="black_state" class="form-control" required="required">
				<?php if (!empty($black_state)): 
					echo '<option value="'.$black_state.'">'.$black_state.'</option>';
					else: ?>
					<option value="">Select</option>
				<?php endif ?>
			<option value="New South Wales">New South Wales</option>
			<option value="Queensland">Queensland</option>
			<option value="South Australia">South Australia</option>
			<option value="Tasmania">Tasmania</option>
			<option value="Victoria">Victoria</option>
			<option value="Western Australia">Western Australia</option>
			<option value="Australian Capital Territory">Australian Capital Territory</option>
			<option value="Jervis Bay Territory">Jervis Bay Territory</option>
			<option value="Northern Territory">Northern Territory</option>
			<option value="Ashmore and Cartier Islands">Ashmore and Cartier Islands</option>
			<option value="Australian Antarctic Territory">Australian Antarctic Territory</option>
			<option value="Christmas Island">Christmas Island</option>
			<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
			<option value="Coral Sea Islands">Coral Sea Islands</option>
			<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
			<option value="Norfolk Island">Norfolk Island</option>
		</select>			
	</div>
	<div class="col-lg-6">
			City
		<input type="text" name="black_city" class="form-control" value="<?php if(!empty($black_city)){ echo $black_city;} ?>">
	</div>
	<div class="col-lg-12">
			<strong>Social Media</strong>
		<input type="text" name="black_social_media[]" class="form-control" placeholder="https://www.facebook.com/somethingPage" value="<?php if(!empty($black_social_media[0])){ echo $black_social_media[0];} ?>"><br>
		<input type="text" name="black_social_media[]" class="form-control" placeholder="https://www.instagram.com/somethingPage" value="<?php if(!empty($black_social_media[1])){ echo $black_social_media[1];} ?>"><br>
		<input type="text" name="black_social_media[]" class="form-control" placeholder="https://www.youtube.com/somethingPage" value="<?php if(!empty($black_social_media[2])){ echo $black_social_media[2];} ?>"><br>
	</div>
	<div class="col-lg-6">
			Working Hours
		<input type="text" name="black_wroking_hours" class="form-control" value="<?php if(!empty($black_wroking_hours)){ echo $black_wroking_hours;} ?>">
	</div>
	<div class="col-lg-12">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>	
</div>
</form>
<div id="msgShow"></div>


<?php  elseif (isset($_GET['gallery'])): ?>
<!-- Gallery -->
	
<div class="heading heading-primary heading-border heading-bottom-border">
	<h3 class="heading-primary">Gallery</h3>
</div>


<form action="<?php echo site_url().'/wp-admin/admin-ajax.php?action=black_gallery&id='.$_GET['id']; ?>" class="dropzone">
  <div class="fallback">
    <input name="file" type="file" multiple id="myupload">
  </div>
</form>


<div class="clearfix"></div>
<div class="row">
	<?php $datainarray = get_post_meta( $_GET['id'], '_gallery', true);
	if ($datainarray) {
		foreach ($datainarray as $key => $value) {
			$thumbnail = wp_get_attachment_image_src($value,'thumbnail', true);
			echo '<div class="col-md-3"><img src="'.$thumbnail[0].'"></div>';
		}
	}
	?>
</div>






<?php  elseif (isset($_GET['videos'])): ?>
<!-- vIDEOS -->
<div class="heading heading-primary heading-border heading-bottom-border">
	<h3 class="heading-primary">Videos</h3>
</div>
<form action="<?php echo site_url().'/wp-admin/admin-ajax.php?action=black_videos&id='.$_GET['id']; ?>" class="dropzone">
	<div class="fallback">
		<input name="file" type="file" multiple id="myupload">
	</div>
</form>
<div class="clearfix"></div>
<div class="row">
	<?php $datainarray = get_post_meta( $_GET['id'], '_videos', true);
	if ($datainarray) {
		foreach ($datainarray as $key => $value) {
			$get = wp_get_attachment_url($value);
			echo '<div class="col-md-3"><video width="320" height="240" controls>
  <source src="'.$get.'" type="video/mp4">
  Your browser does not support the video tag.
</video></div>';
		}
	}
	?>
</div>



<?php else:
	echo "Not found!";
endif ?>



<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/black/vendor/dropzone/basic.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/black/vendor/dropzone/dropzone.css">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/black/vendor/dropzone/dropzone.js"></script>
<script>
jQuery(document).ready(function() {
	// jQuery('#black_smoker').val(1111);



jQuery(document).on('submit', '#formsubmit', function(event) {
	event.preventDefault();
	jQuery(this).append('<div class="porto-ajax-loading"></div>');
	var form = jQuery(this);
	var formData = new FormData(jQuery(this)[0]);
	jQuery.ajax({
		type: 'post',
		url: '<?php echo site_url(''); ?>/wp-admin/admin-ajax.php?action=edit_profile',
		dataType: 'json',
		contentType: false,
		processData: false,
		data: formData,
	})
	.done(function(value) {
		jQuery('.porto-ajax-loading').remove();
	// if (value.class == 'isa_error isa_sucess') {
	// 	form.trigger('reset');
	// 	jQuery('.loader-css').hide();
	// }
	jQuery('#msgShow').html('<div class="alert '+value.class+'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+value.msg+'</div>');
	// html('');
	// jQuery('.loader-css').hide();
	console.log(value);
	})
	.fail(function() {
		jQuery('.loader-css').hide();
		console.log("error");
	});
});


jQuery.getJSON('<?php echo get_stylesheet_directory_uri(); ?>/black/json/ethinicity.json', { param1: 'value1'}, function(json, textStatus) {
	jQuery.each(json.ethinicty, function(index, val) {
		jQuery('#black_ethnicity').append('<option value="'+val+'">'+val+'</option>')
	});
});





});

</script>




