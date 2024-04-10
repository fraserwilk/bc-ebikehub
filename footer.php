<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

<div class="container">
	<div class="site-footer__top">
		<div class="site-footer__top--wrapper">
			<div class="content"></div>
		</div>

	</div>
	<div class="site-footer__middle">
		<div class="site-footer__middle--wrapper">
			<div class="site-footer__middle--column">
				<div class="content">
					<h4>About the site</h4>
					<ul>
						<li><a href="https://buildingcommunities.ebikehub.com.au/terms-and-conditions-of-use/" target="_blank">Terms</a></li>
						<li><a href="https://buildingcommunities.ebikehub.com.au/privacy-policy/" target="_blank">Privacy Policy</a></li>
						<li><a href="https://buildingcommunities.ebikehub.com.au/faqs/" target="_blank">FAQs</a></li>
					</ul>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
			<div class="site-footer__middle--column">
				<div class="content">
					<h4>Related websites</h4>
					<ul>
						<li>
							<a href="https://www.buildingcommunities.org.au/" target="_blank">Building Communities</a>
						</li>
						<li>
							<a href="https://www.goodcycles.org.au/" target="_blank">Good Cycles</a>
						</li>
						<li>
							<a href="https://ridekola.com.au/" target="_blank">Ride Kola</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="site-footer__middle--column">
				<div class="content">
					<a href="<?php echo site_url(); ?>" class="site-footer__logo"><img src="https://buildingcommunities.ebikehub.com.au/wp-content/uploads/2024/04/logo-36x98-1.png" class="attachment-full size-full" alt="logo" decoding="async" loading="lazy"></a>
				</div>
			</div>

		</div>	
	</div>
	<div class="site-footer__bottom">
		<?php understrap_site_info(); ?>
	</div>
</div>







						

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</main><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

