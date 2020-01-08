<?php 
session_start();
require dirname(__FILE__, 6).'/wp-load.php';

if (isset($_GET['date'])){
    $_SESSION['formdata']['date'] = $_GET['date'];
}else{
    $_SESSION['formdata']['date'] = date("Y-m-d");
}

global $bokingobj;
// pr($slots->slots->time);
// availabilityofslots($resource,$slot,$date,$subserviceslots)
?>



<!-- ***** Header-sec(End) ***** -->
<?php if ($_SESSION['formdata']['serviceId'] != 49):
	$slots = json_decode($bokingobj->availabilityofslots(6,$_SESSION['formdata']['slot_Id'], $_GET['date'], ['']) );
?>

<?php if ($slots->slots->time): ?>
	<form action="#" method="POST" class="slotsend">
		<div class="timeslot-bottom-main">
			<div class="container">
				<div class="row">
					<h5><?php echo get_day($_SESSION['formdata']['date']).' '.get_date($_SESSION['formdata']['date']); ?></h5>
					<div class="timeslot-bottom">
						<div class="responsive_1">
							<?php $i =1; foreach ($slots->slots->time as $key): ?>
							<div>
								<div class="timeslot_bottom <?php echo ($key->status != 'available')? 'booked':''; ?>">
									<label for="timeslot-radio<?php echo $i; ?>">
										<span class="timeslot-time"><?php echo timeto12($key->starttime); ?></span>
										<span class="timeslot-status"><?php echo $key->status; ?></span>
									</label>
									<?php if ($key->status == 'available'): ?>
										<input type="radio" id="timeslot-radio<?php echo $i; ?>" name="timeslot" value="<?php echo $key->starttime; ?>">
									<?php endif ?>
								</div>
							</div>
							<?php  $i++; endforeach; ?>
						<!-- <div>
							<div class="timeslot_bottom booked">
								<label for="timeslot-radio">
									<span class="timeslot-time">15:00</span>
									<span class="timeslot-status">Sold Out</span>
								</label>
								<input type="radio" id="timeslot-radio" disabled name="timeslot" value="booked">
							</div>
						</div>
					-->
				</div>
			</div>
		</div>
	</div>
</div> <!-- bottom end -->
</form>
<?php else:?>
	<h2 style="text-align: center;"><?php echo $slots->message; ?></h2>
<?php endif; ?>



<?php else: 
	
		$slots = json_decode($bokingobj->availabilityofslots(6,$_SESSION['formdata']['slot_Id'], $_GET['date'], [$_SESSION['formdata']['slotsub_Id']]) ); ?>
		<?php if ($slots->slots->time): ?>
			<form action="#" method="POST" class="slotsend">
				<div class="timeslot-bottom-main">
					<div class="container">
						<div class="row">
							<h5><?php echo get_day($_SESSION['formdata']['date']).' '.get_date($_SESSION['formdata']['date']); ?></h5>
							<div class="timeslot-bottom">
								<div class="responsive_1">
									<?php $i =1; foreach ($slots->slots->time as $key): ?>
									<div>
										<div class="timeslot_bottom <?php echo ($key->status != 'available')? 'booked':''; ?>">
											<label for="timeslot-radio<?php echo $i; ?>">
												<span class="timeslot-time"><?php echo timeto12($key->starttime); ?></span>
												<span class="timeslot-status"><?php echo $key->status; ?></span>
											</label>
											<?php if ($key->status == 'available'): ?>
												<input type="radio" id="timeslot-radio<?php echo $i; ?>" name="timeslot" value="<?php echo $key->starttime; ?>">
											<?php endif ?>
										</div>
									</div>
									<?php  $i++; endforeach; ?>
								<!-- <div>
									<div class="timeslot_bottom booked">
										<label for="timeslot-radio">
											<span class="timeslot-time">15:00</span>
											<span class="timeslot-status">Sold Out</span>
										</label>
										<input type="radio" id="timeslot-radio" disabled name="timeslot" value="booked">
									</div>
								</div>
							-->
						</div>
					</div>
				</div>
			</div>
		</div> <!-- bottom end -->
		</form>
		<?php else:?>
			<h2 style="text-align: center;"><?php echo $slots->message; ?></h2>
		<?php endif; ?>


<?php endif; ?>





