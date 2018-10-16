<?php get_header(); ?>
  <main id="main" class="hp-main">
    <div class="container">
      <?php get_template_part('partials/page-header'); ?>

      <section id="videos">
        <ul class="nav nav-justified" role="tablist">
          <li role="presentation" class="active">
            <a href="#featured" aria-controls="featured" role="tab" data-toggle="tab">Featured</a>
          </li>
          <li role="presentation">
            <a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a>
          </li>
          <li role="presentation">
            <a href="#archive" aria-controls="archive" role="tab" data-toggle="tab">Archive</a>
          </li>
        </ul>

        <div class="tab-content">
          <div id="featured" class="tab-pane fade in active" role="tabpanel">
            <?php
              $featured_videos = new WP_Query(array(
                'post_type' => 'videos',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_key' => 'video_type',
                'meta_value' => 'featured'
              ));

              if($featured_videos->have_posts()): while($featured_videos->have_posts()): $featured_videos->the_post(); ?>
                <div class="video-summary">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="embed-responsive embed-responsive-16by9">
                        <?php 
                          $video = get_field('video');
                          echo roxburyfarm_add_video_params($video);
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <h3><?php the_title(); ?></h3>
                      <?php the_field('video_description'); ?>
                    </div>
                  </div>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>

          <div id="popular" class="tab-pane fade" role="tabpanel">
            <?php
              $popular_videos = new WP_Query(array(
                'post_type' => 'videos',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_key' => 'video_type',
                'meta_value' => 'popular'
              ));

              if($popular_videos->have_posts()): while($popular_videos->have_posts()): $popular_videos->the_post(); ?>
                <div class="video-summary">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="embed-responsive embed-responsive-16by9">
                        <?php 
                          $video = get_field('video');
                          echo roxburyfarm_add_video_params($video);
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <h3><?php the_title(); ?></h3>
                      <?php the_field('video_description'); ?>
                    </div>
                  </div>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>

          <div id="archive" class="tab-pane fade" role="tabpanel">
            <?php
              $archive_videos = new WP_Query(array(
                'post_type' => 'videos',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_key' => 'video_type',
                'meta_value' => 'archive'
              ));

              if($archive_videos->have_posts()): while($archive_videos->have_posts()): $archive_videos->the_post(); ?>
                <div class="video-summary">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="embed-responsive embed-responsive-16by9">
                        <?php 
                          $video = get_field('video');
                          echo roxburyfarm_add_video_params($video);
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <h3><?php the_title(); ?></h3>
                      <?php the_field('video_description'); ?>
                    </div>
                  </div>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </section>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>