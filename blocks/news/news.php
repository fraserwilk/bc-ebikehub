<?php
/**
 * News Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$news_sub_title = get_field('news_sub_title') ?: 'Your title here...';
$news_title = get_field('news_title') ?: 'Your title here...';
$news_intro = get_field('news_intro');
$news_image = get_field('news_image');
$news_background_color = get_field('news_background_color'); // ACF's color picker.
// $text_color = get_field('text_color'); // ACF's color picker.



// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'about';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
if ($news_background_color || $text_color) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array();
if ($news_background_color) {
    $styles[] = 'background-color: ' . $news_background_color;
}
// if ($text_color) {
//    $styles[] = 'color: ' . $text_color;
// }
$style = implode('; ', $styles);
?>

<div class="<?php echo esc_attr($class_name); ?> px-4" style="<?php echo esc_attr($style); ?>">
    <div class="pt-mega container">
        <div class=""><?php echo esc_html($news_sub_title); ?></div>
        <h2 class="border-title"><?php echo esc_html($news_title); ?></h2>
        <div class="col copy-container py-5">
            <div class="fs-5 mb-4">
                <?php if (!empty($news_intro)) : ?>
                    <?php echo wp_kses_post($news_intro); ?>
                <?php endif; ?>
            </div>

            
        </div>
    </div>

    <?php if ($news_image) : ?>
        <div class="col-md-3">
        <?php 
            $size = 'large'; // (thumbnail, medium, large, full or custom size)
            if( $news_image ) {
                echo wp_get_attachment_image( $news_image, $size );
            }
            ?>
        </div>
    <?php endif; ?>

    <?php

// Check rows exists.
if( have_rows('news_articles') ):

    // Loop through rows.
    while( have_rows('news_articles') ) : the_row();

        // Load sub field value.
        $sub_value = get_sub_field('heading');
        // Do something, but make sure you escape the value if outputting directly...
        echo esc_html( $sub_value );
    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>
</div>
