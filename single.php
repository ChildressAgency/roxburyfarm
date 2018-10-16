<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <article>
        <header class="page-header">
          <h2 class="page-title">Fresh cut tips and blog</h2>
        </header>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'alignright')); ?>
          <h3><?php the_title(); ?></h3>
          <h4><?php echo get_the_date('F j, Y'); ?></h4>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>