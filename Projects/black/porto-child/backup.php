<?php get_header() ?> <
? php
global $obj;
wp_reset_postdata();
$id = get_the_ID();
$post = get_post( $id );
$black_age = get_post_meta( $id, 'black_age', true );
$black_city = get_post_meta( $id, 'black_city', true );
$black_ethnicity = get_post_meta( $id, 'black_ethnicity', true );
$black_hair = get_post_meta( $id, 'black_hair', true );
$black_height = get_post_meta( $id, 'black_height', true );
$black_location = get_post_meta( $id, 'black_location', true );
$black_phone = get_post_meta( $id, 'black_phone', true );
$black_rates = get_post_meta( $id, 'black_rates', true );
$black_smoker = get_post_meta( $id, 'black_smoker', true );
$black_state = get_post_meta( $id, 'black_state', true );
$black_travel = get_post_meta( $id, 'black_travel', true );
$black_weight = get_post_meta( $id, 'black_weight', true );
$black_wroking_hours = get_post_meta( $id, 'black_wroking_hours', true );
$black_social_media = get_post_meta( $id, 'black_social_media', true );




global $porto_settings, $porto_layout;
$options = array();
$options[ 'themeConfig' ] = true;
$options[ 'lg' ] = $porto_settings[ 'post-related-cols' ];
if ( $porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar' )
	$options[ 'lg' ]--;
if ( $options[ 'lg' ] < 1 )
	$options[ 'lg' ] = 1;
$options[ 'md' ] = $porto_settings[ 'post-related-cols' ] - 1;
if ( $options[ 'md' ] < 1 )
	$options[ 'md' ] = 1;
$options[ 'sm' ] = $porto_settings[ 'post-related-cols' ] - 2;
if ( $options[ 'sm' ] < 1 )
	$options[ 'sm' ] = 1;
$options = json_encode( $options );
?>
<div id="content" role="main">
	<?php if (have_posts()) : ?>
	<section class="contact-admin-banner">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/cover-bg.png" class="banner" alt="">
		<div class="container text-center">
			<div class="profile-main">
				<div class="row">
					<div class="col-md-8 col-sm-10 col-lg-9 col-xl-9 text-left">
						<div class="left">
							<div class="profile-image">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/profile-img.png" class="img-fluid" alt="">
								<button name="file" class="change-cover" onclick="document.getElementById('upload').click()"><img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/camera.png" class="camera" alt=""></button>
								<input type="file" id="upload" name="file">
							</div>
							<h2>
								<?php echo get_the_title(get_the_ID()); ?>
							</h2>
						</div>
					</div>
					<div class="col-md-4 col-sm-2 col-lg-3 col-xl-3 text-right">
						<div class="right">
							<button name="file" class="change-cover" onclick="document.getElementById('upload').click()"><i class="fa fa-camera"></i> Change Cover Photo</button>
							<input type="file" id="upload" name="file">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="contact-faq-main ">
		<div class="container">
			<div class="contact-faq profile-information-home-owner con-upload con-profile-setting">
				<div class="row">
					<div class="col-md-12">
						<div class="faq-nav">
							<nav>
								<ul class="tabss">
									<li class="active"><a href="javascript:;" data-classname="profile">Profile</a>
									</li>
									<li class=""><a href="javascript:;" data-classname="gallery">Gallery</a>
									</li>
									<li class=""><a href="javascript:;" data-classname="video">Videos</a>
									</li>
									<li class=""><a href="javascript:;" data-classname="reviews">Reviews</a>
									</li>
									<li><a href="javascript:;" data-classname="contact">Contact Admin</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<hr>
				<!--profile information start here-->
				<div class="home-owner-profile-information-main">
					<div class="row profile-album-main">
						<div class="col-md-12 col-xl-3 col-lg-3">
							<div class="home-owner-profile-information-heading">
								<h2>Profile Information </h2>
							</div>
							<br>
							<div class="left">
								<h2>Profile <span>Rating</span><span class="span-2">(2.5/5)</span></h2>
								<div class="stars">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="platinum">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/platinum.png" class="img-fluid" alt="">
									<h2>platinum package</h2>
								</div>
								<div class="platinum">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/bronze.png" class="bronze-image img-fluid" alt="">
									<h2 class="bronze">Bronze Package</h2>
								</div>
								<div class="platinum">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/silver.png" class="img-fluid" alt="">
									<h2 class="silver">Silver Package</h2>
								</div>
								<div class="platinum">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/gold.png" class="img-fluid" alt="">
									<h2 class="gold">gold Package</h2>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-9 col-xl-9">
							<div class="tab-contentss profile-information-right-main current" id="profile">
								<div class="profile-information-right">
									<div class="profile-info">
										<h2 clas="text-left">Personal info</h2>
										<hr>
										<div class="profile-info-inner">

											<div class="row">
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Name</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo get_the_title(get_the_ID()); ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Age</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_age; ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Hair</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_hair; ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Weight</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_weight; ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Height</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_height; ?>
															</h6>
														</div>
													</div>

												</div>
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Rates</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_rates; ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Travel</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo strtoupper($black_travel); ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3 p-r-z">
															<label for=""><i class="fa fa-user"></i>Ethnicity</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_ethnicity; ?>
															</h6>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6 col-xl-3 col-lg-3">
															<label for=""><i class="fa fa-user"></i>Working Hours</label>
														</div>
														<div class="col-md-6 col-sm-6 col-6 col-xl-9 col-lg-9">
															<h6 class="text-center">
																<?php echo $black_wroking_hours; ?>
															</h6>
														</div>
													</div>

												</div>
											</div>










										</div>
									</div>
									<div class="about-yourself">
										<h2 clas="text-left">About yourself</h2>
										<hr>
										<div class="about-yourself-inner">
											<div class="row">
												<div class="col-md-12">
													<p>
														<?php echo get_the_content(); ?>
													</p>
												</div>
											</div>
										</div>
									</div>


									<div class="profile-info">
										<br>
										<h2 clas="text-left">Services</h2>
										<hr>
										<div class="row">
											<div class="col-md-6 p-l-z">
												<div class="right-box-main">
													<h3>Maintenance &amp; Repairs</h3>
													<ul>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Maintenance </li>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Cleaning </li>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Algae / Weed Control </li>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Repairs</li>
														<li><i class="fa fa-angle-right"></i> Farm Pond - Lake Upgrades &amp;s; Add-ons</li>
													</ul>
												</div>
											</div>
											<div class="col-md-6 p-r-z">
												<div class="right-box-main">
													<h3>Maintenance &amp; Repairs</h3>
													<ul>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Maintenance </li>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Cleaning </li>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Algae / Weed Control </li>
														<li><i class="fa fa-angle-right"></i>Farm Pond - Lake Repairs</li>
														<li><i class="fa fa-angle-right"></i> Farm Pond - Lake Upgrades &amp;s; Add-ons</li>
													</ul>
												</div>
											</div>
										</div>
									</div>



									<div class="address-details">
										<h2 clas="text-left">Address Details</h2>
										<hr>
										<div class="address-details-inner">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fa fa-map-marker-alt"></i>Billing Address Line 1:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>
														<?php echo $black_location; ?>
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fa fa-info-circle"></i>State:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>
														<?php echo $black_state; ?>
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fa fa-home"></i>City:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>
														<?php echo $black_city; ?>
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fa fa-info-circle"></i>Smoker:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>
														<?php echo strtoupper($black_smoker); ?>
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fa fa-globe"></i>Country:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>Australia</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="contact-details">
										<h2 clas="text-left">Contact Details</h2>
										<hr>
										<div class="contact-details-inner">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fas fa-envelope"></i>Email Address:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>
														<?php echo $obj->get_user_email_by_id($post->post_author); ?>
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6  col-xl-3 col-lg-3">
													<label for=""><i class="fa fa-mobile-alt"></i>Phone – Mobile:</label>
												</div>
												<div class="col-md-6 col-sm-6 col-6  col-xl-9 col-lg-9">
													<h6>
														<?php echo $black_phone; ?>
													</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Second tab -->
							<div class="tab-contentss main con-contact-admin-form-main" id="contact">
								<div class="con-contact-admin-form">
									<div class="home-contractor-directory-heading">
										<h2>Message </h2>
									</div>
									<div class="messaging">
										<div class="inbox_msg">

											<div class="mesgs">
												<div class="msg_history">
													<div class="incoming_msg">
														<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
														<div class="received_msg">
															<div class="received_withd_msg">
																<p>Test which is a new approach to have all solutions
																</p>
																<span class="time_date"> 11:01 AM    |    June 9</span>
															</div>
														</div>
													</div>
													<div class="outgoing_msg">
														<div class="sent_msg">
															<p>Test which is a new approach to have all solutions
															</p>
															<span class="time_date"> 11:01 AM    |    June 9</span> </div>
													</div>
													<div class="incoming_msg">
														<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
														<div class="received_msg">
															<div class="received_withd_msg">
																<p>Test, which is a new approach to have</p>
																<span class="time_date"> 11:01 AM    |    Yesterday</span>
															</div>
														</div>
													</div>
													<div class="outgoing_msg">
														<div class="sent_msg">
															<p>Apollo University, Delhi, India Test</p>
															<span class="time_date"> 11:01 AM    |    Today</span> </div>
													</div>
													<div class="incoming_msg">
														<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
														<div class="received_msg">
															<div class="received_withd_msg">
																<p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p>
																<span class="time_date"> 11:01 AM    |    Today</span>
															</div>
														</div>
													</div>
												</div>
												<div class="type_msg">
													<div class="input_msg_write">
														<input type="text" class="write_msg" placeholder="Type a message"/>
														<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
													</div>
												</div>
											</div>
										</div>


										 

									</div>
								</div>

							</div>
						</div>
						<div class="tab-contentss" id="video">
							<div class="album-main">
								<div class="col-md-12 ">
									<div class="row">
										<div class="album">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/album-image.png" alt="">
											<h2>Videos</h2>
										</div>
									</div>
								</div>
								<hr>
								<div class="album-content-main">
									<div class="album-box-main">
										<div class="row">


											<?php
											$datainarray12 = get_post_meta( get_the_ID(), '_videos', true );
											if ( $datainarray12 ):
												foreach ( $datainarray12 as $key2 => $value2 ): ?>
											<div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-12">
												<div class="album-box">
													<a href="">
														<?php 
                                                                       $get2 = wp_get_attachment_url($value2);
                                                                       echo '<video width="100%" height="240" controls>
                                                                       <source src="'.$get2.'" type="video/mp4">
                                                                       Your browser does not support the video tag.
                                                                       </video>';
                                                                       ?>
													</a>
													<h6>Pool Renovation</h6>
													<h5>Posted: 12-08-2015</h5>
													<h4><i class="fa fa-eye"></i> 45 Views</h4>
												</div>
											</div>
											<?php endforeach;
                                                    endif ?>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-contentss" id="gallery">
							<div class="album-main">
								<div class="col-md-12 ">
									<div class="row">
										<div class="album">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/album-image.png" alt="">
											<h2>Gallery</h2>
										</div>
									</div>
								</div>
								<hr>
								<div class="album-content-main">
									<div class="album-box-main">
										<div class="row">
											<?php
											$datainarray = get_post_meta( get_the_ID(), '_gallery', true );
											?>
											<?php
											if ( $datainarray ) {
												foreach ( $datainarray as $key => $value ): $thumbnail = wp_get_attachment_image_src( $value, 'full', true );
												?>
											<div class="col-md-6 col-xl-6 col-lg-6 col-sm-12 col-12">
												<div class="album-box">
													<a href="#"> <img src="<?php echo $thumbnail[0]; ?>" class="img-fluid" alt=""></a>
													<h6>Pool Renovation</h6>
													<h5>Posted: 12-08-2015</h5>
													<h4><i class="fa fa-eye"></i> 45 Views</h4>
												</div>
											</div>
											<?php endforeach; } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-contentss" id="reviews">
							<div class="album-main">
								<div class="col-md-12 ">
									<div class="row">
										<div class="album">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/black/images/album-image.png" alt="">
											<h2>Reviews</h2>
										</div>
									</div>
								</div>
								<hr>


								<div class="user-review-right">
									<div class="row">
										<div class="col-md-6 col-xl-6 col-lg-6 col-6 col-sm-6 col-6">
											<h4>Alicia Alice</h4>
											<h6>Posted: 05-06-2017</h6>
										</div>
										<div class="col-md-6 col-md-6 col-xl-6 col-lg-6 col-6 col-sm-6 col-6 text-right">
											<h5>Rating</h5>
											<div class="star">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
										</div>
									</div>
									<p class="p1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
									</p>
									<p class="p2">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--profile information end here-->
			</div>
		</div>
</div>
</section> 
<?php endif ;
?> </div>

<?php get_footer()
?>

<script>
	jQuery( document ).ready( function () {
		jQuery( 'ul.tabss li a' ).click( function () {
			var tab_id = jQuery( this ).data( 'classname' );
			console.log( tab_id );
			jQuery( 'ul.tabss li' ).removeClass( 'active' );
			jQuery( '.tab-contentss' ).removeClass( 'current' );
			jQuery( this ).closest( 'li' ).addClass( 'active' );
			jQuery( "#" + tab_id ).addClass( 'current' );
		} )
	} )
</script>