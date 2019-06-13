<?php
/**
 * coursecode taxonomy page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
		$courses = get_queried_object();
		$desc = term_description( $courses->term_id, 'coursecode' );
		//var_dump( $courses );

		$args = array(
			'post_type' 		=> 'course',
			'tax_query'	=> array(
				array(
					'taxonomy'	=> 'coursecode',
					'field'		=> 'term_id',
					'terms'		=> $courses->term_id
				),
			),
		);

		$query = new WP_Query( $args );
?>
		<h1><?php echo $courses->name;?> </h1>
		<?php echo $desc;?>
		<?php if ( $query->have_posts() ) : ?>
			<table class="kurstabell" style="text-align: left;">
				<thead>
					<tr>
						<th>Kursnavn</th>
						<th>Kurssted</th>
						<th>Kursstart</th>
						<th>Kursslutt</th>
						<th>Søknadsfrist</th>
					</tr>
				</thead>
			<tbody>
		<?php while( $query->have_posts() ) : $query->the_post();	?>
			<tr>
				<td><a href="<?php echo esc_attr( get_post_meta( get_the_ID(), 'url', true ) ); ?>"><?php the_title()?></a></td>
				<td><?php echo esc_attr( get_post_meta( get_the_ID(), 'sted', true ) ); ?></td>
				<td><?php echo esc_attr( get_post_meta( get_the_ID(), 'start', true ) ); ?></td>
				<td><?php echo esc_attr( get_post_meta( get_the_ID(), 'slutt', true ) ); ?></td>
				<td><?php echo esc_attr( get_post_meta( get_the_ID(), 'frist', true ) ); ?></td>
			</tr>
		<?php endwhile; ?>
			</tbody>
			</table>
		<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Sorry!!' ); ?></p>
		<?php endif; ?>
	</main><!-- #primary -->

<?php

get_footer();
