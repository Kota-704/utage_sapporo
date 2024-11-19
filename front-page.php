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
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <title><?php echo esc_html( wp_get_document_title() ); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <?php get_template_part('components/header/header'); ?>

    <main>
      <section class="fv">
        <div class="video_wrap">
           <video class="fv_video" autoplay loop muted playsinline>
            <source src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/movie/fv_background_movie.mp4" type="video/mp4">
            <source src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/movie/fv_background_movie.webm" type="video/webm">
            <!-- サポートされていない場合のフォールバックメッセージ -->
            Your browser does not support the video tag.
          </video>
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/backgrounds/fv_background.png" alt="" class="background_image" />
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/top/fv_title.png" alt="" class="fv_title_image" />
        </div>
      </section>

      <section id="about" class="about">
        <p class="about_text noto_R fade-in">
          それも今何しろこの努力めというものの所より叱るましだろ。<br /><br />

          できるだけ昔に観念屋はかつてそんな講演たあっともになるのでならましがも努力立っうたから、たったには勤まりたありでしで。金力がしなら方はけっして時間からそのうちだろでだ。<br /><br />

          よく岩崎さんに仕事精神だんだん評価に行っです言葉ある様子私か尊敬をというお一言うたたますから、その事実はあなたか鼻権力に得が、張さんののを先生の何にどうしてもお発音と思って私兄にご尊重に出るようにとやかくご記憶へいうただて、つい何だか永続が折っずがいるましのを逃れませう。
        </p>
      </section>

      <section id="events" class="events">
        <div class="events_container fade-in">
          <h2 class="event_top_title oswald_B">PICK UP EVENTS</h2>
          <?php get_template_part('components/component_events/component_events'); ?>
        </div>
      </section>

      <?php
        get_template_part('components/campaign/campaign');
      ?>

      <section id="news" class="news">
        <div class="news_container fade-in">
          <h2 class="event_top_title oswald_B">NEWS</h2>
          <?php get_template_part('components/component_news/component_news'); ?>
        </div>
      </section>

      <section id="vip" class="vip flex">
        <h2 class="section_title oswald_M">VIP</h2>
      </section>

      <section id="access" class="access">
        <?php
          get_template_part('components/component_access/component_access');
        ?>
      </section>

    </main>
    <?php get_template_part('components/aside/aside'); ?>

    <?php get_template_part('components/footer/footer'); ?>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/script.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/components/header/header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>
