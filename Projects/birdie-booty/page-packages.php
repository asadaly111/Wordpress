<?php get_header(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" type="text/css" />
<link rel="icon" type="image" sizes="32x32" href="images/logo_03.png">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/slicknav.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="sec-two">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col span_12">
				<div class="content">
					<h1>Select Your Bird Size!</h1>
					<div class="content-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/s1_03.png" class="p-one img-responsive"/> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sec-three">
		<div class="container">
			<div class="row">
				<?php
				global $wpdb, $obj;
				$data = $obj->getRows($wpdb->prefix.'bird_size');
				if ($data):
					foreach ($data as $key): ?>
						<div class="col span_4">
							<div class="sec-two-box-one">
								<img src="<?php echo feature_img($key->image);  ?>" class="p-two" img-responsive/>
								<h5><?php echo $key->name; ?></h5>
								<p><?php echo $key->dsc; ?></p>
								<h6>Starting at <?php echo $key->subtitle; ?></h6>
								<a href="<?php echo site_url('/subscriptions/?size='.$key->id); ?>">SELECT</a>
							</div>
						</div>
					<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<div class="sec-four">
		<div class="container">
			<div class="row">
				<h2>Why pick our box?<br>
					Our box is awesome!<br>
					It’s filled with enough toys to keep your bird busy for a month!<br>
					It’s also at a HUGE savings!<br>
				Both you and your bird will be happy!!! </h2>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>