<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <article>
        <?php get_template_part('partials/page-header'); ?>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>