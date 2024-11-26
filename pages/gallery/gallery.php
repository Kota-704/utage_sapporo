<section class="gallery">
    <h2 class="gallery_title oswald_M">GALLERY</h2>
    <div class="w_1280 wrapper">
        <div class="gallery_container grid">
            <?php
            $page_id = get_the_ID();

            $args = array(
                'post_parent' => $page_id,
                'post_type'   => 'attachment',
                'post_mime_type' => 'image',
                'numberposts' => -1
            );

            $attachments = get_posts($args);

            if ($attachments) :
                foreach ($attachments as $attachment) :
                    $image_url = esc_url(wp_get_attachment_url($attachment->ID));
                    $alt_text = esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true));
                    $aspect_ratio = get_post_meta($attachment->ID, '_aspect_ratio', true);

                    if (!$aspect_ratio) {
                        $aspect_ratio = '1:1';
                    }

                    $aspect_ratio_style = '';
                    if ($aspect_ratio === '1:1') {
                        $aspect_ratio_style = 'aspect-ratio: 1 / 1;';
                    } elseif ($aspect_ratio === '16:9') {
                        $aspect_ratio_style = 'aspect-ratio: 16 / 9;';
                    } elseif ($aspect_ratio === '4:3') {
                        $aspect_ratio_style = 'aspect-ratio: 4 / 3;';
                    }
            ?>
                <div class="gallery_item" style="<?php echo esc_attr($aspect_ratio_style); ?>">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $alt_text; ?>" class="gallery_image">
                </div>
            <?php
                endforeach;
            else :
                echo '<p class="no-images">画像はまだアップロードされていません。</p>';
            endif;
            ?>
        </div>
    </div>
</section>
