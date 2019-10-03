<?php
get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
if (empty($_GET['subscription'])) {
	echo '<script>window.location = "'.site_url().'"</script>';
}
?>
<style>
.col{
	margin-right: 1% !important;
}
div#billing-details, #payment-method{border:#e1e8ed 1px solid;margin-bottom:30px;background-color:white;border-radius:4px;float: left;padding-left: 10px;padding-bottom: 30px;width: 100%}
header.e-fieldset__header.-divider-bottom{border-bottom:#e1e8ed 1px solid;padding-bottom:8px;margin-bottom:16px;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-flow:row wrap;-ms-flex-flow:row wrap;flex-flow:row wrap;-webkit-align-items:baseline;-ms-flex-align:baseline;align-items:baseline;margin:16px;}
div#billing-details .e-fieldset__body{margin:8px 16px;}
div#billing-details .e-fieldset__body select{background-color:white;font-family:inherit;border:1px solid #cccccc;box-shadow:inset 0 1px 2px rgba(0,0,0,0.1);color:rgba(0,0,0,0.75);display:block;font-size:1rem;margin:0 0 1.14286rem 0;padding:0.57143rem;height:2.64286rem;width:100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;transition:box-shadow 0.45s,border-color 0.45s ease-in-out;border-radius:3px;margin:0 0!important;}
.p-l-z{padding-left:0;}
.p-r-z{padding-right:0;}
div#order-summary{background-color:#fafafa;border-radius:4px;border:#e1e8ed 1px solid;margin-bottom:30px;}
.sidebar-css .e-fieldset__body{margin:8px 16px;}
.sidebar-css .order-summary{width:100%;font-size:14px;overflow:auto;}
.sidebar-css .order-summary__group.-divider-top{border-top:#e1e8ed 1px solid;margin-top:10px;padding-top:10px;}
.sidebar-css .order-summary__entry.h-m0{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-flow:row nowrap;-ms-flex-flow:row nowrap;flex-flow:row nowrap;margin-bottom:15px;}
.sidebar-css .order-summary__description.h-text-truncate{-webkit-flex:1 0;-ms-flex:1 0;flex:1 0;margin-right:10px;}
.sidebar-css .order-summary__total{-webkit-flex:0 0 150px;-ms-flex:0 0 150px;flex:0 0 150px;-webkit-align-self:baseline;-ms-flex-item-align:baseline;align-self:baseline;text-align:right;}
.sidebar-css h4.t-heading.-size-s.h-m0{}
.sidebar-css .order-summary__entry{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-flow:row nowrap;-ms-flex-flow:row nowrap;flex-flow:row nowrap;margin-bottom:15px;}
.sidebar-css h3.t-heading.-size-xs.h-m0{font-size:18px;}

form#cms_formsubmit input { height: 30px; padding-left: 8px; }
form#cms_formsubmit select { box-shadow: none !important; border: 1px solid #ccc !important; height: 34px !important; float: left; padding: 0 !important; }
form#cms_formsubmit span.field-name { font-size: 15px; }
form#cms_formsubmit h3.t-heading.-size-s , .sidebar-css h3.t-heading.-size-xs.h-m0{ font-size: 25px; font-weight: 600; }
form#cms_formsubmit .span_12 {width: 99%;}
form#cms_formsubmit button {height: 35px !important;line-height: 35px !important;padding: 0 30px !important;margin-top: 17px;}
span.t-currency {font-size: 17px;}
.error {color: red;}
</style>
<div class="container-wrap">
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		<div class="row">
			<!-- Custom form -  Checkout  -->



			<form class="e-fieldset__body" id="cms_formsubmit" action="/checkout/42610702/billing_details" method="post">
				<div class="col span_9">
					<div class="e-fieldset" id="billing-details">
						<header class="e-fieldset__header -divider-bottom">
							<div class="e-fieldset__title">
								<h3 class="t-heading -size-s h-m0">
									Billing Details
								</h3>
							</div>
						</header>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">First Name <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" type="text" name="first_name" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-r-z">
								<span class="field-name">Last Name <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" type="text" name="last_name" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-r-z">
								<span class="field-name">Country <abbr title="required">*</abbr></span>
								<div class="e-form__input">
									<select id="edit-panes-billing-billing-country" name="country_code">
										<option value="US" selected="selected">United States</option>
									</select>

									
								</div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">Address<abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="address" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">City <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -color-mid -width-full" maxlength="100" size="100" type="text" name="city" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-r-z">
								<span class="field-name">State / Province / Region</span>
								<div class="e-form__input">
									
									    <select id="edit-panes-billing-billing-zone" name="region">
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
								</div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Zip / Postal Code</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="zipcode" required=""></div>
							</div>
						</div>

						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Email Address</span>
								<div class="e-form__input"><input type="text" class="form_div" id="username" name="email" required="" value=""></div>
							</div>
						</div>

						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Mobile Phone</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="zipcode"></div>
							</div>
						</div>
						
					</div>
			
				
					<label for="">Ship to a different address? <input type="checkbox" name="shipingcheck" value="1"></label>
					
					<div style="clear: both;"></div>

					<div class="e-fieldset shippingdetails" id="billing-details" style="display: none;">
						<header class="e-fieldset__header -divider-bottom">
							<div class="e-fieldset__title">
								<h3 class="t-heading -size-s h-m0">
									Shipping details
								</h3>
							</div>
						</header>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">First Name <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" type="text" name="shipping[first_name]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-r-z">
								<span class="field-name">Last Name <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" type="text" name="shipping[last_name]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">Company Name</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="shipping[company_name]" ></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-r-z">
								<span class="field-name">Country <abbr title="required">*</abbr></span>
								<div class="e-form__input">
									<select id="edit-panes-billing-billing-country" name="shipping[country_code]">
										<option value="US" selected="selected">United States</option>
									</select>

									
								</div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">Address<abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="shipping[address]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">City <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -color-mid -width-full" maxlength="100" size="100" type="text" name="shipping[city]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-r-z">
								<span class="field-name">State / Province / Region</span>
								<div class="e-form__input">
									
									    <select id="edit-panes-billing-billing-zone" name="shipping[region]">
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
								</div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Zip / Postal Code</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="shipping[zipcode]" required=""></div>
							</div>
						</div>

						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Email Address</span>
								<div class="e-form__input"><input type="text" class="form_div" id="username" name="shipping[email]" required="" value=""></div>
							</div>
						</div>

						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Mobile Phone</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="shipping[zipcode]"></div>
							</div>
						</div>
						
					</div>




					<div id="payment-method">
						<div class="e-fieldset">
							<header class="e-fieldset__header -divider-bottom">
								<div class="e-fieldset__title">
									<h3 class="t-heading -size-s">Payment Information</h3>
								</div>
							</header>
							<div class="col span_12">
								<label class="card-label credit-card-number-label" for="credit-card-number">
									<span class="field-name">Card Number</span>
									<input type="tel" size="20" data-stripe="number" value="4242424242424242">
								</label>
							</div>
							<div class="col span_6">
								<label class="card-label expiration-label right-border" for="expiration">
									<span class="field-name">MM</span>
									<input type="tel" size="2" data-stripe="exp_month" value="02">
								</label>
							</div>
							<div class="col span_6">
								<label class="card-label expiration-label right-border" for="expiration">
									<span class="field-name">YY</span>
									<input type="tel" size="2" data-stripe="exp_year" value="20">
								</label>
							</div>							
							<div class="col span_6">
								<label class="card-label cvv-label" for="cvv">
									<span class="field-name">CVV (3 digits)</span>
									<input type="tel" size="4" data-stripe="cvc" value="123">
								</label>
							</div>
							<div style="clear: both;"></div>
						</div>
					<footer class="e-fieldset__footer">
						<input type="hidden" name="subscription_id" value="<?php echo get_subscription_id($_GET['subscription']); ?>">
						<button type="submit">Pay Now</button>
					</footer>
					</div>

				</div>
				<div class="col span_3">
					<div class="sidebar-css" id="order-summary">
						<header class="e-fieldset__header -divider-bottom">
							<div class="e-fieldset__title">
								<h3 class="t-heading -size-xs h-m0">Order Summary</h3>
							</div>
						</header>
						<div class="e-fieldset__body">
							<div class="order-summary">
								<div class="order-summary__group">
									<div class="order-summary__entry">
										<div class="order-summary__description h-text-truncate" title="Intro">
										Size:
										</div>
										<div class="order-summary__price"><?php echo get_size_id($_GET['size']); ?>
										<input type="hidden" name="subscription[size]" value="<?php echo $_GET['size']; ?>">
										</div>
									</div>
									<div class="order-summary__entry">
										<div class="order-summary__description h-text-truncate" title="Intro">
										Subscription:
										</div>
										<div class="order-summary__price"><?php echo get_subscription_by_id($_GET['subscription']); ?>
										<input type="hidden" name="subscription[subscription]" value="<?php echo $_GET['subscription']; ?>">	
										</div>
									</div>
									<div class="order-summary__entry">
										<div class="order-summary__description h-text-truncate" title="Intro">
										Amount:
										</div>
										<div class="order-summary__price"><?php echo get_subscription_amount_by_id($_GET['subscription']); ?>
										</div>
									</div>									
								</div>
								<div class="order-summary__group -divider-top">
									<div class="order-summary__entry h-m0">
										<div class="order-summary__description h-text-truncate">
											<h5 class="t-heading -size-s h-m0">Total:</h5>
										</div>
										<div class="order-summary__total">
											<h5 class="t-heading -size-s h-m0">
												<b>US<span class="t-currency">$<?php echo get_subscription_amount_by_id($_GET['subscription']); ?></span></b>
											</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>


			<div id="msg"></div>




		</div><!--/row-->
	</div><!--/container-->
</div><!--/container-wrap-->
<?php get_footer(); ?>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/custom/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/custom/sweetalert.min.js"></script> 
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>

jQuery(document).ready(function() {
	jQuery(document).on('change', 'input[name="shipingcheck"]', function(event) {
		event.preventDefault();
		var ischecked = jQuery(this).is(':checked');
		
		if(ischecked){
			jQuery('.shippingdetails').show();
		}else{
			jQuery('.shippingdetails').hide();
		}
	});
});


// jQuery.LoadingOverlay("show");

Stripe.setPublishableKey('pk_test_g1DAVTyISgZjE14NWaOEaepu');
/**
 * Custom validator for contains at least one lower-case letter
 */
jQuery.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
    return this.optional(element) || /[a-z]+/.test(value);
}, "Must have at least one lowercase letter");
 
