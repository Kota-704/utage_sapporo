<?php

// カスタム投稿タイプ 'schedule' に設定したアーカイブ画像を取得
$archive_image = get_option('schedule_archive_image'); // オプションに保存された値を取得

if ($archive_image) {
    echo '<div class="archive_image_container">';
    echo '<img src="' . esc_url($archive_image) . '" alt="Schedule Archive" class="archive_image">';
    echo '</div>';
}

// 投稿ループ
if (have_posts()) :
    while (have_posts()) : the_post();
        the_title('<h2>', '</h2>');
        the_content();
    endwhile;
else :
    echo '<p>投稿がありません。</p>';
endif;
