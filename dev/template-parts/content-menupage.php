<?php
/**
 * Template part for displaying page content in custompage.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */
wp_print_styles( array( 'wprig-content' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php wprig_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wprig' ),
				'after'  => '</div>',
			)
		);

		// list all childpages of parentpage(currentpage)
		$children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0' );
			if ( $children) : ?>
    			<ul>
					<?php echo $children; ?>
			    </ul>
		<?php endif;

		/**
		*List page inside page
		*first we get the id of current page, then return all children with Id, then populate a div for each child
		*/

		// Set up the objects needed
		$id = get_the_ID();

		//echo "<script> console.log( $id );</script>";
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));

		// Filter through all pages and find the current children
		$page_children = get_page_children( $id, $all_wp_pages );

		foreach ( $page_children as $post ) {
			setup_postdata( $post ); ?>
			<div class="section-container">
				<h3 class="section-container-title">
					<?php the_title(); ?>
				</h3>
				<?php the_content(); ?>
			</div>
			<?php
		}?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				wprig_edit_post_link();
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular() ) :

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endif;
