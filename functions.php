<?php
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


  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');
