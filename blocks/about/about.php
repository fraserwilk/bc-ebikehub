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

            <?php if ($button_1_link && $button_1_label) : ?>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-start">
                    <a role="button" href="<?php echo esc_url($button_1_link['url']); ?>" target="<?php echo esc_attr($button_1_link['target'] ?? '_self'); ?>" class="btn btn-warning btn-lg px-4 me-sm-3 fw-bold">
                        <?php echo esc_html($button_1_label); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($button_2_link && $button_2_label) : ?>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-start">
                    <a role="button" href="<?php echo esc_url($button_2_link['url']); ?>" target="<?php echo esc_attr($button_2_link['target'] ?? '_self'); ?>" class="btn btn-outline-dark btn-lg px-4 me-sm-3">
                        <?php echo esc_html($button_2_label); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($video_link) : ?>
        <div class="col-md-8 offset-md-2">
        <div class="ratio ratio-16x9">
            <div id="player"></div>
        </div>

        <script>
            // Load YouTube IFrame Player API asynchronously
            var tag = document.createElement('script');
            tag.src = 'https://www.youtube.com/iframe_api';
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // Function called when API is ready
            function onYouTubeIframeAPIReady() {
                // Create YouTube player
                var player = new YT.Player('player', {
                    height: '360',
                    width: '640',
                    videoId: '<?php echo $video_link; ?>',
                    playerVars: {
                        // Add any additional player parameters here
                    }
                });
            }
        </script>
        </div>
    <?php endif; ?>
</div>
