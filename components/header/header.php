<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <meta name="facebook-domain-verification" content="wvrn9f8q9k536orprilqvc5hh676eg" />
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/base.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/components/header/header.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/components/aside/aside.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/components/component_events/component_events.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/components/component_news/component_news.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/components/component_access/component_access.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/components/footer/footer.css" />
     <!-- TOPページCSS -->
      <?php if (is_front_page()) : ?>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/style.css" />
    <!-- ページごとのCSS -->
    <?php elseif (is_page('rental')) : ?>
      <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/pages/rental/rental.css">
    <?php elseif (is_page('recruit')) : ?>
      <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/pages/recruit/recruit.css">
    <?php elseif (is_page('contact')) : ?>
      <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/pages/contact/contact.css">
    <?php elseif (is_page('gallery')) : ?>
      <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/pages/gallery/gallery.css">
    <?php elseif (is_post_type_archive('schedule')) : ?>
      <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/pages/schedule/schedule.css">
    <?php endif; ?>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <title><?php echo esc_html( wp_get_document_title() ); ?></title>
    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?>>


<div class="header">
  <div class="w_1280 wrapper">
    <div class="header_layout flex">
      <div class="hamburger">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
      </div>
      <nav class="header_nav">
        <ul class="header_nav_container flex oswald_B">
          <li class="header_list">
            <a href="<?php echo esc_url(home_url("/#about")); ?>" class="header_link">ABOUT</a>
          </li>
          <li class="header_list">
            <a href="<?php echo esc_url(home_url("/#events")); ?>" class="header_link">PICK UP EVENTS</a>
          </li>
          <li class="header_list">
            <a href="<?php echo esc_url(home_url("/#news")); ?>" class="header_link">NEWS</a>
          </li>
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/logo/logo_B_white.png" alt="UTAGE SAPPORO" class="header_logo" />
          <li class="header_list">
            <a href="<?php echo esc_url(home_url("/#campaign")); ?>" class="header_link">CAMPAIGN</a>
          </li>
          <li class="header_list">
            <a href="<?php echo esc_url(home_url("/#vip")); ?>" class="header_link">VIP</a>
          </li>
          <li class="header_list">
            <a href="<?php echo esc_url(home_url("/#access")); ?>" class="header_link">ACCESS</a>
          </li>
        </ul>
      </nav>
      <div class="empty"></div>
    </div>
  </div>
</div>

<div class="hamburger_content">
  <div class="overlay"></div>
  <div class="hamburger_content_layout flex">
    <div class="left_content">
      <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/logo/logo_B_white.png" alt="logo" />
    </div>
    <div class="right_content">
      <ul class="hamburger_list_container grid oswald_B">
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url("/#about")); ?>" class="hamburger_link">ABOUT</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url("/#events")); ?>" class="hamburger_link">PICK UP EVENTS</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(get_post_type_archive_link('schedule')); ?>" class="hamburger_link">
            SCHEDULE
          </a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url("/#news")); ?>" class="hamburger_link">NEWS</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url("/#campaign")); ?>" class="hamburger_link">CAMPAIGN</a>
        </li>
        <li class="hamburger_list">
          <a href="" class="hamburger_link">FLOOR</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url('/gallery')); ?>" class="hamburger_link">GALLERY</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url("/#vip")); ?>" class="hamburger_link">VIP</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url('/rental')); ?>" class="hamburger_link">RENTAL</a>
        </li>
        <li class="hamburger_list">
          <a href="<?php echo esc_url(home_url("/#access")); ?>" class="hamburger_link">ACCESS</a>
        </li>
      </ul>
      <div class="link_button_container flex oswald_R">
        <a href="<?php echo esc_url(home_url('/recruit')); ?>" class="link_button">RECRUIT</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link_button">CONTANCT</a>
      </div>
      <div class="sns_link_container flex">
        <a href="" class="sns_link">
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/icons/Instagram_Glyph_White.png" alt="Instagram" />
        </a>
        <a href="" class="sns_link">
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/icons/logo-white.png" alt="X" />
        </a>
        <a href="" class="sns_link flex">
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/icons/TikTok-logo-RGB-Stacked-white-simplified.png" alt="TikTok" />
        </a>
      </div>
    </div>
  </div>
</div>
