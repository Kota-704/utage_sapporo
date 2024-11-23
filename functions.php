<?php

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

    function disable_wpautop_for_events($content) {
        if (get_post_type() === 'events') {
            remove_filter('the_content', 'wpautop');
        }
        return $content;
    }
    add_filter('the_content', 'disable_wpautop_for_events', 9);

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

    add_action('category_edit_form_fields', 'add_category_image_field');
    add_action('category_add_form_fields', 'add_category_image_field');
    function add_category_image_field($tag) {
    $image_id = get_term_meta($tag->term_id, 'category_image', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top">
        <label for="category-image"><?php _e('Category Image'); ?></label>
        </th>
        <td>
        <input type="text" name="category_image" id="category-image" value="<?php echo esc_attr($image_id); ?>" />
        <p class="description"><?php _e('Enter image URL or media ID.'); ?></p>
        </td>
    </tr>
    <?php
    }
