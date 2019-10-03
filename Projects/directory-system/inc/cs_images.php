<?php 
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