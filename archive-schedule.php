<?php
  get_template_part('components/header/header');
  get_template_part('components/aside/aside');

  $term = get_queried_object();
  $category_image = get_term_meta($term->term_id, 'category_image', true);
  if ($category_image) {
    echo '<img src="' . esc_url($category_image) . '" alt="' . esc_attr($term->name) . '">';
  }
  ?>

<?php
  get_template_part('components/footer/footer');
?>
