<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package actonvideo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
       <meta name="google-site-verification" content="tajZ4IT022XEWI1-_bKIFIrr-3A-uhxKt5pX1jjAw24" />
      <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="shortcut icon" type="image/x-icon" href="http://www.ayna.ca/wp-content/uploads/2017/07/favicon1.png">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/owl/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo THEME; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo THEME; ?>vendor/fontawesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo THEME; ?>css/style.css">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>




<header class="header">

<button class="menu-btn c-hamburger c-hamburger--htx menu-btnn visible-xs">
  <span>toggle menu</span>
</button>



<form role="search" action="<?php echo site_url('/'); ?>" method="get">
    <div class="search">
        <a href="#" class="closebtn"><i class="fa fa-times" aria-hidden="true"></i></a>
        <input name="s" type="text" placeholder="Start Typing...">
    </div>
</form>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="top">
                        <ul>
                            <?php
                            $primaryMenu = array(
                            'theme_location'  => 'menu-111',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => false,
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => 'TopMenu',
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
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
    <div class  ="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo THEME; ?>images/logo.png" alt=""></a>  
                </div>              
                <div class="col-md-9">
                    <nav class="social">
             

                    <ul>  
                        <?php if (get_option('linkedin_url')): ?>
                        <li><a href="<?php echo get_option('linkedin_url') ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <?php endif ?>
                        <?php if (get_option('twitter_url')): ?>
                        <li><a href="<?php echo get_option('twitter_url') ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <?php endif ?>
                    </ul>


                    </nav>
                    <nav class="menu">
                        <ul>
                            <?php
                            $primaryMenu = array(
                            'theme_location'  => 'menu-11',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => false,
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
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
                            <li class="searchbtn"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>












    </div>
</header>