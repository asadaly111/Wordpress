<div class"btns" style="float: right;"><button id="ADD3">+</button></div>
<div class="beforeappend3">
	<label for="">
		Color Name?
		<input type="text" name="cs_strap[color][]">
	</label>
	<label for="">
		Color Code?
		<input type="text" name="cs_strap[color_code][]">
	</label>
	<label for="">
		Background Img?
		<input type="text" name="cs_strap[bg_img][]">
	</label>
	<label for="">
		Amount?
		<input type="text" name="cs_strap[amount][]">
	</label>
</div>
<div class="appendhere3"></div>
<div class="setupcharges">
	<label for="">
		Setup Charges?
		<input type="text" name="cs_strap[setupcharges]" id="setupcharges1" value="0">
	</label>
</div>
<script>
	jQuery(document).ready(function($) {
		jQuery(document).on("click", "#ADD3", function(event) {
			event.preventDefault();
			jQuery(".appendhere3").append('<div class="beforeappend3"><label for=""> Color Name? <input type="text" name="cs_strap[color][]"></label><label for=""> Color Code? <input type="text" name="cs_strap[color_code][]"></label><label for=""> Background Img? <input type="text" name="cs_strap[bg_img][]"></label><label for=""> Amount? <input type="text" name="cs_strap[amount][]"></label><button class="REMOVE">-</button></div>');
		});
		jQuery(document).on("click", ".REMOVE", function(event) {
			event.preventDefault();
			jQuery(this).parent().remove();
		});
	});


	<?php if (isset($_GET['post'])): 
	$straps = get_post_meta( $_GET['post'], 'cs_straps', false );
	if (!empty($straps[0])): ?>

		jQuery('.beforeappend3').html('');
		var json_ob_strap = <?php echo $straps[0]; ?>;
		jQuery('#setupcharges1').val(json_ob_strap.strap_setup_charges);
		for(x in json_ob_strap.cs_strap){
			var partsOfStr = json_ob_strap.cs_strap[x].split(',');
			
			jQuery(".appendhere3").append('<div class="beforeappend3"><label for=""> Color Name? <input type="text" value="'+partsOfStr[0]+'" name="cs_strap[color][]"></label><label for=""> Color Code? <input value="'+partsOfStr[1]+'" type="text" name="cs_strap[color_code][]"></label><label for=""> Background Img? <input type="text" name="cs_strap[bg_img][]" value="'+partsOfStr[2]+'"></label><label for=""> Amount? <input type="text" name="cs_strap[amount][]" value="'+partsOfStr[3]+'"></label><button class="REMOVE">-</button></div>');
		}

	<?php endif; 
	endif; ?>


</script>



