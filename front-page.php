<?php get_header(); ?>
  <main id="main" class="hp-main">
    <?php
      $hp_carousel = get_field('homepage_carousel');

      if(!empty($hp_carousel)): ?>
        <div id="hp-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
              $number_of_slides = count($hp_carousel);
              for($ns = 0; $ns < $number_of_slides; $ns++): ?>
                <li data-target="#hp-carousel" data-slide-to="<?php echo $ns; ?>"<?php if($ns == 0){ echo ' class="active"'; } ?>></li>
            <?php endfor; ?>
          </ol>

          <div class="carousel-inner" role="listbox">
            <?php $c = 0; foreach($hp_carousel as $slide): ?>
              <div class="item<?php if($c == 0){ echo ' active'; } ?>">
                <div class="row">
                  <div class="col-sm-5">
                    <div class="text-side">
                      <?php if($slide['slide_title']): ?>
                        <div class="title">
                          <h2><?php echo $slide['slide_title']; ?></h2>
                        </div>
                      <?php endif; ?>

                      <?php if($slide['slide_caption']): ?>
                        <div class="caption">
                          <?php echo $slide['slide_caption']; ?>
                          <?php if($slide['slide_link']): ?>
                            <a href="<?php echo $slide['slide_link']['url']; ?>" class="btn-main read-more" target="<?php echo $slide['slide_link']['target']; ?>"><?php echo $slide['slide_link']['title']; ?></a>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="img-side" style="background-image:url(<?php echo $slide['slide_image']; ?>); <?php echo $slide['slide_image_css']; ?>"></div>
                  </div>
                </div>
              </div>
            <?php $c++; endforeach; ?>

          </div>
        </div>
    <?php endif; ?>

    <section id="service-section">
      <div class="container">
        <?php if(have_rows('services')): ?>
          <div class="row">
            <?php while(have_rows('services')): the_row(); ?>
              <div class="col-sm-6 col-md-3">
                <div class="service-card">
                  <?php $service_image = get_sub_field('service_image'); ?>
                  <img src="<?php echo $service_image['url']; ?>" class="center-block" alt="<?php echo $service_image['alt']; ?>" />
                  <h3><?php the_sub_field('service_title'); ?></h3>
                  <div class="service-card-content">
                    <h3><?php the_sub_field('service_title'); ?></h3>
                    <?php if(get_sub_field('service_caption')): ?>
                      <div class="service-card-caption">
                        <p><?php the_sub_field('service_caption'); ?></p>
                      </div>
                    <?php endif; ?>
                    <?php $service_link = get_sub_field('service_link'); if($service_link): ?>
                      <a href="<?php echo $service_link['url']; ?>" class="btn-main btn-white service-learn-more"><?php echo $service_link['title']; ?></a>
                    <?php endif; ?>
                  </div>
                  <div class="service-card-overlay"></div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

        <?php 
          $featured_video_id = get_field('featured_video');
          if($featured_video_id): ?>
            <div class="row video-section">
              <div class="col-sm-5">
                <h2><?php the_field('featured_video_section_title'); ?></h2>
                <p><?php echo get_the_title($featured_video_id); ?></p>
                <a href="<?php echo home_url('videos'); ?>" class="btn-main">More Videos</a>
              </div>
              <div class="col-sm-7">
                <div class="embed-responsive embed-responsive-16by9">
                  <?php
                    $featured_video = get_field('video', $featured_video_id);
                    echo roxburyfarm_add_video_params($featured_video);
                  ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
      </div>
    </section>

    <section id="social-feed">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/two-small-plants.png" class="img-responsive center-block" alt="" />
          </div>
          <div class="col-sm-6">
            <h2><?php the_field('social_feed_section_title'); ?></h2>
            <?php the_field('social_feed_section_content'); ?>
          </div>
        </div>
      </div>
    </section>

    <?php 
      $recent_posts = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish'
      ));
      
      if($recent_posts->have_posts()): ?>
        <section id="blog-tips">
          <div class="container">
            <h2><?php the_field('recent_posts_section_title'); ?></h2>
            <div class="row">
              <?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                <div class="col-sm-6 col-md-4">
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
                </div>
              <?php endwhile; ?>
            </div>
            <a href="<?php echo home_url('tips'); ?>" class="btn-main">Blog & Tips</a>
          </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>
  </main>

<?php get_footer(); ?>