<?php 
while ( have_rows( 'folds' ) ) : the_row();
    $fold_title = get_sub_field( 'title' );
    $fold_content = get_sub_field( 'content' );
?>
<div class="accordion" id="accordionFaq">

  <div class="accordion-item" id="heading-<?php echo get_row_index(); ?>">
    <h2 class="accordion-header mb-0">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo get_row_index(); ?>" aria-expanded="true" aria-controls="collapse-<?php echo get_row_index(); ?>">
      <?php echo $fold_title; ?>
      </button>
    </h2>
  </div>

  <div id="collapse-<?php echo get_row_index(); ?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?php echo get_row_index(); ?>"  data-bs-parent="#accordionFaq">
    <div class="accordion-body">
      <?php echo $fold_content; ?>
    </div>
  </div>

</div>
<?php endwhile; ?>