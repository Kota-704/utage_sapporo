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
