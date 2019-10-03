<?php get_header(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" type="text/css" />
<link rel="icon" type="image" sizes="32x32" href="images/logo_03.png">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/slicknav.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<section class="about">
	<div class="sec-abt-two">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-md-12 col span_12">
					<div class="content">
						<h1>SELECT A 6 OR 12 MONTH PLAN TO <br>
						GET A FREE EXTRA TOY IN EVERY <?php echo get_size_id($_GET['size']); ?></h1>
						<div class="content-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/s1_03.png" class="p-one img-responsive"/> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sec-abt-three">
		<div class="container">
			<div class="row">
				<?php
				global $wpdb, $obj;
				$data = $obj->getRows($wpdb->prefix.'bird_subscriptions', ['where' =>['size' => $_GET['size'] ] ]);
				if ($data):
				foreach ($data as $key): ?>
				<a href="<?php echo site_url('/checkout/?size='.$_GET['size'].'&subscription='.$key->id); ?>">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-6 col span_4">
						<div class="sec-abt-two-box-one">
							<img src="<?php echo feature_img($key->image);  ?>" class="p-two img-responsive"/>
							<p><?php echo $key->name; ?><br>
							<?php echo $key->dsc; ?></p>
							<?php if (!empty($key->extra)): ?>
							<p class="extra"><?php echo $key->extra; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</a>
				<?php endforeach;
				endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--sec two end-->
	<div class="sec-four">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Why pick our box?</h2>
					<h2>Our box is awesome!</h2>
					<h2>It’s filled with enough toys to keep your bird busy for a month!</h2>
					<h2>It’s also at a HUGE savings!</h2>
					<h2>Both you and your bird will be happy!!! </h2>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>