<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>



	<?php
/* 	if ( ! is_front_page() ) {
		the_title(
			'<header class="entry-header"><h1 class="entry-title">',
			'</h1></header><!-- .entry-header -->'
		);
	} */

	// echo get_the_post_thumbnail( $post->ID, 'large' );
	?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="entry-content">
		

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</div><!-- #post-<?php the_ID(); ?> -->
