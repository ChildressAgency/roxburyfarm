<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <header class="page-header">
        <h2 class="page-title">Fresh cut tips and blog</h2>
      </header>

      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php 
          $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
          if(!$featured_image){
            $featured_image = get_stylesheet_directory_uri() . '/images/nursery-trees.jpg';
          }
        ?>
        <a href="<?php the_permalink(); ?>" class="blog-link" style="background-image:url(<?php echo $featured_image; ?>); background-position:center center;">
          <h3><?php the_title(); ?></h3>
          <div class="blog-link-overlay"></div>
        </a>
      <?php endwhile; endif; ?>

    </div>
  </main>
<?php get_footer(); ?>