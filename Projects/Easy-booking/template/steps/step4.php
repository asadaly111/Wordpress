<?php
session_start();
require dirname(__FILE__, 6).'/wp-load.php';
$_SESSION['formdata']['slot_Id'] = $_GET['duration'];
$_SESSION['formdata']['durationTime'] = $_GET['durationTime'];
$_SESSION['formdata']['price'] = $_GET['price'];
$_SESSION['step4_url'] = $_SERVER['REQUEST_URI'];
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
					<a href="javascript:;" data-url="<?php echo $_SESSION['step3_url']; ?>" class="stepback"><i class="fa fa-arrow-left"></i></a>
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
			</div>
		</div>
	</div>
</div>
<div class="timeslot-top-main">
	<div class="container">
		<div class="row">
			<div class="timeslot-top">
				<div class="responsive">
					<?php
					$date = date('Y-m-d');
					$end = date('Y-m-d', strtotime($date. ' + 30 days'));
					$distinct = array();
					while(strtotime($date) <= strtotime($end)) {
						$month = date('F', strtotime($date));
						$mothshow = $month;
						if (in_array($month, $distinct)) {
							$mothshow = '';
						}
						$distinct[] = $month;
						$day_num = date('d', strtotime($date));
						$fulldate = date('Y-m-d', strtotime($date));
						$day_name = date('l', strtotime($date));
						$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
						echo '
						<div>
						<span for="'.$fulldate.'" class="timeslot-month active">'.$mothshow.'</span>
						<label for="'.$fulldate.'" class="timeslot-date active">'.$day_num.'</label>
						<label for="'.$fulldate.'" class="timeslot-day active">'.$day_name.'</label>
						<input id="'.$fulldate.'" type="radio" name="date_select" value="'.$fulldate.'">
						</div>
						';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div> <!-- top end -->
<div id="slotsappend"></div>