<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-dark fixed-top" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container">

		<!-- eBike branding in the menu -->
		<?php get_template_part( 'global-templates/navbar-branding' ); ?>

		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
		>
			<span class="navbar-toggler-icon"></span>
		</button>


		 <!-- Insert the search form here -->
<!-- 		
			<form role="search" method="get" class="searchform group hidden-sm" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="search-box">
					<button type="button" class="btn-search">
						<img src="https://buildingcommunities.ebikehub.com.au/wp-content/themes/dist/images/icons/search-icon.svg   ">  
					</button>
					
					<input type="text" class="input-search" placeholder="I'm looking for?" value="" name="s" title="Search for:">
				</div>
				
			</form> -->


		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse text-end',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
		<div class="pe-5">
			<button type="button" class="btn btn-yellow"><a href="<?php echo site_url(); ?>" class="menu-btn">Apply Now</a></button>
		</div>
	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->

<!--  transparent navbar on scroll -->
<script>
        const navEl = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY >= 100) {
                navEl.classList.add('navbar-scrolled');
            } else {
                navEl.classList.remove('navbar-scrolled');
            }
        });
    </script>