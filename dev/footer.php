<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */

?>

<footer id="colophon" class="site-footer">


		<section class="firmainfo">
			<h4>Norges brannskole</h4>
			<p>Erling Johannessens vei 1<br>
				9441 Fjelldal<br>
				Telefon:76 91 90 00<br>
				E-post: firmapost@nbsk.no<br>
				Organisasjonsmummer: 974 760 983</p>
		</section>
		<nav class="social-menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_id'        => 'social-menu',
						'container'      => 'ul',
					)
				);
			?>
		</nav>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
