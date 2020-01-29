<?php 
session_start();
require dirname(__FILE__, 6).'/wp-load.php';
$_SESSION['formdata']['serviceId'] = $_GET['id'];
$_SESSION['formdata']['serviceName'] = $_GET['serviceName'];


$_SESSION['step1_url'] = Easy_URL.'template/steps/step1.php';
$_SESSION['step2_url'] = $_SERVER['REQUEST_URI'];
?>

<br>
<br>
<br>
<br>

<!-- ***** Header-sec(Start) ***** -->
<div class="header-sec">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-2 col-sm-12">
				<div class="back-btn">
					<a href="javascript:;" data-url="<?php echo $_SESSION['step1_url']; ?>" class="stepback"><i class="fa fa-arrow-left"></i></a>
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
			</div>
		</div>
	</div>
</div>

<!-- ***** Header-sec(End) ***** -->
<!-- ***** Mobile Treatment(Start) ***** -->
<div class="mobile-treatment">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-sm-12">
				<div class="mobile-treatment-head">
					<h1>Book a Mobile Treatment</h1>
				</div>
				<div class="row align-items-center" id="inr-treat">
					<div class="col-md-2 col-sm-12">
						<img src="<?php echo Easy_URL; ?>assets/images/img.png"/>
					</div>
					<div class="col-md-10 col-sm-12">
						<p class="mobile-clm-txt">Book a treatment today by entering your address.<br> We will connect you with the best mobile<br> practitioners in your area.</p>
					</div>
				</div>
				<div class="row align-items-center" id="inr-treat">
					<div class="col-md-2 col-sm-12">
						<img src="<?php echo Easy_URL; ?>assets/images/img1.png"/>
					</div>
					<div class="col-md-10 col-sm-12">
						<p class="mobile-clm-txt">Book a treatment today by entering your address.<br> We will connect you with the best mobile<br> practitioners in your area.</p>
					</div>
				</div>
				<div class="row align-items-center" id="inr-treat">
					<div class="col-md-2 col-sm-12">
						<img src="<?php echo Easy_URL; ?>assets/images/img2.png"/>
					</div>
					<div class="col-md-10 col-sm-12">
						<p class="mobile-clm-txt">Book a treatment today by entering your address.<br> We will connect you with the best mobile<br> practitioners in your area.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="appointment-form">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h5>Where would you like your appointment?</h5>
								<form action="#" method="POST" class="addresssubmit formbasicvalidate">
									<div class="col-md-12">
										<input type="text" id="address" class="edithoteladdressearch" value="<?php echo (!empty($_SESSION['formdata']['address'] ))?$_SESSION['formdata']['address']:'';  ?>" name="address" placeholder="Enter your address" required> 
									</div>  
									<div class="col-md-12"> 
										<input type="submit" <?php echo (!empty($_SESSION['formdata']['address'] ))? '':'disabled';  ?> value="Use this address" placeholder="Use this address"> 
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ***** Mobile Treatment(End) ***** -->




<script>
	function fillIn() {

	
	
	console.log(this.inputId);
	var idd = this.inputId;
	var place = this.getPlace();
	console.log(place. address_components[0].long_name);

    // var place = autocomplete.getPlace();
    latlng   = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());

    geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': latlng}, function(results, status) {

    	if (status == google.maps.GeocoderStatus.OK) {
    		if (results[1]) {

				// console.log(this);
				jQuery('#address').closest('form').find('input[type="submit"]').removeAttr('disabled');

    			for (var i = 0; i < results.length; i++) {
                            // console.log(results[i].types);
                            if (results[i].types[0] === "locality") {

                            	console.log(results[i].address_components);


                            	var city = results[i].address_components[0].short_name;
                            	var state = results[i].address_components[2].short_name;



                            	var locationcount = 0;
                            	for (var key in results[i].address_components) {
                            		locationcount = key;
                            	}
                            	country = results[i].address_components[locationcount].long_name;


                            }
                        }
                    }
                    else {console.log("No reverse geocode results.")}
                }
            else {console.log("Geocoder failed: " + status)}
        });






}
if (typeof google === 'undefined') {
	jQuery.getScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyCINS2dyuBipK8MZzOQnzyKdrS2I1_b5I4&libraries=geometry,places', () => {
		var inputs = document.getElementsByClassName('edithoteladdressearch');
		var autocompletes = [];
		
		var options = {
				types: ['(cities)'],
				componentRestrictions: {country: 'UK'}//Turkey only
		};
		
		var input = document.getElementById('address');
		var autocompletes = [];
		var autocomplete = new google.maps.places.Autocomplete(input, options);
		autocomplete.addListener('place_changed', fillIn);
		autocompletes.push(autocomplete);

	});
}else{
	var options = {
				types: ['(cities)'],
				componentRestrictions: {country: 'UK'}//Turkey only
		};

	var input = document.getElementById('address');
	var autocompletes = [];
	var autocomplete = new google.maps.places.Autocomplete(input, options);
	autocomplete.addListener('place_changed', fillIn);
	autocompletes.push(autocomplete);
}
</script>