<section class="gallery">
    <h2 class="gallery_title oswald_M">GALLERY</h2>
    <div class="w_1280 wrapper">
        <div class="gallery_container grid">
            <?php
            $page_id = get_the_ID();
            $content = get_post_field('post_content', $page_id);

            preg_match_all('/<img[^>]+src="([^">]+)"[^>]*alt="([^">]*)"/', $content, $matches);

            if (!empty($matches[1])) :
                foreach ($matches[1] as $index => $image_url) :
                    $alt_text = $matches[2][$index];
            ?>
                    <div class="gallery_item">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="gallery_image">
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
