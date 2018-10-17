<?php get_header(); ?>
  <main id="main" class="hp-main">
    <div class="container">
      <section id="featured-products">
        <?php
          $featured_products = new WP_Query(array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'meta_key' => 'featured_product',
            'meta_value' => 1
          ));

          if($featured_products->have_posts()): ?>
            <h2 class="page-title text-center">Featured Products</h2>
            <div class="row">
              <?php while($featured_products->have_posts()): $featured_products->the_post(); ?>
                <div class="col-sm-3">
                  <a href="<?php the_permalink(); ?>" class="featured-product">
                    <?php 
                      $featured_product_img = '<img src="' . get_stylesheet_directory_uri() . '/images/seasonal-plants.jpg" class="center-block" alt="" />';
                      if(has_post_thumbnail()){
                        $featured_product_img = get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'center-block'));
                      }
                      
                      echo $featured_product_img;
                    ?>
                    <h3><?php the_title(); ?></h3>
                    <div class="featured-product-overlay"></div>
                  </a>
                </div>
              <?php endwhile; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
      </section>

      <section id="all-products">
        <?php
          $products = new WP_Query(array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'meta_key' => 'featured_product',
            'meta_value' => 1,
            'meta_compare' => '!='
          ));

          if($products->have_posts()): ?>
            <h2 class="page-title text-center">All Products:</h2>
            <div id="products" class="panel-group" role="tablist" aria-multiselectable="true">
              <?php $p=0; while($products->have_posts()): $products-> the_post(); ?>
                <div class="panel panel-default">
                  <div id="product-heading-<?php echo $p; ?>" class="panel-heading" role="tab">
                    <h4 class="panel-title">
                      <a href="#product-<?php echo $p; ?>" role="button" data-toggle="collapse" data-parent="#products" aria-expanded="false" aria-controls="product-<?php echo $p; ?>" class="collapsed">
                        <?php the_title(); ?>
                      </a>
                    </h4>
                  </div>
                  <div id="product-<?php echo $p; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="product-heading-0">
                    <div class="panel-body">
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              <?php $p++; endwhile; ?>
            </div>
        <?php endif; ?>
      </section>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>