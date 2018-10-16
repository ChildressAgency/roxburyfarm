<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <article>
        <header class="page-header">
          <?php if(get_field('page_title')): ?>
            <h2 class="page-title"><?php the_field('page_title'); ?></h2>
          <?php endif; if(get_field('page_subtitle')): ?>
            <h3 class="page-subtitle"><?php the_field('page_subtitle'); ?></h3>
          <?php endif; ?>
        </header>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>