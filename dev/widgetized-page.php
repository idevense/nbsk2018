<?php
/**
 * Template Name: Widgetized Page Template
 *
 * When active, by adding the heading above and providing a custom name
 * this template becomes available in a drop-down panel in the editor.
 *
 * Filename can be anything.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use
 *
 * @package wprig
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the component stylesheet for the content.
			 * This call runs only once on index and archive pages.
			 * At some point, override functionality should be built in similar to the template part below.
			 */
			wp_print_styles( array( 'wprig-content' ) ); // Note: If this was already done it will be skipped.

			get_template_part( 'template-parts/content', 'custompage' );

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
if ( ! is_active_sidebar( 'page-widget-1' ) ) {
	get_footer();
	return;
}
?>

<?php wp_print_styles( array( 'wprig-sidebar', 'wprig-widgets' ) ); ?>
<div id="widget-sidebar-1" class="pagewidget widget-area">
	<?php dynamic_sidebar( 'page-widget-1' ); ?>
</div><!-- #secondary -->

<?php
get_footer(); ?>

