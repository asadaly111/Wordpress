 <?php

require_once('pay/includes/config.php');
get_header(); ?>
<?php nectar_page_header($post->ID);  ?>
<?php
$options = get_nectar_theme_options();
wp_enqueue_script('nectarMap', get_template_directory_uri() . '/js/map.js', array('jquery'), '1.0', TRUE);
?>
<div class="container-wrap">
	<div class="container main-content events">
		<div class="row">
			<!-- <div class="seacrh col span_12">
				<form class="sea" method="post" action="<?php echo site_url('/search-event/');?>">
					<div class="col span_6">
						<input type="text" name="sname" placeholder="Seacrh By Title">
					</div>
					<div class="col span_6">
						<input type="text" name="sprice" placeholder="Seacrh By Price">
					</div>
					<div class="col span_6">
						<input type="date" name="sdate" placeholder="Search By Date">
					</div>
					<div class="col span_6">
						<input type="submit" name="sssubmit" name="Search">
					</div>
				</form>
			</div> -->
			<div class="col span_8 first">
				<table class="events-table" id="data">
					<thead>
						<tr class="main">
							<th class="event-time" scope="col">Select</th>
							<th class="event-time" scope="col">Date/Time</th>
							<th class="event-description" scope="col">Event</th>
							<th class="event-description" scope="col">Price</th>
							<th class="event-description" scope="col">Spaces</th>
							<th class="event-description" scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$the_query = new WP_Query( array('post_type'=> 'events' , 'posts_per_page' => -1 , 'status' => 'publish'));
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<tr>
									<input type="hidden" id="ids" name="idpost" value="<?php echo get_the_ID();?>">
									<td><input type="checkbox" class="case" name="checkbox[]" data-id="<?php echo get_the_ID();?>"></td>
									<td id="date">
										<?php echo get_field('from');?> - <br><?php echo get_field('to');?>
										<br>
										<?php echo get_field('time');?>
									</td>
									<input type="hidden" id="til" name="til" value="<?php echo the_title();?>">
									<td id="title"><?php echo the_title();?><br><?php echo the_content();?></td>
									<td id="price"><?php echo get_field('price');?></td>
									<td>
										<?php $h = get_field('spaces');
								//echo $h;
										echo '<select class="spaccess">';
										for($i=0;$i<=$h;$i++){
											echo '<option value="'.$i.'">'.$i.' </option>';
										}
										echo '</select>';
										?>
									</td>
									<td id="tot">0<?php //echo get_field('price');?></td>
								</tr>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col span_4">
				<div class="sidebar-css" id="order-summary">
					<header class="e-fieldset__header -divider-bottom">
						<div class="e-fieldset__title">
							<h3 class="t-heading -size-xs h-m0">Order Summary</h3>
						</div>
					</header>
					<form class="chekkk" method="post" action="#">
						<div class="e-fieldset__body">
							<div class="order-summary">
								<div class="order-summary__group">
									<div class="headii">
										<input type="hidden" name="idds" value="">
										<div class="col span_6">
											<strong>Title</strong>
										</div>
										<div class="col span_3">
											<strong>Spaces</strong>
										</div>
										<div class="col span_3">
											<strong>Amount</strong>
										</div>
									</div>
									<div class="order-summary__entry___">
									</div>
								</div>
								<div class="order-summary__group -divider-top">
									<div class="order-summary__entry h-m0">
										<div class="order-summary__description h-text-truncate">
											<h4 class="t-heading total">Total: <b>£ <span id="t-currency">0</span></b></h4>
											<input type="hidden" id="toal" name="total" value="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col span_12 staus result">
				<?php
				if(isset($_POST['submit'])){
					global $post;
					//print_r($_POST);
					extract($_POST);

					
					
					if (isset($_POST['idd']) && isset( $_POST['titt']) && isset( $_POST['spaa']) ) {
					
					$data = array();
					foreach ($_POST['idd'] as $key => $value) {
					$data['downlaods'][] = ['id' => $_POST['idd'][$key], 'title' => $_POST['titt'][$key], 'space' => $_POST['spaa'][$key] ];
					}
					}


					$posid = wp_insert_post(
						array('post_title'=>'require', 'post_content'=>'Inquiry', 'status' => 'draft', 'post_category' => 'inquirydata')
					);

					
					update_post_meta( $posid, '_creditrepair', $data);
					update_post_meta( $posid, '_total', $total);


				//Store request params in an array
					$request_params = array
					(
						'METHOD' => 'DoDirectPayment',
						'USER' => $api_username,
						'PWD' => $api_password,
						'SIGNATURE' => $api_signature,
						'VERSION' => $api_version,
						'PAYMENTACTION' => 'Sale',
						'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
				// 'CREDITCARDTYPE' => 'MasterCard',
						'ACCT' => $ncard,
						'EXPDATE' => $nmonth.$nexp,
						'CVV2' => $ncvv,
						'FIRSTNAME' => $fname,
						'LASTNAME' => $nname,
						'STREET' => $nstreet,
						'CITY' => $ncity,
						'STATE' => $nstate,
						'COUNTRYCODE' => $ncountry,
						'ZIP' => $nzip,
						'AMT' => $total,
						'CURRENCYCODE' => 'GBP',
						'DESC' => 'Testing Payments Pro'
					);
				// Loop through $request_params array to generate the NVP string.
					$nvp_string = '';
					foreach($request_params as $var=>$val)
					{
						$nvp_string .= '&'.$var.'='.urlencode($val);
					}
				// Send NVP string to PayPal and store response
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_VERBOSE, 1);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt($curl, CURLOPT_TIMEOUT, 30);
					curl_setopt($curl, CURLOPT_URL, $api_endpoint);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
					$result = curl_exec($curl);
				//echo $result.'<br /><br />';
					curl_close($curl);
				// Parse the API response
					$result_array = NVPToArray($result);
					if ($result_array['ACK'] == 'Success') {

						$to = 'jolaye@yandex.com';
						$subject = 'EVENTS SUMMARY';
						$headers = "From: " . $email . "\r\n";
					//$headers .= "CC: james@logoviz.com\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						$message = '<html><body>';
						$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
						$message .= "<tr style='background: #eee;'><td><strong>First Name:</strong> </td><td>" . $fname . "</td></tr>";
						$message .= "<tr><td><strong>Last Name:</strong> </td><td>" . $nname . "</td></tr>";
						$message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . $nemail . "</td></tr>";
						$message .= "<tr><td><strong>Last Name:</strong> </td><td>" . $nname . "</td></tr>";
						$message .= "<tr><td><strong>Amount:</strong> </td><td>" . $total . "</td></tr>";
						$message .= "</table>";
						$message .= "</body></html>";
						$mail = wp_mail( $to, $subject, $message, $headers);
						echo "<script>window.location = '".site_url('/sucess/')."'</script>";
						//echo "<p class='sucess'>Booking Successfully Completed.</p>";
					}else{
						echo '<div class="isa_error">'.$result_array['L_LONGMESSAGE0'].' <a href="javascript:;" onclick="window.history.back();">BACK</a></div>';
					}
				//echo '<pre />';
					//print_r($result_array);
				}
				?>
			</div>
			<div class="col span_12 fooo" style="display: none;">
				<form class="payment" method="post" action="#">
					<h3>Booking</h3>
					<input type="hidden" id="toal" name="total" value="">
					<div class="col span_4">
						<input type="text" name="fname" placeholder="First name*">
					</div>
					<div class="col span_4">
						<input type="text" name="nname" placeholder="Last Name*">
					</div>
					<div class="col span_4">
						<input type="email" name="nemail" placeholder="E-mail address*:">
					</div>
					<div class="col span_4">
						<input type="text" name="nstreet" placeholder="Street address*:">
					</div>
					<div class="col span_4">
						<input type="text" name="ncity" placeholder="City*:">
					</div>
					<div class="col span_4">
						<select id="edit-panes-billing-billing-zone" name="nstate" required="" class="valid" aria-invalid="false">
							<option value="">County*:</option>
							<option value="AV">Avon</option>
							<option value="BE">Bedfordshire</option>
							<option value="BK">Berkshire</option>
							<option value="BU">Buckinghamshire</option>
							<option value="CA">Cambridgeshire</option>
							<option value="CH">Cheshire</option>
							<option value="CV">Cleveland</option>
							<option value="CO">Cornwall</option>
							<option value="CD">Cumberland</option>
							<option value="CU">Cumbria</option>
							<option value="DE">Derbyshire</option>
							<option value="DV">Devon</option>
							<option value="DO">Dorset</option>
							<option value="DU">County Durham</option>
							<option value="EX">Essex</option>
							<option value="GE">Gloucestershire</option>
							<option value="GL">Greater London</option>
							<option value="GM">Greater Manchester</option>
							<option value="HA">Hampshire</option>
							<option value="HE">Herefordshire</option>
							<option value="HT">Hertfordshire</option>
							<option value="HB">Humberside</option>
							<option value="HU">Huntingdonshire</option>
							<option value="IW">Isle of Wight</option>
							<option value="KE">Kent</option>
							<option value="LA">Lancashire</option>
							<option value="LE">Leicestershire</option>
							<option value="LN">Lincolnshire</option>
							<option value="LO">London</option>
							<option value="ME">Merseyside</option>
							<option value="MX">Middlesex</option>
							<option value="NO">Norfolk</option>
							<option value="NH">Northamptonshire</option>
							<option value="ND">Northumberland</option>
							<option value="NT">Nottinghamshire</option>
							<option value="OX">Oxfordshire</option>
							<option value="RU">Rutland</option>
							<option value="SH">Shropshire</option>
							<option value="SO">Somerset</option>
							<option value="ST">Staffordshire</option>
							<option value="SK">Suffolk</option>
							<option value="SU">Surrey</option>
							<option value="SX">Sussex</option>
							<option value="TW">Tyne and Wear</option>
							<option value="WA">Warwickshire</option>
							<option value="WM">West Midlands</option>
							<option value="WE">Westmorland</option>
							<option value="WI">Wiltshire</option>
							<option value="WO">Worcestershire</option>
							<option value="YO">Yorkshire</option> 
						</select>
					</div>
					<div class="col span_4">
						<select id="edit-panes-billing-billing-country" name="ncountry" required="" class="valid" aria-invalid="false">
							<option value="UK" selected="selected">United Kingdom</option>
						</select>
					</div>
					<div class="col span_4">
						<input type="text" name="nzip" placeholder="Postcode*:">
					</div>
					<div class="col span_4">
						<input autocomplete="off" type="tel" id="edit-panes-payment-details-cc-number" name="ncard" size="20" maxlength="16" placeholder="Card number*:" required="required">
					</div>
					<div class="col span_4">
						<input autocomplete="off" type="tel" id="edit-panes-payment-details-cc-cvv" name="ncvv" value="" size="4" maxlength="4" placeholder="CVV*:" required="required">
					</div>
					<div class="col span_4">
						<select id="edit-panes-payment-details-cc-exp-month" name="nmonth" required="required" class="valid" aria-invalid="false">
							<option>Expiration Month*:</option>
							<option value="01">01 - January</option>
							<option value="02">02 - February</option>
							<option value="03">03 - March</option>
							<option value="04">04 - April</option>
							<option value="05">05 - May</option>
							<option value="06">06 - June</option>
							<option value="07">07 - July</option>
							<option value="08">08 - August</option>
							<option value="09">09 - September</option>
							<option value="10">10 - October</option>
							<option value="11">11 - November</option>
							<option value="12">12 - December</option>
						</select>
					</div>
					<div class="col span_4">
						<select id="exp-year" name="nexp" required="required" class="valid" aria-invalid="false">
							<option>Expiration Year*:</option>
							<option value="2017">2018</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
							<option value="2031">2031</option>
							<option value="2032">2032</option>
							<option value="2033">2033</option>
							<option value="2034">2034</option>
							<option value="2035">2035</option>
							<option value="2036">2036</option>
							<option value="2037">2037</option>
						</select>
					</div>

					<div class="order-summary__entry1___">
					</div>

					<div class="col span_12">
						<input type="submit" name="submit" value="Pay Now"><i class="fab fa-cc-paypal"></i>
					</div>
				</form>
			</div>
		</div><!--/row-->
	</div><!--/container-->
