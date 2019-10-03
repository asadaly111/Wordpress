<?php do_action('lms_scripts'); 


$data2 = get_post_meta( $_GET['post'], 'directory_updated_request', true ); 

global $wpdb;
$econdir_gallery  = getRows($wpdb->prefix.'post_images', ['where' =>['post_id' =>$_GET['post'], 'isDelete' => 0 , 'adminDeleteApprove' => 0, 'adminPendingApprove' => 0 ] ]);
$econdir_gallerydeleted  = getRows($wpdb->prefix.'post_images', ['where' =>['post_id' =>$_GET['post'] , 'isDelete' => 1, 'adminDeleteApprove' => 0 ] ]);

?>

<div class="row">
  <div class="col-md-12">
    <p>Request for Update:</p>
    <ul class="imagesnew">
      <?php foreach ($econdir_gallery as $key2):
				$thumbnail = wp_get_attachment_image_src($key2->image,'thumbnail', true);
				?>
      <li><img src="<?php echo $thumbnail[0]; ?>" alt=""><span data-attachment="<?php echo $key2->image; ?>" data-id="<?php echo $key2->id; ?>">x</span>
        <input type="checkbox" name="images[]" value="<?php echo $key2->id; ?>">
      </li>
      <?php endforeach ?>
    </ul>
    <div style="clear: both;"></div>
    <p>Request for Delete:</p>
    <ul class="imagesnew">
      <?php foreach ($econdir_gallerydeleted as $key3):
				$thumbnail = wp_get_attachment_image_src($key3->image,'thumbnail', true);
				?>
      <li><img src="<?php echo $thumbnail[0]; ?>" alt=""><span data-attachment="<?php echo $key3->image; ?>" data-id="<?php echo $key3->id; ?>">x</span>
        <input type="checkbox" name="images[]" value="<?php echo $key3->id; ?>">
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>
<?php if (!empty($data2)): 
	$data = json_decode( $data2);
	$data->subcats = implode(',', $data->subcats);
	unset($data->post_id); ?>
<div class="row">
  <?php if ($data): ?>
  <?php foreach ($data as $key => $value): ?>
  <div class="col-md-6" style="max-width: 47% !important;">
    <label for="input" class="control-label"><?php echo $key; ?>:</label>
    <input type="text" class="form-control" value="<?php echo $value; ?>" readonly>
  </div>
  <?php endforeach ?>
  <?php endif ?>
  <div class="col-md-6"> <br>
    <button type="button" class="btn btn-default" id="updatebtn">Update</button>
  </div>
</div>
<script>
	jQuery(document).ready(function() {
	var v = <?php echo $data2; ?>;
		
		jQuery('#updatebtn').click(function(event) {
			var v = <?php echo $data2; ?>;
			for (vin in v) {
				jQuery('input[name="'+vin+'"]').val(v[vin]);
			}
		});
	});
</script>
<?php endif ?>
<script>
	jQuery(document).on('click', 'ul.imagesnew li span', function(event) {
		event.preventDefault();
		var t = jQuery(this);
		var v = jQuery(this).data('attachment');
		var p = jQuery(this).data('id');
		jQuery.post('<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_deleteattachment_admin', {attachment: v, id : p }, function(data, textStatus, xhr) {
			t.closest('li').remove();
		});
	});
</script> 
