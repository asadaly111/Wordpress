<?php 
session_start();
require dirname(__FILE__, 6).'/wp-load.php';
// require dirname(__FILE__, 3).'/includes/class_wrapper.php';
global $bokingobj;
$resources = json_decode($bokingobj->allservices(1));
?>
<!-- ***** Massage-packages(Start) ***** -->
<div class="packages">
	<div class="container">
		<div class="row align-items-center">
			
			<?php if ($resources->resources): ?>
				<?php foreach ($resources->resources as $key): ?>
					<div class="col-md-4 col-sm-12">
						<div class="msg-clm1 clmm" style="background: url(<?php echo $key->thumbnail_url; ?>);">
							<h1><?php echo $key->name; ?></h1>
						</div>
						<div class="pkgg-btn">
							<a href="inde.html" class="packg-btn viewpkg" data-id="<?php echo $key->id; ?>" data-serviceName="<?php echo $key->name; ?>">View packages</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- ***** Massage-packages(End) ***** -->