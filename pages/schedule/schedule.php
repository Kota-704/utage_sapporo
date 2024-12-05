<?php
$archive_image = get_option('schedule_archive_image');

if ($archive_image) {
    echo '<div class="archive_image_container">';
    echo '<img src="' . esc_url($archive_image) . '" alt="Schedule Archive" class="archive_image">';
    echo '</div>';
}
?>

<div class="w_1280 wrapper">
    <ul class="schedule_detail">
        <?php if (have_posts()) :
            while (have_posts()) : the_post();

                $event_date_raw = get_post_meta(get_the_ID(), '_schedule_date', true);
                if ($event_date_raw) {
                    $date = new DateTime($event_date_raw);
                    $formatted_date = $date->format('Y.m.d');
                    $weekday = $date->format('D');
                    $weekday_jp = [
                        'Mon' => 'MON', 'Tue' => 'TUE', 'Wed' => 'WED',
                        'Thu' => 'THU', 'Fri' => 'FRI', 'Sat' => 'SAT', 'Sun' => 'SUN'
                    ];
                    $formatted_weekday = $weekday_jp[$weekday];
                }
                ?>
                <li class="schedule_list">
                    <div class="schedule_item flex pc_tablet">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="schedule_thumbnail">
                        <?php endif; ?>

                        <div class="schedule_right_item">
                            <?php if ($event_date_raw) : ?>
                                <p class="schedule_date oswald_B">
                                    <?php echo esc_html($formatted_date . '(' . $formatted_weekday . ')'); ?>
                                </p>
                            <?php endif; ?>

                            <p class="schedule_heading noto_B">GUEST</p>
                            <h2 class="schedule_guest noto_B"><?php the_title(); ?></h2>

                            <div class="schedule_content noto_M">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="schedule_item_sp flex sp">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="schedule_thumbnail">
                        <?php endif; ?>

                        <div class="schedule_right_item">
                            <?php if ($event_date_raw) : ?>
                                <p class="schedule_date oswald_B">
                                    <?php echo esc_html($formatted_date . '(' . $formatted_weekday . ')'); ?>
                                </p>
                            <?php endif; ?>

                            <p class="schedule_heading noto_B">GUEST</p>
                            <h2 class="schedule_guest noto_B"><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="schedule_content noto_M sp">
                        <?php the_content(); ?>
                    </div>
                </li>
            <?php endwhile;
        else : ?>
            <p>投稿がありません。</p>
        <?php endif; ?>
    </ul>
</div>
