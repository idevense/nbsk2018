<?php
/**
 * Template Name: Course Template
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
		$tmp = get_queried_object();
		//var_dump( $tmp );

			$courses = get_terms( array(
				'taxonomy' => 'coursecode',
				'orderby' => 'id',
				'order' => 'ASC',
				'hide_empty' => false));

			$taxonomies = get_terms( array(
				'taxonomy' => 'fagfelt',
				'parent' => '0',
				'hide_empty' => false));

			if ( !empty($taxonomies) ) :
				$output = '<ul>';
				foreach( $taxonomies as $category ) {
						$output.= '<li><a href="'. esc_url( get_term_link ( $category ) ) .'"</a>' . esc_attr( $category->name ) . '</li>';
						}
				$output.='</ul>';
				echo $output;
			endif;

			if ( !empty($courses) ) :
				$output = '<div>';
				foreach( $courses as $course ) {
					$output.=	'<div class="coursecontainer">
									<a href="' . esc_url( get_term_link ( $course ) ) .'"/a>' . esc_attr( $course->name ) . '</div>';
				}
				$output.= '</div>';
				echo $output;
				endif;
		?>
	</main><!-- #primary -->

<?php

get_footer();