</div>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		function sum_up() {
			var t = jQuery("input[name='checkbox[]']:checked").length;
			//alert(t);
			var sum = 0;

			if (t != 0) {
				jQuery('#order-price.order-summary__price.pprice').each(function(){
					var to = sum += parseFloat(jQuery(this).text());
					console.log(to);
					jQuery('span#t-currency').text(to);
					jQuery('input#toal').val(to);
				});
			}else{
				jQuery('span#t-currency').text('0');
				jQuery('input#toal').val('0');
				jQuery('.col.span_12.fooo').hide();
			}
		}
		function add_quantity() {
			jQuery("input[name='checkbox[]']:checked").each(function(index, el) {
				var v = jQuery(this).data('id');
				var ischecked= jQuery(this).is(':checked');
				var data = jQuery(this).parents('tr:eq(0)');
				var _date = jQuery(data).find('td:eq(1)').text();
				var _id = jQuery(data).find('input#ids').val();
				var _tit = jQuery(data).find('input#til').val();
				var _title = jQuery(data).find('td:eq(2)').text();
				var _space = jQuery(data).find('td select.spaccess option:selected').val();
				var _total = jQuery(data).find('td:eq(5)').text();
				jQuery('.'+v).find('.spaces').text(_space);
				jQuery('.'+v).find('.pprice').text(_total);
				sum_up();
			// if(ischecked){
			// jQuery('.order-summary__entry___').append('<div class="'+v+' tet"><div class="order-summary__description h-text-truncate col span_6 title" title="Intro">'+_tit+'</div><div class="order-summary__spaces col span_3 spaces">'+_space+' </div><div id="order-price" class="order-summary__price col span_3 pprice">'+_total+'</div></div><input type="hidden" name="id[]" value="'+v+'"><div style="clear:both"></div>');
			// jQuery('.col.span_12.fooo').show();
			// sum_up();
			// }else{
			// jQuery('.'+v).remove();
			// sum_up();
			// }
		});
		}
		jQuery('span#t-currency').text('0');
		jQuery('select.spaccess').on('change', function() {
			var space = ( this.value );
			var value = jQuery(this).parents('tr').find('td#price').text();
			var multiply = space * value;
			jQuery(this).parents('tr').find('td#tot').text(multiply);
			add_quantity();
		});
		jQuery("input[name='checkbox[]']").click(function(){
			var v = jQuery(this).data('id');
			var ischecked= jQuery(this).is(':checked');
			var data = jQuery(this).parents('tr:eq(0)');
			var _date = jQuery(data).find('td:eq(1)').text();
			var _id = jQuery(data).find('input#ids').val();
			var _tit = jQuery(data).find('input#til').val();
			var _title = jQuery(data).find('td:eq(2)').text();
			var _space = jQuery(data).find('td select.spaccess option:selected').val();
			var _total = jQuery(data).find('td:eq(5)').text();
			if(ischecked){
				jQuery('.order-summary__entry___').append('<div class="'+v+' tet"><div class="order-summary__description h-text-truncate col span_6 title" title="Intro">'+_tit+'</div><div class="order-summary__spaces col span_3 spaces">'+_space+' </div><div id="order-price" class="order-summary__price col span_3 pprice">'+_total+'</div><input type="hidden" id="idd" name="idd[]" value="'+v+'"><input type="hidden" id="titt" name="titt[]" value="'+_tit+'"><input type="hidden" id="spp" name="spaa[]" value="'+_space+'"></div><div style="clear:both"></div>');
				jQuery('.order-summary__entry1___').append('<div class="'+v+' tet"><div class="order-summary__description h-text-truncate col span_6 title" title="Intro">'+_tit+'</div><div class="order-summary__spaces col span_3 spaces">'+_space+' </div><div id="order-price" class="order-summary__price1 col span_3 pprice">'+_total+'</div><input type="hidden" id="idd" name="idd[]" value="'+v+'"><input type="hidden" id="titt" name="titt[]" value="'+_tit+'"><input type="hidden" id="spp" name="spaa[]" value="'+_space+'"></div><div style="clear:both"></div>');
				jQuery('.col.span_12.fooo').show();
				sum_up();
			}else{
				jQuery('.'+v).remove();
				// jQuery('#idd').remove();
				// jQuery('#titt').remove();
				// jQuery('#spp').remove();
				sum_up();
			}
		});
	});
</script>