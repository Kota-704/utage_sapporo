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
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/backgrounds/fv_background.png" alt="fv_background" class="background_image" />
          <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/top/fv_title.svg" alt="fv_title" class="fv_title_image pc_tablet" />
          <div class="fv_image_contaianer sp">
            <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/top/about_title_sp.svg" alt="fv_title" class="fv_title_image top" />
            <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/logo/logo_A_white.png" alt="fv_title" class="fv_title_image bottom" />
          </div>
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
        <div class="events_gradation"></div>
        <div class="events_wrapper">
          <div class="events_container fade-in">
            <span class="frame_left pc_tablet"></span>
            <span class="frame_right pc_tablet"></span>
            <h2 class="event_top_title oswald_B">
              <span class="line_top sp"></span>
              PICK UP EVENTS
              <span class="line_bottom sp"></span>
            </h2>
            <?php get_template_part('components/component_events/component_events'); ?>
          </div>
        </div>
      </section>

      <?php
        get_template_part('components/campaign/campaign');
      ?>

      <section id="news" class="news">
        <div class="news_container fade-in">
          <span class="frame_left pc_tablet"></span>
          <span class="frame_right pc_tablet"></span>
          <h2 class="event_top_title oswald_B">
            <span class="line_top sp"></span>
            NEWS
            <span class="line_bottom sp"></span>
          </h2>
          <?php get_template_part('components/component_news/component_news'); ?>
        </div>
      </section>

      <section id="vip" class="vip flex">
        <h2 class="section_title vip_title_front oswald_M">
          <a href="<?php echo esc_url(home_url("/vip")); ?>" class="vip_link">VIP</a>
        </h2>
      </section>

      <section id="access" class="access">
        <?php
          get_template_part('components/component_access/component_access');
        ?>
      </section>

    </main>
    <?php get_template_part('components/aside/aside'); ?>

    <?php get_template_part('components/footer/footer'); ?>
