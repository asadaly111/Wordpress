<?php
   /**
   * Template Name: Blogs
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
   get_header('custom'); ?>
   
<div class="clearfix"></div>

<section class="main">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="sliderblog">
               
              
               <?php
            $slidermain = new WP_Query(
               array(
                  'post_type' => 'post',
                   'tag_slug__in' => 'slidermain',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  )
               );
               ?>
               <?php while ($slidermain->have_posts()) : $slidermain->the_post(); ?>
               <?php get_template_part( 'template-parts/content-mainslider', get_post_format() );
               ?>
               <?php endwhile; ?>
               <?php wp_reset_postdata(); ?>



            </div>
         </div>
         <div class="col-md-4">
            <ul class="table-intro-posts">


               <?php
               $wp_query = new WP_Query();
               $wp_query->query(array(
               'post_type'=>'post',   // Post type name here
               'tag_slug__in' => 'sliderright',
               'posts_per_page' => 2   // visible post on every page
               ));
               while($wp_query->have_posts() ):
               $wp_query->the_post();
               ?>
               <?php get_template_part( 'template-parts/content-slideright', get_post_format() );
               ?>
               <?php endwhile; ?>
               <?php wp_reset_postdata(); ?>

            </ul>
         </div>
      </div>
   </div>
</section>
<section class="favourite">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="heading-blog">
               <h2 class="title">
                  favourite Posts
               </h2>
            </div>
            <div class="favpost">


<?php
$q = new WP_Query(
   array(
     'post_type' => array('post'),
     'post_status' => array('publish'),
     'category_name' => 'favourite',
     'orderby' => 'date',
     'order' => 'DESC',
     )
   );
   ?>
   
<?php while ($q->have_posts()) : $q->the_post(); ?>
   <?php get_template_part( 'template-parts/content-fav', get_post_format() ); ?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>






               
            </div>
         </div>
      </div>
   </div>
</section>
<section class="recentpost">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <!--Posts  -->
           

<?php
$wp_query = new WP_Query();
$wp_query->query(array(
'post_type'=>'post',   // Post type name here
'posts_per_page' => 6   // visible post on every page
));
while($wp_query->have_posts() ):
$wp_query->the_post();
?>
<?php get_template_part( 'template-parts/content', get_post_format() );
?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>


         
			<a href="#" class="loadmore"><i class="fa fa-refresh" aria-hidden="true"></i> Load More</a>

         </div><!--Posts ends here -->
         <div class="col-md-4 sidebar">
            <!--sidebar  -->
            <div class="posts">
               <h3> Newsletter</h3>
               <p>Enter your email address to subscribe to this blog and receive notifications of new posts by email.</p>
               <form action="">
                  <input type="text" placeholder="Email Address...">
                  <input type="submit" value="Submit">
               </form>
            </div>
            <div class="posts">
               <h3> CATEGORIES</h3>
               <ul class="menu">
                  <li><a href="#">Category 1</a></li>
                  <li><a href="#">Category 1</a></li>
                  <li><a href="#">Category 1</a></li>
                  <li><a href="#">Category 1</a></li>
                  <li><a href="#">Category 1</a></li>
                  <li><a href="#">Category 1</a></li>
               </ul>
            </div>
            <div class="posts">
               <h3> Tag Clouds</h3>
               <ul class="tags">
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
                  <li><a href="#">Demo tag</a></li>
               </ul>
            </div>
         </div>
         <!--sidebar ends here  -->
      </div>
   </div>
</section>
<?php get_footer(); ?>