/**
 * Custom validator for contains at least one upper-case letter.
 */
jQuery.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
    return this.optional(element) || /[A-Z]+/.test(value);
}, "Must have at least one uppercase letter");
 
/**
 * Custom validator for contains at least one number.
 */
jQuery.validator.addMethod("atLeastOneNumber", function (value, element) {
    return this.optional(element) || /[0-9]+/.test(value);
}, "Must have at least one number");
 
/**
 * Custom validator for contains at least one symbol. 
 */
jQuery.validator.addMethod("atLeastOneSymbol", function (value, element) {
    return this.optional(element) || /[!@#$%^&*()]+/.test(value);
}, "Must have at least one symbol");

	var form = jQuery("#cms_formsubmit");
	form.validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
			userName: {
				required: true,
				atLeastOneLowercaseLetter: true,
				minlength: 4,
				maxlength: 40,
				remote: {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_checkusername",
                    type: "post"
                }
			},
			userEmail: {
				required: true,
				email: true,
				remote: {
                    url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_checkemail",
                    type: "post"
                }
			},			
			confirm: {
				equalTo: "#password"
			}
		},
		messages: {
			userName: {
				required: "Please enter your Username",
				remote: "Username is already in use!"
			},
			userEmail: {
				required: "Please enter your Email address.",
				remote: "Email is already in use!"
			},
		},
		submitHandler: function(form) {
			jQuery.LoadingOverlay("show");
			// var formData = new FormData(jQuery(form)[0]);
			Stripe.card.createToken(form, stripeResponseHandler);
		}
	});








function stripeResponseHandler(status, response) {
  // Grab the form:
  var form = jQuery("#cms_formsubmit");

  if (response.error) { // Problem!

    // Show the errors on the form:
    form.find('.payment-errors').text(response.error.message);
    alert(response.error.message);
    jQuery.LoadingOverlay("hide");

  } else { // Token was created!

    // Get the token ID:
    var token = response.id;

    // Insert the token ID into the form so it gets submitted to the server:
    form.append(jQuery('<input type="hidden" name="stripeToken">').val(token));

    jQuery.ajax({
    	type: "POST",
    	url: "<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit",
    	dataType: 'json',
    	data: form.serialize(),
    	cache: false,
    	success: function(data) {
    		console.log(data);
    		jQuery.LoadingOverlay("hide");
			if (data.status) {
				Swal('Good job!',data.msg, 'success');
				form.trigger('reset');
			}else{
				Swal({
					type: 'error',
					title: 'Oops...',
					text: data.error.message,
				})

			}
    	}
    });





  }
};




</script>