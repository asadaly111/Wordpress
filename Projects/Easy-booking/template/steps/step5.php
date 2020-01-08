<?php 
session_start();
require dirname(__FILE__, 6).'/wp-load.php';

$_SESSION['formdata']['timeslot'] = $_GET['timeslot'];

// pr($_SESSION);
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
					<a href="javascript:;" data-url="<?php echo $_SESSION['step4_url']; ?>" class="stepback"><i class="fa fa-arrow-left"></i></a>
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
			</div>
		</div>
	</div>
</div>


<!-- Section -->
<form action="" method="POST" class="create_booking formvalidate">

<?php if ($_SESSION['formdata']): ?>
	<?php foreach ($_SESSION['formdata'] as $key => $value): ?>
		<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
	<?php endforeach ?>
<?php endif ?>


<div class="checkout-page">
	<div class="container">
		<div class="row">
			<div class="main-heading">
				<h1>Confirm Booking</h1>
			</div>
			<div class="col span_6">
				<h3>Contact Details</h3>
				<p>Please fill the form in so we can reach you easier.</p>
				<div class="details-form">
					<form method="" action="">
						<div class="row">
							<div class="col span_12">
								<label>Mobile Number</label>
								<input type="text" name="mobile" class="mobile" id="mobile" required="">
							</div>
						</div>
						<div class="row">
							<div class="col span_12">
								<label>Email</label>
								<input type="text" name="email" class="mobile" required="">
							</div>
						</div>


						<div class="row">
							<div class="col span_6">
								<label>First Name</label>
								<input type="text" name="fname" class="name" value="Jordan" required="">
							</div>
							<div class="col span_6">
								<label>Last Name</label>
								<input type="text" name="lname" class="name" value="Gould" required="">
							</div>
						</div>



						<div class="row">
							<div class="col span_6">
								<label>Street Name</label>
								<input type="text" name="street_name" class="street_name" id="street_name" value="35 Dummy street Lorem " >
							</div>
							<div class="col span_6 col_last">
								<label>House / Flat / Room No</label>
								<input type="text" name="house" class="house" id="house">
							</div>
						</div>
						<div class="row">
							<div class="col span_6">
								<label>Postcode</label>
								<input type="text" name="postcode" class="postcode" id="postcode" value="74568">
							</div>
							<div class="col span_6 col_last">
								<label>City</label>
								<input type="text" name="city" class="city" id="city" value="largo">
							</div>
						</div>
						<div class="row">
							<div class="col span_12">
								<label>Any Additional notes For your therapist?
								<br>E.g Please Don’t ring the bell</label>
								<textarea></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col span_6 col_last">
				<div class="user-details">
					<p class="logged-in">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
					<div class="user-table">
						<div class="user-row">
							<div class="row">
								<div class="col span_3">
									<img src="https://dev5.onlinetestingserver.com/ecommail/wp-content/uploads/2019/12/user-icons_03.png">
								</div>
								<div class="col span_9">
									<div class="date-meta">
										<p><?php echo $_SESSION['formdata']['date']; ?></p>
									</div>
									<div class="time-meta">
										<p><?php echo timeto12($_SESSION['formdata']['timeslot']); ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="user-row">
							<div class="row">
								<div class="col span_3">
									<img src="https://dev5.onlinetestingserver.com/ecommail/wp-content/uploads/2019/12/user-icons_06.png">
								</div>
								<div class="col span_9">
									<div class="date-meta">
										<p>Nina</p>
									</div>
									<div class="rating-meta">
										<span><i class="fa fa-star"></i> 4.00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="user-row">
							<div class="row">
								<div class="col span_3">
									<img src="https://dev5.onlinetestingserver.com/ecommail/wp-content/uploads/2019/12/user-icons_09.png">
								</div>
								<div class="col span_9">
									<div class="date-meta">
										<p><?php echo $_SESSION['formdata']['serviceName']; ?></p>
									</div>
									<div class="slot-meta">
										<p><?php echo $_SESSION['formdata']['durationTime'] ?> Minitues</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="notice">
							<h4>Free Cancellation & Amendment</h4>
							<p>Within the next 10 Minutes or up until 24 Hours before the booking</p>
							<p>70% refund up until 2 hours before the booking</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col span_6">
				<div class="payment-details">
					<h4>Payment Details</h4>
					<p>Your card details are stored with our secure payment
					provider checkout.com</p>
					<div class="payment-form">
						
						<div class="tab">
							<button class="tablinks active" onclick="openCity(event, 'paypal')" id="defaultOpen"><i class="fab fa-paypal paypal"></i> PAYPAL</button>
						</div>
						<div id="paypal" class="tabcontent">
							<div class="paypal-form">
									<div class="row">
										<div class="col span_12">
											<label>Credit Debit Card Number</label>
											<input type="text" name="cardsdetails[credit_card]" class="credit_card" id="credit_card" value="5110921864924447" required="">
										</div>
									</div>
									<div class="row">
										<div class="col span_12">
											<label>Expiration date (MM/YYYY)</label>
											<input type="text" name="cardsdetails[expiration_date]" class="expiration_date" id="expiration_date" placeholder="MM/YYYY" value="02/2020" required="">
										</div>
									</div>
									<div class="row">
										<div class="col span_12">
											<label>CVV/CV2</label>
											<input type="text" name="cardsdetails[cvv]" class="cvv" id="cvv" value="456" required="">
										</div>
									</div>
									<div class="row">
										<div class="col span_12">
											<label>Billing Postcode</label>
											<input type="text" name="cardsdetails[billing_postcode]" class="billing_postcode" id="billing_postcode" value="33770" required="">
										</div>
									</div>
							</div>
						</div>
						<p>You can use one of the discount codes in your wallet</p>
						<div class="discount-field">
							<label><img src="https://dev5.onlinetestingserver.com/ecommail/wp-content/uploads/2019/12/discount-icon_03.png" class="discount-img"></label>
							<input type="text" name="discount" id="discount" class="discount" placeholder="Enter New Discount Code">
						</div>
						<div class="total">
							<p>Total To pay <span class="total-meta">$<?php echo $_SESSION['formdata']['price']; ?></span> </p>
						</div>
						<div class="pay-now">
							<input type="hidden" name="amounttotal" value="<?php echo $_SESSION['formdata']['price']; ?>">
							<button type="submit">PAY NOW</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>