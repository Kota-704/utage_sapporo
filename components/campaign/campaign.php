<section id="campaign" class="campaign">
  <h2 class="campaign_top_title oswald_B">
    <span class="line_top sp"></span>
    CAMPAIGN
    <span class="line_bottom sp"></span>
  </h2>

  <div class="swiper swiper_campaign">
    <div class="swiper-wrapper">
      <?php
      $args = array(
          'post_type' => 'campaign',
          'posts_per_page' => -1,
          'post_status' => 'publish',
      );
      $campaign_query = new WP_Query($args);

      if ($campaign_query->have_posts()) :
          while ($campaign_query->have_posts()) : $campaign_query->the_post(); ?>
              <div class="swiper-slide">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php
                      $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                      <div class="campaign_thumbnail">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="campaign_image" />
                      </div>
                  <?php endif; ?>
              </div>
          <?php endwhile;
          wp_reset_postdata();
      else : ?>
          <p>現在、キャンペーン情報はありません。</p>
      <?php endif; ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</section>
