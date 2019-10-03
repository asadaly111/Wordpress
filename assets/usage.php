<?php 
// Styling and scripts
add_action('booking_script_css', 'booking_script_css_styles');
function booking_script_css_styles(){
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/assets/css/bootstrap.css">';
	echo '<link href="'.get_stylesheet_directory_uri().'/assets/vendor/featherlight/featherlight.min.css" type="text/css" rel="stylesheet" />';
	echo '<script src="'.get_stylesheet_directory_uri().'/assets/vendor/featherlight/featherlight.min.js" type="text/javascript" charset="utf-8"></script>';
}
?>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/sweetalert.min.js"></script> 


<!-- datapickker -->
<link href="<?php echo MAINURL.'/assets/vendor/'; ?>/datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo MAINURL.'/assets/vendor/'; ?>/datepicker/js/datepicker.min.js"></script>
<script src="<?php echo MAINURL.'/assets/vendor/'; ?>/datepicker/js/i18n/datepicker.en.js"></script>


<!-- date picker -->
<link href="<?php echo MAINURL.'/assets/vendor/'; ?>/datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo MAINURL.'/assets/vendor/'; ?>/datepicker/js/datepicker.min.js"></script>
<script src="<?php echo MAINURL.'/assets/vendor/'; ?>/datepicker/js/i18n/datepicker.en.js"></script>


<!-- select box library -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/fastselect-master/dist/fastselect.min.css" type="text/css" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/fastselect-master/dist/fastselect.standalone.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/fastselect-master/dist/fastselect.js"></script>


<script>
	jQuery.LoadingOverlay("hide");
	jQuery.LoadingOverlay("show");
</script>


<!-- Featherlight popup -->
<a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=booking_details&id='.$row_item->booking_id); ?>" data-featherlight="ajax" class="btn btn-primary btn-sm">Details</a>




<select class="multipleSelect" name="job_location">
	<option value=""></option>
	<option value="1"></option>
</select>
<script>
	jQuery(document).ready(function() {
		jQuery('.multipleSelect').fastselect();
	});
</script>




<!-- Data picker -->
<script>
	jQuery('.datepickker').attr('type', 'text').datepicker({
		language: 'en',
		dateFormat: 'yy-mm-dd',
		multipleDates: false,
		position: "bottom left",
		minDate: new Date(),
		autoClose: true,
		onSelect: function(dateText) {
			console.log(0);
		}
	});	
</script>






<!-- Ajax Select box -->
<script>
jQuery('.multipleSelect').select2();
	
	jQuery('.js-select-ajax').select2({
		ajax: {
			url: '<?php echo admin_url('admin-ajax.php?action=get_items'); ?>',
			dataType: "json",
			type: "GET",
			data: function (params) {

				var queryParameters = {
					term: params.term
				}
				return queryParameters;
			},
			processResults: function (data) {
				var arr = []
				jQuery.each(data.items, function (index, value) {
					arr.push({
						id: value.id,
						text: value.name
					})
				})
				return {
					results: arr
				};
			}
		}
	});
</script>
<?php 
add_action( 'wp_ajax_get_items', 'get_items' );
add_action( 'wp_ajax_nopriv_get_items', 'get_items' );
function get_items(){
	global $wpdb,$obj;
	$branchestab = $wpdb->prefix.'ego_items';
	$data1 =  $wpdb->get_results( 'SELECT * FROM '.$branchestab .' WHERE itemName LIKE "%'.$_GET['term'].'%" ');
	foreach ($data1 as $key) {
		$new[] = ['id'=> $key->id, 'name' => $key->itemName];
	}
	$data['items']  = $new;
	print(json_encode($data));
	exit();
}
?>