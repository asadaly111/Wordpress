<div class"btns" style="float: right;"><button id="ADD2">+</button></div>
<div class="beforeappend2">
	<label for="">
		Color Name?
		<input type="text" name="cs_soul[color][]">
	</label>
	<label for="">
		Color Code?
		<input type="text" name="cs_soul[color_code][]">
	</label>
	<label for="">
		Background Img?
		<input type="text" name="cs_soul[bg_img][]">
	</label>
	<label for="">
		Amount?
		<input type="text" name="cs_soul[amount][]">
	</label>
</div>
<div class="appendhere2"></div>
<div class="setupcharges">
	<label for="">
		Setup Charges?
		<input type="text" name="cs_soul[setupcharges]" id="setupcharges" value="0">
	</label>
</div>
<script>
	jQuery(document).ready(function($) {
		jQuery(document).on("click", "#ADD2", function(event) {
			event.preventDefault();
			jQuery(".appendhere2").append('<div class="beforeappend2"><label for=""> Color Name? <input  type="text" name="cs_soul[color][]"></label><label for=""> Color Code? <input type="text" name="cs_soul[color_code][]"></label><label for=""> Background Img? <input type="text" name="cs_soul[bg_img][]"></label><label for=""> Amount? <input type="text" name="cs_soul[amount][]"></label><button class="REMOVE">-</button></div>');
		});
		jQuery(document).on("click", ".REMOVE", function(event) {
			event.preventDefault();
			jQuery(this).parent().remove();
		});
	});


	<?php if (isset($_GET['post'])): 
	$cs_soul = get_post_meta( $_GET['post'], 'cs_soul', false );
	if (!empty($cs_soul[0])): ?>

		jQuery('.beforeappend2').html('');
		var json_ob = <?php echo $cs_soul[0]; ?>;
		jQuery('#setupcharges').val(json_ob.soul_setup_charges);
		for(x in json_ob.cs_soul){
			var partsOfStr = json_ob.cs_soul[x].split(',');
			jQuery(".appendhere2").append('<div class="beforeappend2"><label for=""> Color Name? <input value="'+partsOfStr[0]+'" type="text" name="cs_soul[color][]"></label><label for=""> Color Code? <input type="text" name="cs_soul[color_code][]" value="'+partsOfStr[1]+'"></label><label for=""> Background Img? <input value="'+partsOfStr[2]+'" type="text" name="cs_soul[bg_img][]"></label><label for=""> Amount? <input type="text" name="cs_soul[amount][]" value="'+partsOfStr[3]+'"></label><button class="REMOVE">-</button></div>');
		}

	<?php endif; 
	endif; ?>



</script>



