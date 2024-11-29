<?php
$args = array(
    'post_type' => 'news',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
);
$query = new WP_Query($args);
;?>

<div class="news_layout flex">
  <?php if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
          <div class="news_item flex">
              <?php
              $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              if ($thumbnail_url) : ?>
                  <div class="news_thumbnail">
                      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="news_image">
                  </div>
              <?php endif; ?>
              <div class="news_content">
                  <h3 class="news_title noto_B"><?php echo get_the_date(); ?></h3>
                  <p class="news_description noto_M">
                      <?php the_content(); ?>
                  </p>
              </div>
          </div>
      <?php endwhile;
      wp_reset_postdata();
    else : ?>
      <p class="no_news noto_B">現在、イベント情報はありません。</p>
  <?php endif; ?>
</div>
