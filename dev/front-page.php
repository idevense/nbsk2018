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
		<div class="postimage">
			<div class="postimage-content">
				<h1> Something something dark side </h1>
			</div>
		</div>
	<div class="frontpage_sections">
		<div class="section section_left">
			<a href="<?php echo esc_url( get_url_of_page_id() ); ?>"> <?php echo get_txt_of_page_id(); ?></a>
		</div>
		<div class="section section_right">
			<a href="#"> Passende Navn til Menysamling her </a>
		</div>
	</div>

	<?php
	while ( have_posts() ) :
		the_post();
			get_template_part( 'template-parts/content', get_post_type() );
	endwhile; // End of the loop.
	?>
		<?php the_posts_navigation(); ?>

	<div class="excerptswrap">
		<div class="excerptwrap-heading">
			<h3>Aktuelt fra nbsk</h3>
		</div>
		<div class="excerpts">
		<?php
			$temp     = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query( 'posts_per_page=3 &paged=' . $paged );
		while ( $wp_query->have_posts() ) :
				$wp_query->the_post();
			?>
			<section class="excerpt-section">
					<h4><a class="posted-title" href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h4>
					<div class="posted-on">Publisert <?php the_time( 'F j, Y' ); ?> </div>
					<?php the_excerpt(); ?>
				</section>
			<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>
		<nav role="navigation">
			<h2 class="screen-reader-text">Post Navigation</h2>
		<div class="excerpts-footer excerpt-section" >
			<a class="button" href="<?php get_permalink( get_option( 'page_for_posts' ) ); ?>"> Nyhetsarkiv >> </a>
		</div>
	</nav>
	</div>
	</div><!-- .excerptswrap -->
	</main><!-- #primary -->

<?php
get_footer();
