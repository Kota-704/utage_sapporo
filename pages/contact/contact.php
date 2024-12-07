<section class="contact">
  <div class="w_1280 wrapper">

    <?php
    $page = get_page_by_path('contact');
    ?>

    <?php if ($page && is_object($page)) : ?>

      <h2 class="contact_title oswald_M">CONTACT</h2>
      <div class="page_content">
          <?php echo apply_filters('the_content', $page->post_content); ?>
      </div>
    <?php else : ?>
      <p>固定ページが見つかりません。</p>
    <?php endif; ?>
  </div>
</section>
