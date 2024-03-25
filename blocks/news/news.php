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
$class_name = 'news';
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



<div class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="pt-mega container">
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                    <div class="news-sub-title"><?php echo esc_html($news_sub_title); ?></div>
                    <h2 class="news-title"><?php echo esc_html($news_title); ?></h2>
                    <div class="news-intro">
                        <?php if (!empty($news_intro)) : ?>
                            <?php echo wp_kses_post($news_intro); ?>
                        <?php endif; ?>
                    </div>

                    <?php
                        $term = get_field('category'); // From ACF
                        
                        if ($term) {
                            $term_name = isset($term->name) ? $term->name : '';
                        }
                    
                        
                        // Check rows exists.
                        if( have_rows('news_articles') ) {

                            // Open the row container.
                            echo '<div class="row align-items-md-stretch">';
                            
                            // Retrieve selected category from ACF custom field
                                $selected_category = get_field('category'); // The name of the ACF field

                                // Check if a category was selected
                                if ($selected_category) {
                                    // Get the term_id of the selected category
                                    $category_id = $selected_category->term_id;

                                    // Query posts based on selected category
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page'    => 6,
                                        'order' => 'ASC',
                                        'cat' => $category_id, // Use the term_id of the selected category
                                    );

                                    $the_query = new WP_Query($args);

                                    // The Loop
                                    if ($the_query->have_posts()) {
                                        while ($the_query->have_posts()) {
                                            $the_query->the_post();
                                            // Display the post content as desired
                                            echo '<div class="col-md-6">';
                                            echo '<div class="news-article-icon">';
                                                // Display the post thumbnail
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('thumbnail');
                                                }
                                            echo '</div>';
                                            echo '<h3 class="news-article-heading"><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
                                            // Display the post content
                                            the_content();
                                            echo '</div>';
                                        }
                                    }
                                    else {
                                        // No posts found
                                        echo 'No posts found';
                                    }

                                    // Restore original post data
                                    wp_reset_postdata();
                                } else {
                                    // No category selected
                                    echo 'No category selected';
                                }


                            // Close the row container.
                            echo '</div>';

                        }


                ?>
                
            </div>
            
        <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary">
                <?php if ($news_image) : ?>
                    <div class="news-image">
                    <?php 
                        $size = 'large'; // (thumbnail, medium, large, full or custom size)
                        if( $news_image ) {
                            echo wp_get_attachment_image( $news_image, $size );
                        }
                        ?>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>


    </div>
</div>

