<?php
$args = array(
    'post_type' => 'events',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
);
$query = new WP_Query($args);
?>

<div class="swiper swiper_events">
    <div class="swiper-wrapper events_layout flex">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide event_item flex">
                    <?php
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    if ($thumbnail_url) : ?>
                        <div class="event_thumbnail">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="event_image">
                        </div>
                    <?php endif; ?>
                    <div class="event_content">
                        <h3 class="event_title noto_B"><?php the_title(); ?></h3>
                        <p class="event_description noto_M">
                            <?php the_content(); ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="no_events noto_B">現在、イベント情報はありません。</p>
        <?php endif; ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
