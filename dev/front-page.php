<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wprig
 */

get_header();

/*
* Include the component stylesheet for the content.
* This call runs only once on index and archive pages.
* At some point, override functionality should be built in similar to the template part below.
*/
wp_print_styles( array( 'wprig-content', 'wprig-front-page' ) ); // Note: If this was already done it will be skipped.

?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
		<?php the_posts_navigation(); ?>

	<div class="excerptwrap">
	<div class="excerptwrap-heading">
		<h4>Aktuelt fra nbsk</h4>
	</div>
	<?php // Display blog posts on any page @ https://m0n.co/l
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('posts_per_page=3' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<section class="excerpt-section">
		<h3><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
		</section>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>
		<div >
			<a class="button" href="#"> Nyhetsarkiv </a>
	</div>
	</div>

	</main><!-- #primary -->

<?php
get_footer();
