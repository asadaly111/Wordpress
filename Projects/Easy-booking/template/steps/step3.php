<?php
session_start();
require dirname(__FILE__, 6).'/wp-load.php';
$_SESSION['formdata']['address'] = $_GET['address'];
$_SESSION['step3_url'] = $_SERVER['REQUEST_URI'];
global $bokingobj;
// echo "<pre>";
	// print_r($data);
// echo "</pre>";
?>


<style>
.user-duration .error 
label {display: none !important;}
input.error+label {display: none !important;}
ruby {position: absolute;top: 60px;}
input.error+label+ruby {display: block !important;}
input.error+ruby {display: block !important;}
</style>

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
					<a href="javascript:;" data-url="<?php echo $_SESSION['step2_url']; ?>" class="stepback"><i class="fa fa-arrow-left"></i></a>
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
			</div>
		</div>
	</div>
</div>
<!-- ***** Header-sec(End) ***** -->
<?php if ($_SESSION['formdata']['serviceId'] != 49): $timess = json_decode($bokingobj->selectresourcepackages($_SESSION['formdata']['serviceId'])); ?>

	<div class="booking-sec">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-4 col-sm-12">
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="booking-clm">

						<form action="#" method="POST" class="durationsubmnit formbasicvalidate">
							<div class="user-duration">
								<h5>Select Duration <ruby><?php echo $_SESSION['formdata']['serviceName']; ?></ruby></h5>
								<ul>

									<?php if ($timess->timepackages): ?>
										<?php foreach ($timess->timepackages as $key): ?>
											<li>
												<label for="<?php echo $key->id; ?>"><h6><?php echo $key->slot; ?> Minutes </h6></label>
												<div><input id="<?php echo $key->id; ?>" type="radio" name="duration" value="<?php echo $key->id; ?>" required data-duration="<?php echo $key->slot; ?>" data-price="50">
													<span>$<?php echo $key->price; ?></span></div>
												</li>
											<?php endforeach; ?>
										<?php endif; ?>
									</ul>
								</div>
								<button class="booking-submit-btn" type="submit">
									<!-- <a href="#" class="booking-btn"></a> -->
									Continue
								</button>
							</form>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
					</div>
				</div>
			</div>
		</div>
		<?php else: $data = json_decode($bokingobj->subservices($_SESSION['formdata']['serviceId'])); //pr($data); ?>

			<div class="booking-sec">
				<div class="container">
					<div class="row">

						<?php $i =1; foreach ($data->subservices as $key): ?>
							<form action="#" method="POST" class="durationsubmnit formbasicvalidate<?php echo $i++; ?>">
								<div class="col-md-4 col-sm-12">
									<div class="booking-clm">
										<div class="user-duration">
											<h5>Select Duration<ruby><?php echo $key[0]->sub[0]->name; ?> </ruby></h5>
											<ul>
												<?php foreach ($key as $keykey): ?>

													<li>
														<label for="radio-1"><h6><h6><?php echo $keykey->slot; ?> Minutes</h6> <p>£<?php echo $keykey->price; ?></p></h6></label>
														<input type="radio" name="duration" value="<?php echo $keykey->id; ?>" required data-duration="<?php echo $keykey->slot; ?>" data-price="<?php echo $keykey->price; ?>">
														<ruby style="display: none;">Please select the the Duration</ruby>
													</li>
													<?php foreach ($keykey->sub as $keykeykey): ?>
														<li class="undrli">
															<label for="radio-1"><h6>+<?php echo $keykeykey->slot; ?> Minutes<br></h6> <p> £<?php echo $keykeykey->price; ?></p></label>
															<input type="radio" name="durationsub" value="<?php echo $keykeykey->timeslot_id; ?>" required> 
															<ruby style="display: none;">Please select one Addon</ruby>
														</li>
													<?php endforeach; ?>
												<?php endforeach; ?>

											</ul>
										</div>
									</div>
									<button class="booking-submit-btn" type="submit">
										<!-- <a href="#" class="booking-btn"></a> -->
										Continue
									</button>
								</div>
							</form>
						<?php endforeach; ?>
			<!-- <div class="col-md-4 col-sm-12">
					<div class="booking-clm">
							<div class="user-duration1">
									<h5>Select Duration<ruby>Combo Package 2 </ruby></h5>
									<ul>
											<li>
													<label for="radio-1"><h6>90 Minutes</h6> <p>£70   (personal training)</p></label>
													<input type="radio" name="duration" value="90 Minutes">
											</li>
											<li class="undrli">
													<label for="radio-1"><h6>+60 Minutes<br></h6> <p>£50 (massage) = £120</p></label>
													<input type="radio" name="duration" value="+60 Minutes">
											</li>
											<li class="undrli">
													<label for="radio-1"><h6>+ 90 Mintues</h6><p>£70 (massage) = £140</p></label>
													<input type="radio" name="duration" value="+90 Minutes">
											</li>
											<li class="undrli">
													<label for="radio-1"><h6>+ 120 Minutes</h6><p>£90 (massage) = £160</p></label>
													<input type="radio" name="duration" value="+120 Minutes">
											</li>
									</ul>
									<button class="booking-submit-btn">
									<a href="#" class="booking-btn">Continue</a>
									</button>
							</div>
					</div>
			</div>
			<div class="col-md-4 col-sm-12">
					<div class="booking-clm">
							<div class="user-duration2">
									<h5>Select Duration<ruby>Combo Package 3 </ruby></h5>
									<ul>
											<li>
													<label for="radio-1"><h6>120 Minutes</h6> <p>£70   (personal training)</p></label>
													<input type="radio" name="duration" value="90 Minutes">
											</li>
											<li class="undrli">
													<label for="radio-1"><h6>+60 Minutes<br></h6> <p>£50 (massage) = £140</p></label>
													<input type="radio" name="duration" value="+60 Minutes">
											</li>
											<li class="undrli">
													<label for="radio-1"><h6>+ 90 Mintues</h6><p>£70 (massage) = £160</p></label>
													<input type="radio" name="duration" value="+90 Minutes">
											</li>
											<li class="undrli">
													<label for="radio-1"><h6>+ 120 Minutes</h6><p>£90 (massage) = £180</p></label>
													<input type="radio" name="duration" value="+120 Minutes">
											</li>
									</ul>
							</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
<?php endif ?>
<!-- ***** Booking-sec(End) ***** -->