<?php
/**
 * Template Name: Hub Test Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/no-title.php' ) ) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>

<div class="wrapper pt-mega" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">


    <main>
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>eBike Hub</h1>
                        <p>Show happy photo/video of people riding Kola bikes in a park.</p>
                        <!-- Image or video placeholder -->
                    </div>
                    <div class="col-md-6">
                        <h2>The eBike Hub is...</h2>
                        <p>A revolution in transportation: its cutting-edge electric bikes combine sleek Scandinavian design with innovative engineering. Get around effortlessly – reduce congestion and emissions for a sustainable future.</p>
                        <a href="#" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Reduce Transport Costs</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, ipsum ac semper interdum, nisi pede vehicula arcu, et fringilla mi eros.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Efficient Transport</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, ipsum ac semper interdum, nisi pede vehicula arcu, et fringilla mi eros.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Fun to Use</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, ipsum ac semper interdum, nisi pede vehicula arcu, et fringilla mi eros.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Apply now to get access to the fleet of eBikes</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, ipsum ac semper interdum, nisi pede vehicula arcu, et fringilla mi eros.</p>
                        <a href="#" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="insights">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Insights to help you</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, ipsum ac semper interdum, nisi pede vehicula arcu, et fringilla mi eros.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Bluetooth Smart Locks</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, ipsum ac semper interdum, nisi pede vehicula arcu, et fringilla mi eros.</p>
                    </div>
                    <!-- Additional insights can be added here -->
                </div>
            </div>
        </section>
    </main>



</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
