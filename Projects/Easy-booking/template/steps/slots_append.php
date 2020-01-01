<?php 
session_start();
require dirname(__FILE__, 6).'/wp-load.php';

$_SESSION['formdata']['date'] = $_GET['date'];

global $bokingobj;
$slots = json_decode($bokingobj->availabilityofslots(6,$_SESSION['formdata']['slot_Id'], $_GET['date'], 1) );
// pr($slots->slots->time);
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
										<span class="timeslot-time"><?php echo $key->starttime; ?></span>
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




			