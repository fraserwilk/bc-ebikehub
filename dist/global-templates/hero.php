<?php
/**
 * Hero setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (  is_active_sidebar( 'herocanvas' ) ) :
	?>

	<div class="wrapper" id="wrapper-hero">

		<?php
		// hero canvas widget
		get_template_part( 'sidebar-templates/sidebar', 'herocanvas' );
		?>

	</div>

	<?php
endif;
