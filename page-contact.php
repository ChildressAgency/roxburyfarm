<?php get_header(); ?>
  <main id="main" class="hp-main">
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
      <div id="contact-info">
        <div class="row">
          <div class="col-sm-4">
            <div id="location" class="contact-card">
              <p><strong><?php the_field('address', 'option'); ?></strong><br /><?php the_field('city_state_zip', 'option'); ?></p>
            </div>
          </div>
          <div class="col-sm-4">
            <div id="hours" class="contact-card">
              <?php the_field('hours', 'option'); ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div id="phone" class="contact-card">
              <p>Main Store: <?php the_field('store_phone', 'option'); ?><br />Nursery & Greenhouse: <?php the_field('nursery_phone', 'option'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>