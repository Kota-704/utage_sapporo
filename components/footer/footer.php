    <div class="footer">
      <div class="w_1280 wrapper">
        <div class="footer_layout flex">
          <p class="address noto_B">
            〒064-0805 北海道札幌市中央区南5条西3丁目6-1 札幌東宝公楽ビル B1F
          </p>
          <ul class="link_container flex">
            <li class="link_list">
              <a href="https://www.instagram.com/utage_sapporo/" class="sns_link"  target="_blank">
                <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/icons/Instagram.svg" alt="Instagram" />
              </a>
            </li>
            <li class="link_list">
              <a href="https://x.com/UTAGE_SAPPORO?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="sns_link"  target="_blank">
                <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/icons/X.svg" alt="X" />
              </a>
            </li>
            <li class="link_list">
              <a href="https://www.tiktok.com/@utage_sapporo" class="sns_link"  target="_blank">
                <img src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/img/icons/TikTok.svg" alt="TikTok" />
              </a>
            </li>
          </ul>
          <small class="copyright txt_center m1c">&copy;2024 UTAGE SAPPORO</small>
        </div>
      </div>
    </div>

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/script.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/components/header/header.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/components/aside/aside.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/components/component_events/events.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/components/component_news/news.js"></script>
    <?php if (is_page('contact')) : ?>
      <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/pages/contact/contact.js"></script>
    <?php elseif (is_page('vip')) : ?>
      <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/pages/vip/vip.js"></script>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>
