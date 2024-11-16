<?php
$args = array(
    'post_type' => 'events',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
);
$query = new WP_Query($args);
;?>

<div class="events_layout flex">
  <?php if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
          <div class="event_item flex">
              <?php if (has_post_thumbnail()) : ?>
                  <div class="event_thumbnail">
                      <?php the_post_thumbnail('medium'); ?>
                  </div>
              <?php endif; ?>
              <div class="event_content">
                  <h3 class="event_title noto_B"><?php the_title(); ?></h3>
                  <p class="event_description noto_M">
                      <?php the_content(); ?>
                  </p>
              </div>
          </div>
      <?php endwhile;
      wp_reset_postdata();
    else : ?>
      <p class="no_events noto_B">現在、イベント情報はありません。</p>
  <?php endif; ?>
</div>
