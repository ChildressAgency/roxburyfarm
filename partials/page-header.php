<header class="page-header">
  <?php if(get_field('page_title')): ?>
    <h2 class="page-title"><?php the_field('page_title'); ?></h2>
  <?php endif; if(get_field('page_subtitle')): ?>
    <h3 class="page-subtitle"><?php the_field('page_subtitle'); ?></h3>
  <?php endif; ?>
</header>