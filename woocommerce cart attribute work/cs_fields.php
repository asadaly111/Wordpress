<div class"btns" style="float: right;"><button id="ADD1">+</button></div>
<div class="beforeappend1">
	<label for="">
		Pairs?
		<input type="text" name="pairs[]">
	</label>
	<label for="">
		Price?
		<input type="text" name="price[]">
	</label>
</div>
<div class="appendhere1"></div>
<script>
	jQuery(document).ready(function($) {
		jQuery(document).on("click", "#ADD1", function(event) {
			event.preventDefault();
			jQuery(".appendhere1").append('<div class="beforeappend1"><label for="">Pairs? <input type="text" name="pairs[]" required=""></label><label for=""> Price? <input type="text" name="price[]" required=""></label><button class="REMOVE">-</button></div>');
		});
		jQuery(document).on("click", ".REMOVE", function(event) {
			event.preventDefault();
			jQuery(this).parent().remove();
		});
	});

	<?php if (isset($_GET['post'])): 
	$pairs = get_post_meta( $_GET['post'], 'cs_pairs', false );
	if (!empty($pairs[0])): ?>

		jQuery('.beforeappend1').html('');
		var json_ob = <?php echo $pairs[0]; ?>;
		for(x in json_ob.cs_pairs){
			var partsOfStr = json_ob.cs_pairs[x].split(',');
			jQuery('.appendhere1').append('<div class="beforeappend1"><label for="">Pairs? <input type="text" name="pairs[]" required="" value="'+partsOfStr[0]+'"></label><label for=""> Price? <input value="'+partsOfStr[1]+'" type="text" name="price[]" required=""></label><button class="REMOVE">-</button></div>');
		}

	<?php endif; 
	endif; ?>



</script>

