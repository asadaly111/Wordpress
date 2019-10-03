<?php
/*
 * Template Name: classified
 */

get_header()
?>

<div class="classified">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
				<aside>

					<div class="widget_search">
						<form role="search" id="search-form">
							<input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="">
							<button type="submit" id="search-submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>

					<div class="widget categories">
						<h4 class="widget-title">All Categories</h4>
						<ul class="categories-list">
							<li>
								<a href="#">
									<i class="fa fa-cutlery"></i>Hotel &amp; Travels <span class="category-counter">(5)</span></a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-sliders"></i>Services <span class="category-counter">(8)</span></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-paw"></i>Pets <span class="category-counter">(2)</span></a> 
							</li>
							<li>
								<a href="#"><i class="fa fa-coffee"></i>Restaurants <span class="category-counter">(3)</span></a> 
							</li>
							<li>
								<a href="#"><i class="fa fa-home"></i>Real Estate <span class="category-counter">(4)</span></a>
							
							</li>
							<li>
								<a href="#"><i class="fa fa-pencil"></i>Jobs <span class="category-counter">(5)</span></a>
							
							</li>
							<li>
								<a href="#"><i class="fa fa-television"></i>Electronics <span class="category-counter">(9)</span></a>
							
							</li>
						</ul>
					</div>
					 
				</aside>
			</div>
			<div class="col-lg-9 col-md-12 col-xs-12 page-content">




				<div class="adds-wrapper">
					<div class="tab-content">
						<div id="grid-view" class="tab-pane fade">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="<?php echo bloginfo('template_url');?>assets/img/featured/img1.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Mobile Phones</a>
											</div>
											<h4><a href="ads-details.html">Apple iPhone X</a></h4>
											<span>Last Updated: 3 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Avenue C, US</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Feb 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> Maria Barlow</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Used</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$200.00</h3>
												<a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img2.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Real Estate</a>
											</div>
											<h4><a href="ads-details.html">Amazing Room for Rent</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Dallas, Washington</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Jan 7, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> John Smith</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Used</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$450.00</h3>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img3.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Electronics</a>
											</div>
											<h4><a href="ads-details.html">Canon SX Powershot D-SLR</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Dallas, Washington</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Mar 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> David Givens</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Used</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$700.00</h3>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img4.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Vehicles</a>
											</div>
											<h4><a href="ads-details.html">BMW 5 Series GT Car</a></h4>
											<span>Last Updated: 5 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Dallas, Washington</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Dec 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> Elon Musk</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> N/A</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$300.00</h3>
												<a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="list-view" class="tab-pane fade active show">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="fa  fa-heart-o"></i>
											</div>
											<a href="#"><img class="img-fluid" src="<?php echo bloginfo('template_url');?>/images/img5.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="fa fa-folder"></i> Apple</a>
											</div>
											<h4><a href="ads-details.html">Apple Macbook Pro 13 Inch</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="fa fa-map-marker"></i>Louis, Missouri, US</a>
												</li>
												<li>
													<a href="#"><i class="fa fa-clock-o"></i> May 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="fa fa-user"></i> Will Ernest</a>
												</li>
												<li>
													<a href="#"><i class="fa fa-briefcase"></i> Brand New</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$450.00</h3>
												<a href="account-myads.html" class="btn-verified float-right"><i class="fa fa-check"></i> Verified Ad</a>
											</div>
										</div>
									</div>
								</div>
								
								
								
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="fa  fa-heart-o"></i>
											</div>
											<a href="#"><img class="img-fluid" src="<?php echo bloginfo('template_url');?>/images/img6.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="fa fa-folder"></i> Apple</a>
											</div>
											<h4><a href="ads-details.html">Apple Macbook Pro 13 Inch</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="fa fa-map-marker"></i>Louis, Missouri, US</a>
												</li>
												<li>
													<a href="#"><i class="fa fa-clock-o"></i> May 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="fa fa-user"></i> Will Ernest</a>
												</li>
												<li>
													<a href="#"><i class="fa fa-briefcase"></i> Brand New</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$450.00</h3>
												<a href="account-myads.html" class="btn-verified float-right"><i class="fa fa-check"></i> Verified Ad</a>
											</div>
										</div>
									</div>
								</div>
								
								
								
							</div>
						</div>
					</div>
				</div>


				<div class="pagination-bar">
					<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link active" href="#">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">3</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</div>
</div>



<?php get_footer()?>










