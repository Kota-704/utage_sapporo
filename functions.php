<?php

    /*--------------------
    ブラウザタブ設定
    --------------------*/
    function my_theme_title_tag() {
        add_theme_support('title-tag');
    }
    add_action('after_setup_theme', 'my_theme_title_tag');

    add_filter('document_title_separator', 'custom_title_separator');
    function custom_title_separator($separator) {
        return '|';
    }

    add_filter('document_title_parts', function ($title) {
        $new_title = [];
        if (isset($title['site'])) {
            $new_title['title'] = $title['site'];
        }
        if (isset($title['title'])) {
            $new_title['site'] = $title['title'];
        }
        return $new_title;
    });


  /*--------------------
  eventsの作成
  --------------------*/

  function create_post_type_events() {
      register_post_type('events',
          array(
              'labels' => array(
                  'name' => __('Events'),
                  'singular_name' => __('Event')
              ),
              'public' => true,
              'has_archive' => true,
              'supports' => array('title', 'editor', 'thumbnail'),
          )
      );
  }
  add_action('init', 'create_post_type_events');

  add_theme_support('post-thumbnails');

   /*--------------------
    campaignの作成
    --------------------*/

  function create_post_type_campaign() {
    register_post_type('campaign',
        array(
            'labels' => array(
                'name' => __('Campaigns'),
                'singular_name' => __('Campaign')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
  }
  add_action('init', 'create_post_type_campaign');

  function enqueue_campaign_assets() {
          // Swiper CSS
          wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
          // Swiper JS
          wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);
          // Campaign-specific CSS
          wp_enqueue_style('campaign-style', get_template_directory_uri() . '/components/campaign/campaign.css');
          // Campaign-specific JS
          wp_enqueue_script('campaign-script', get_template_directory_uri() . '/components/campaign/campaign.js', array('swiper-js'), null, true);
  }
  add_action('wp_enqueue_scripts', 'enqueue_campaign_assets');

  add_action('wp_footer', function() {
      echo '<script type="module" src="' . get_template_directory_uri() . '/components/campaign/campaign.js"></script>';
  });

    /*--------------------
    newsの作成
    --------------------*/
    function create_post_type_news() {
        register_post_type('news',
            array(
                'labels' => array(
                    'name' => __('News'),
                    'singular_name' => __('News')
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'thumbnail'),
            )
        );
    }
    add_action('init', 'create_post_type_news');

    add_theme_support('post-thumbnails');


    /*--------------------
    autopストップ
    --------------------*/

    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('widget_text_content', 'wpautop');

    add_filter('wpcf7_autop_or_not', '__return_false');

    function disable_tinymce_wpautop($init) {
        $init['wpautop'] = false;
        $init['remove_linebreaks'] = false;
        return $init;
    }
    add_filter('tiny_mce_before_init', 'disable_tinymce_wpautop');


    /*--------------------
     wp_footer() のフックを無効化
    --------------------*/

    function remove_footer_credit() {
        remove_action('wp_footer', 'wp_default_footer');
    }
    add_action('init', 'remove_footer_credit');


    /*--------------------
    archive-scheduleの設定
    --------------------*/

    function register_schedule_post_type() {
        register_post_type('schedule', array(
            'label' => 'Schedule',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'schedule'),
            'supports' => array('title', 'editor', 'thumbnail'),
        ));
    }
    add_action('init', 'register_schedule_post_type');

    function add_schedule_date_meta_box() {
        add_meta_box(
            'schedule_date_meta_box',
            'イベント開催日',
            'schedule_date_meta_box_callback',
            'schedule',
            'side',
            'default'
        );
    }
    add_action('add_meta_boxes', 'add_schedule_date_meta_box');

    function schedule_date_meta_box_callback($post) {
        $value = get_post_meta($post->ID, '_schedule_date', true);
        wp_nonce_field('save_schedule_date', 'schedule_date_nonce');
        ?>
        <label for="schedule_date">開催日を入力してください:</label>
        <input type="date" id="schedule_date" name="schedule_date" value="<?php echo esc_attr($value); ?>" style="width:100%;">
        <?php
    }

    function save_schedule_date_meta_box($post_id) {
        if (!isset($_POST['schedule_date_nonce']) || !wp_verify_nonce($_POST['schedule_date_nonce'], 'save_schedule_date')) {
            return;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['schedule_date'])) {
            update_post_meta($post_id, '_schedule_date', sanitize_text_field($_POST['schedule_date']));
        }
    }
    add_action('save_post', 'save_schedule_date_meta_box');


    /*--------------------
    archive-scheduleにアイキャッチ画像を設定
    --------------------*/

    // 管理画面にオプションページを追加
    function schedule_add_admin_page() {
        add_menu_page(
            'Schedule Options',
            'Schedule Options',
            'manage_options',
            'schedule-options',
            'schedule_options_page',
            '',
            110
        );
    }
    add_action('admin_menu', 'schedule_add_admin_page');

    // オプションページのコールバック
    function schedule_options_page() {
        if (isset($_POST['schedule_archive_image'])) {
            update_option('schedule_archive_image', sanitize_text_field($_POST['schedule_archive_image']));
        }

        $archive_image = get_option('schedule_archive_image', '');
        ?>
        <div class="wrap">
            <h1>スケジュールページのTOP画像を設定</h1>
            <h2>メディア>ライブラリより、設定したい画像をアップロードし、その画像のファイルパスを下記に貼り付けてください。</h2>
            <form method="post">
                <label for="schedule_archive_image">スケジュールTOP画像 URL:</label>
                <input type="text" id="schedule_archive_image" name="schedule_archive_image" value="<?php echo esc_attr($archive_image); ?>" style="width:100%;">
                <button type="submit" class="button button-primary">保存</button>
            </form>
        </div>
        <?php
    }
