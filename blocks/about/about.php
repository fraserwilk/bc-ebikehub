<?php
/**
 * About Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title             = !empty(get_field( 'title' )) ? get_field( 'title' ) : 'Your title here...';
$freeform           = get_field( 'free_form' );
$button_label       = get_field( 'button_label' );
$video             = get_field( 'video' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.
 
$button_link = get_field('button_link');
if( $button_link ): 
    $button_url = $button_link['url'];
    $button_title = $button_link['title'];
    $button_target = $button_link['target'] ? $button_link['target'] : '_self';
endif;


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'about';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
if ( $background_color || $text_color ) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );
?>

<div class="<?php echo esc_attr( $class_name ); ?> px-4 about" style="<?php echo esc_attr( $style ); ?>">
    <div class="pt-mega container">
      <h2 class="border-title about__title"><?php echo esc_html( $title ); ?></h2>
      <div class="col-lg-6 copy-container">
        <p class="fs-5 mb-4">
            <?php if ( !empty( $freeform ) ) : ?>
                <?php echo wp_kses_post( $freeform ); ?>
            <?php endif; ?>
        </p>
        <?php 
            if ( !empty ($button_label) ) : ?>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-start pt-5">
                <a role="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" <?php echo esc_html( $button_label ); ?> class="btn btn-warning btn-lg px-4 me-sm-3 fw-bold">
                    <?php echo $button_label ?>
                </a>
            <?php endif ?>
            <?php if ( !empty ($button_label_2) ) : ?>
                <button type="button" class="btn btn-outline-highlight btn-lg px-4">Secondary</button>
            <?php endif ?>
            </div>
      </div>
      <?php if ( $video ) : ?>
        <div class="ratio ratio-16x9">
        <iframe width="1280" height="1055" src="https://www.youtube.com/embed/yZX8EaFGT0E" title="Kola Introduction &amp; Features" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        </div>
    <?php endif; ?>
    </div>
  </div>


  