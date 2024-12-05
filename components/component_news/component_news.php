<?php
$args = array(
    'post_type' => 'news',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
);
$query = new WP_Query($args);
?>

<div class="swiper swiper_news">
    <div class="swiper-wrapper news_layout flex">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide news_item flex">
                    <?php
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    if ($thumbnail_url) : ?>
                        <div class="news_thumbnail">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="news_image">
                        </div>
                    <?php endif; ?>
                    <div class="news_content">
                        <h3 class="news_title noto_B txt_center"><?php echo get_the_date(); ?></h3>
                        <p class="news_description noto_M txt_center">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="no_news noto_B">現在、イベント情報はありません。</p>
        <?php endif; ?>
    </div>
    <div class="swiper-button-prev sp"></div>
    <div class="swiper-button-next sp"></div>
</div>
