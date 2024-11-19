<section id="campaign" class="campaign">
  <h2 class="campaign_top_title oswald_B">CAMPAIGN</h2>

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
                      <div class="campaign_thumbnail">
                          <?php the_post_thumbnail('large'); ?>
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
