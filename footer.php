  <footer id="footer">
    <div id="footer-upper" class="" alt="" />
      <?php if(have_rows('testimonials', 'option')): ?>
        <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php $t = 0; while(have_rows('testimonials', 'option')): the_row(); ?>
              <div class="item<?php if($i==0){ echo ' active'; } ?>">
                <div class="testimonial">
                  <?php the_sub_field('testimonial'); ?>
                  <cite>&mdash;<?php the_sub_field('testimonial_author'); ?></cite>
                </div>
              </div>
            <?php $t++; endwhile; ?>
          </div>

          <a href="#testimonial-carousel" class="left carousel-control" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a href="#testimonial-carousel" class="right carousel-control" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      <?php endif; ?>

      <div id="footer-mid">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-3">
              <?php
                if(function_exists('the_custom_logo')){
                  $custom_logo_id = get_theme_mod('custom_logo');
                  $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                }
              ?>
              <img src="<?php echo $custom_logo[0]; ?>" class="footer-logo img-responsive center-block" alt="Roxbury Farm & Garden Logo" />
            </div>
            <div class="col-sm-9">
              <div id="social-nav-info" class="row">
                <div id="footer-social" class="col-sm-2">
                  <div class="social">
                    <?php if(get_field('facebook', 'option')): ?>
                      <a href="<?php the_field('facebook', 'option'); ?>" class="facebook text-hide" target="_blank">Facebook<i class="fab fa-facebook"></i></a>
                    <?php endif; if(get_field('twitter', 'option')): ?>
                      <a href="<?php the_field('twitter', 'option'); ?>" class="twitter text-hide" target="_blank">Twitter<i class="fab fa-twitter"></i></a>
                    <?php endif; if(get_field('youtube', 'option')): ?>
                      <a href="<?php the_field('youtube', 'option'); ?>" class="you-tube text-hide" target="_blank">YouTube<i class="fab fa-youtube"></i></a>                  
                    <?php endif; ?>
                  </div>
                </div>
                <div id="nav-info" class="col-sm-10">
                  <div class="row">
                    <div class="col-sm-4">
                      <?php 
                        $footer_nav_args = array(
                          'theme_location' => 'footer-nav',
                          'menu' => '',
                          'container' => '',
                          'container_id' => '',
                          'container_class' => '', 
                          'menu_class' => 'footer-nav',
                          'menu_id' => '',
                          'echo' => true,
                          'fallback_cb' => 'roxburyfarm_footer_fallback_menu',
                          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>';
                          'depth' => 1,
                          'walker' => new wp_bootstrap_navwalker()
                        );
                        wp_nav_menu($footer_nav_args);
                      ?>
                    </div>
                    <div class="col-sm-4 contact-info">
                      <p><?php the_field('street_address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?><br />Main Store: <?php the_field('store_number', 'option'); ?><br />Nursery & Greenhouse: <?php the_field('nursey_phone', 'option'); ?></p>
                    </div>
                    <div class="col-sm-4 hours">
                      <?php the_field('hours', 'option'); ?><br />Thanks for shopping with us!</p>
                    </div>
                  </div>
                  <p class="copyright">Copyright &copy;<?php echo date('Y'); ?> &bull; Website created by <a href="https://childressagency.com" target="_blank">Childress Agency</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer-lower">
      <div class="embed-responsive embed-responsive-16by9">
        <?php the_field('google_map_iframe', 'option'); ?>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>