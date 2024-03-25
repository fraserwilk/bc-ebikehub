<?php
/**
 * About Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_field('title') ?: 'Your title here...';
$content = get_field('content');
$video = get_field('video');
$background_color = get_field('background_color'); // ACF's color picker.
$text_color = get_field('text_color'); // ACF's color picker.
$button_1_label = get_field('button_1_label');
$button_2_label = get_field('button_2_label');

$button_1_link = get_field('button_1_link');
$button_2_link = get_field('button_2_link');

$video_link = '';

if (!empty($video)) {
    $video_link = $video['url'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'about';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
if ($background_color || $text_color) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array();
if ($background_color) {
    $styles[] = 'background-color: ' . $background_color;
}
if ($text_color) {
    $styles[] = 'color: ' . $text_color;
}
$style = implode('; ', $styles);
?>

<div class="<?php echo esc_attr($class_name); ?> px-4" style="<?php echo esc_attr($style); ?>">
    <div class="pt-mega container">
        <h2 class="border-title about__title"><?php echo esc_html($title); ?></h2>
        <div class="col copy-container py-5">
            <div class="fs-5 mb-4">
                <?php if (!empty($content)) : ?>
                    <?php echo wp_kses_post($content); ?>
                <?php endif; ?>
            </div>



            <?php if (($button_1_link && $button_1_label) || ($button_2_link && $button_2_label)) : ?>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-start">
                    <?php if ($button_1_link && $button_1_label) : ?>
                        <a role="button" href="<?php echo esc_url($button_1_link['url']); ?>" target="<?php echo esc_attr($button_1_link['target'] ?? '_self'); ?>" class="btn btn-warning btn-lg px-4 me-sm-3 fw-bold">
                            <?php echo esc_html($button_1_label); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($button_2_link && $button_2_label) : ?>
                        <a role="button" href="<?php echo esc_url($button_2_link['url']); ?>" target="<?php echo esc_attr($button_2_link['target'] ?? '_self'); ?>" class="btn btn-outline-dark btn-lg px-4 me-sm-3">
                            <?php echo esc_html($button_2_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php if ($video_link) :  ?>
        <div class="col-md-8 offset-md-2">
            <div>
                <div id="player">
                    <iframe width="480" height="848" src="<?php echo esc_url( $video_link ); ?>" title="Kola Introduction and Features" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
            </div>

        
        </div>
    <?php endif; ?>
  
</div>
