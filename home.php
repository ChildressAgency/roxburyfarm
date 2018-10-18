<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <header class="page-header">
        <h2 class="page-title">Fresh cut tips and blog:</h2>
      </header>
      <div id="blog-tips">
        <?php echo do_shortcode('[ajax_load_more container_type="div" css_classes="row" post_type="post" posts_per_page="6" scroll="false" button_label="Load More"]'); ?>
      </div>
    </div>
  </main>
<?php get_footer(); ?>