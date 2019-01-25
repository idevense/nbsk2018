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


		<div class="footer-firmainfo">
			<p>
			<strong>Norges brannskole</strong><br><p>
				<p>
				Erling Johannessens vei 1<br>
				9441 Fjelldal<br>
				Organisasjonsmummer: 974 760 983</p>
				<i class="fas fa-map-marker"></i>
				<a href="http://sau.no">Finn oss på kartet</a><br>
				<i class="fas fa-phone"></i>
				<a href="tel:76919000">Telefon:769 19 000</a><br>
				<i class="fas fa-envelope"></i>
				<a href="mailto:firmapost@nbsk.no">Send oss en e-post</a><br>

		</div>

		<nav id="footer-section-menu" class="footer-section-menu" role="navigation">
			<p><strong>Menyoverskrift</strong></p>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'depth'          => '1',
					)
				);
			?>
		</nav>

		<nav id="footer-social-menu" class="footer-social-menu" role="navigation">
			<p><strong>Følg oss</strong></p>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'depth'          => '1',
					/*	'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',*/
					)
				);
			?>
		</nav>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
