<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 

// pr($_SESSION);

// $_SESSION['step1'] = false;
// $_SESSION['step2'] = true;
// $_SESSION['url'] = Easy_URL.'template/steps/step2.php?id='.$_GET['id'];


// if (empty($_SESSION['step1'])) {
// 	$_SESSION['step1']  = true;
// }

// if (!empty($_SESSION['step1'])) {
// 	$_SESSION['url'] = ;
// }
?>


<link rel="stylesheet" href="<?php echo Easy_URL; ?>assets/css/style.css">

<div id="formappen"></div>



<?php get_footer(); ?>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
jQuery(document).ready(function() {
	// Make a request for a user with a given ID
	jQuery('#formappen').html('<div class="loadingcs"></div>');
	jQuery('.loadingcs').LoadingOverlay("show");
	axios.get('<?php echo Easy_URL.'template/steps/step1.php'; ?>')
	.then(function (response) {
		jQuery('#formappen').html(response.data);
	})
	.catch(function (error) {
		console.log(error);
		jQuery('.loadingcs').LoadingOverlay("hide");
	})
	.finally(function () {
	});

// step 2 hits
jQuery(document).on('click', '.viewpkg', function(event) {
	event.preventDefault();
	var id = jQuery(this).data('id');
	var serviceName = jQuery(this).data('servicename');

	console.log(id);

	jQuery('#formappen').LoadingOverlay("show");
	axios.get('<?php echo Easy_URL.'template/steps/step2.php'; ?>?id='+id+'&serviceName='+serviceName)
	.then(function (response) {
		jQuery('#formappen').LoadingOverlay("hide");
		jQuery('#formappen').html(response.data);
	})
	.catch(function (error) {
		console.log(error);
		jQuery('#formappen').LoadingOverlay("hide");
	})
	.finally(function () {
		ini_on_demand();
	});
});


// step 3 hits
jQuery(document).on('submit', '.addresssubmit', function(event) {
	event.preventDefault();

	var formdata = jQuery('.addresssubmit').serialize();
	jQuery('#formappen').LoadingOverlay("show");
	axios.get('<?php echo Easy_URL.'template/steps/step3.php'; ?>?'+formdata)
	.then(function (response) {
		jQuery('#formappen').LoadingOverlay("hide");
		jQuery('#formappen').html(response.data);
	})
	.catch(function (error) {
		console.log(error);
		jQuery('#formappen').LoadingOverlay("hide");
	})
	.finally(function () {
		ini_on_demand();
	});
});


// step 4 hits
jQuery(document).on('submit', '.durationsubmnit', function(event) {
	event.preventDefault();
	var formdata = jQuery('.durationsubmnit').serialize();
	var duration = jQuery('input[name="duration"]:checked').data('duration');
	var price = jQuery('input[name="duration"]:checked').data('price');
	jQuery('#formappen').LoadingOverlay("show");
	axios.get('<?php echo Easy_URL.'template/steps/step4.php'; ?>?'+formdata+'&durationTime='+duration+'&price='+price)
	.then(function (response) {
		jQuery('#formappen').LoadingOverlay("hide");
		jQuery('#formappen').html(response.data);
	})
	.catch(function (error) {
		console.log(error);
		jQuery('#formappen').LoadingOverlay("hide");
	})
	.finally(function () {
		ini_on_demand();
	});
});


// Step Back hit
jQuery(document).on('click', '.stepback', function(event) {
	event.preventDefault();
	var url = jQuery(this).data('url');
	jQuery('#formappen').LoadingOverlay("show");
	axios.get(url)
	.then(function (response) {
		jQuery('#formappen').LoadingOverlay("hide");
		jQuery('#formappen').html(response.data);
	})
	.catch(function (error) {
		console.log(error);
		jQuery('#formappen').LoadingOverlay("hide");
	})
	.finally(function () {
		ini_on_demand();
	});
});

jQuery(document).on('change', '.timeslot-bottom input[type="radio"]', function(event) {
	if (jQuery(this).prop('checked')) {
		var formdata = jQuery('.slotsend').serialize();
		jQuery('#formappen').html('<div class="loadingcs"></div>');
		jQuery('.loadingcs').LoadingOverlay("show");
		axios.get('<?php echo Easy_URL.'template/steps/step5.php'; ?>?'+formdata)
		.then(function (response) {
			jQuery('#formappen').html(response.data);
		})
		.catch(function (error) {
			jQuery('#formappen').LoadingOverlay("hide");
			console.log(error);
		})
		.finally(function () {
			ini_on_demand();
		});
	}
});

jQuery(document).on('change', '.timeslot-top input[name="date_select"]', function(event) {

	if (jQuery(this).prop('checked')) {
		var data = jQuery(this).val();

		jQuery('#slotsappend').html('<div class="loadingcs"></div>');
		jQuery('.loadingcs').LoadingOverlay("show");

		axios.get('<?php echo Easy_URL.'template/steps/slots_append.php'; ?>?date='+data)
		.then(function (response) {
			jQuery('#slotsappend').html(response.data);
		})
		.catch(function (error) {
			jQuery('#slotsappend').LoadingOverlay("hide");
			console.log(error);
		})
		.finally(function () {
			slots_slider();
		});
	}
});






	// Create Booking Hit
	jQuery(document).on('submit', '.create_booking', function(event) {
		event.preventDefault();
		
		jQuery('#formappen').LoadingOverlay("show");

		var formData = new FormData(jQuery(this)[0]);
		axios({
			method: 'post',
			url: "<?php echo site_url('/wp-admin/admin-ajax.php?action=create_booking');  ?>",
			data: formData,
			headers: {'Content-Type': 'multipart/form-data' }
		})
		.then(function (response) {
			jQuery('#formappen').LoadingOverlay("hide");
			console.log(response);

			if (response.data.status) {
				swal('Thank You!', response.data.message.message ,'success');
				window.location = '<?php echo site_url('/thankyou'); ?>';
			}else{
				swal({
					type: 'error',
					title: 'Oops...',
					text: response.data.message.L_LONGMESSAGE0,
				});
			}

		})
		.catch(function (error) {
			jQuery('#formappen').LoadingOverlay("hide");
			console.log(error);
		})
		.finally(function () {

		});



	});



});//end document Read


function openCity(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();




</script>

