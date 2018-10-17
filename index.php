<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <?php if(is_archive()): ?>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <div class="loop-summary">
            <h3><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
          </div>
        <?php endwhile; endif; ?>
      <?php else: ?>
        <article>
          <?php get_template_part('partials/page-header'); ?>

          <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </article>
      <?php endif; ?>
    </div>
  </main>
<?php get_footer(); ?>