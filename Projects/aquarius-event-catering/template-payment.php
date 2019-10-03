<?php
/**
* Template Name: Payment Form
**/
get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
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
								<div class="e-form__input"><input class="f-input -type-string -width-full" type="text" name="billing_details_form[first_name]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-r-z">
								<span class="field-name">Last Name <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" type="text" name="billing_details_form[last_name]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">Company Name</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="billing_details_form[company_name]" ></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-r-z">
								<span class="field-name">Country <abbr title="required">*</abbr></span>
								<div class="e-form__input">
									<select id="edit-panes-billing-billing-country" name="billing_details_form[country_code]">
										<option value="US" selected="selected">United States</option>
									</select>

									
								</div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">Address<abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="billing_details_form[address]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-l-z">
								<span class="field-name">City <abbr title="required">*</abbr></span>
								<div class="e-form__input"><input class="f-input -type-string -color-mid -width-full" maxlength="100" size="100" type="text" name="billing_details_form[city]" required=""></div>
							</div>
						</div>
						<div class="col span_6">
							<div class="large-6 medium-6 columns first p-r-z">
								<span class="field-name">State / Province / Region</span>
								<div class="e-form__input">
									
									    <select id="edit-panes-billing-billing-zone" name="billing_details_form[region]">
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
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="billing_details_form[zipcode]" required=""></div>
							</div>
						</div>

						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Email Address</span>
								<div class="e-form__input"><input type="text" class="form_div" id="username" name="billing_details_form[email]" required="" value=""></div>
							</div>
						</div>

						<div class="col span_6">
							<div class="large-6 medium-6 columns last p-l-z">
								<span class="field-name">Mobile Phone</span>
								<div class="e-form__input"><input class="f-input -type-string -width-full" maxlength="100" size="100" type="text" name="billing_details_form[zipcode]"></div>
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
									<input id="credit-card-number" name="payment[credit-card-number]" class="card-field" type="tel" inputmode="numeric" placeholder="Card Number" autocomplete="off" required="">
								</label>
							</div>
							<div class="col span_6">
								<label class="card-label expiration-label right-border" for="expiration">
									<span class="field-name">MM/YY</span>
									<input id="expiration" name="payment[expiration]" class="expiration card-field" type="text" required="">
								</label>
							</div>
							<div class="col span_6">
								<label class="card-label cvv-label" for="cvv">
									<span class="field-name">CVV (3 digits)</span>
									<input id="cvv" name="payment[cvv]" class="cvv card-field" maxlength="3" type="tel" inputmode="numeric" placeholder="CVV" autocomplete="off" autocapitalize="off" value="" required="">
								</label>
							</div>
							<div style="clear: both;"></div>
						</div>
					<footer class="e-fieldset__footer">
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
											<?php if (!empty($_GET['item'])) {echo $_GET['item'];}else{ echo '-';} ?>
											<input type="hidden" name="payment[item]" value="<?php if (!empty($_GET['item'])) {echo $_GET['item'];}else{ echo '-';} ?>">
										</div>
										<div class="order-summary__price">$ <?php if (!empty($_GET['amount'])) {echo $_GET['amount'];}else{ echo '0';} ?>

											<input type="hidden" name="payment[amount]" value="<?php if (!empty($_GET['amount'])) {echo $_GET['amount'];}else{ echo '0';} ?>">
										
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
												<b>US<span class="t-currency">$<?php if (!empty($_GET['amount'])) {echo $_GET['amount'];}else{ echo '0';} ?></span></b>
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


<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/sweetalert.min.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.inputmask.bundle.js'></script>
<script>



jQuery('input#expiration').inputmask("99/9999",{ "clearIncomplete": true });

 var form = jQuery("form#cms_formsubmit");
 form.validate();






    jQuery(document).on('submit', 'form#cms_formsubmit', function(event) {
        event.preventDefault();
        jQuery('#ajax-loading-screen').css({'opacity':'1', 'display':'block'});
        jQuery('#ajax-loading-screen .loading-icon').animate({'opacity':1},400);
        var form = jQuery(this);
        var formData = new FormData(jQuery(form)[0]);
        jQuery.ajax({
            type: 'post',
            url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
        })
        .done(function(value) {
            jQuery('#ajax-loading-screen').css({'opacity':'0', 'display':'none'});
            if (value.class == 'alert alert-success') {
            	form.trigger('reset');
            	swal(
            		'Good job!',
            		value.msg,
            		'success'
            		)
            }else{
            	swal({
            		type: 'error',
            		title: 'Oops...',
            		text: 'Something went wrong!',
            	})
            }
            console.log(value);
        })
        .fail(function() {

        	swal({
        		type: 'error',
        		title: 'Oops...',
        		text: 'Something went wrong!',
        	});
            jQuery('#ajax-loading-screen').css({'opacity':'0', 'display':'none'});
            console.log("error");
        });

    });


</script>