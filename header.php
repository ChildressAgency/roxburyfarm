<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title>Roxbury Farm & Garden Center</title>

  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body <?php body_class(); ?>>
  <header id="header">
    <div class="masthead">
      <div class="container-fluid">
        <a href="mailto:<?php the_field('email', 'option'); ?>" class="email-link"><?php the_field('email', 'option'); ?></a>
        <div class="social">
          <?php if(get_field('facebook', 'option')): ?>
            <a href="<?php the_field('facebook', 'option'); ?>" class="facebook text-hide" target="_blank">Facebook<i class="fab fa-facebook"></i></a>
          <?php endif; if(get_field('twitter', 'option')): ?>
            <a href="<?php the_field('twitter', 'option'); ?>" class="twitter text-hide" target="_blank">Twitter<i class="fab fa-twitter-square"></i></a>
          <?php endif; if(get_field('youtube', 'option')): ?>
            <a href="<?php the_field('youtube', 'option'); ?>" class="you-tube text-hide" target="_blank">YouTube<i class="fab fa-youtube"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <nav id="header-nav">
      <div class="navbar-header">
        <a href="<?php echo home_url(); ?>" class="brand-logo">
          <?php 
            if(function_exists('the_custom_logo')){
              $custom_logo_id = get_theme_mod('custom_logo');
              $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            }
          ?>
          <img src="<?php echo $custom_logo[0]; ?>" class="img-responsive" alt="Roxbury Farm & Garden Logo" />
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <div class="top-row">
          <div id="phone-info" class="contact-info">
            <p>Main Store: <?php the_field('store_phone', 'option'); ?><br />Nursery & Greenhouse: <?php the_field('nursery_phone', 'option'); ?></p>
          </div>
          <div id="hours-info" class="contact-info">
            <?php the_field('hours', 'option'); ?>
          </div>
          <div id="location-info" class="contact-info">
            <p><strong><?php the_field('street_address', 'option'); ?></strong><br /><?php the_field('city_state_zip', 'option'); ?></p>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="bottom-row">
          <div class="nav-phone">
            <a href="tel:<?php the_field('store_phone', 'option'); ?>"><?php the_field('store_phone', 'option'); ?></a>
          </div>
          <?php 
            $header_nav_args = array(
              'theme_location' => 'header-nav',
              'menu' => '',
              'container' => '',
              'container_id' => '',
              'container_class' => '',
              'menu_class' => 'nav-navbar-nav navbar-right',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'roxburyfarm_header_fallback_menu', 
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($header_nav_args);
          ?>
        </div>
      </div>
    </nav>
  </header>

  <?php
    $hero_image = get_stylesheet_directory_uri() . '/images/top-dirt.jpg';
    $hero_image_css = 'background-position:center top;';
    if(is_front_page()){
      if(get_field('hero_image')){
        $hero_image = get_field('hero_image');
      }
      if(get_field('hero_image_css')){
        $hero_image_css = get_field('hero_image_css');
      }
    }
  ?>
  <div <?php if(is_front_page()){ echo 'id="hp-hero" '; } ?>class="hero" style="background-image:url(<?php echo $hero_image; ?>); <?php echo $hero_image_css; ?>">
    <div class="container">
      <div class="hero-caption">
        <?php if(get_field('hero_title')): ?>
          <h1><?php the_field('hero_title'); ?></h1>
        <?php elseif(is_home() || is_single()): ?>
          <h1>Tips</h1>
        <?php elseif(is_page('videos')): ?>
          <h1>Videos</h1>
        <?php elseif(is_page('products') || is_singular('products')): ?>
          <h1>Products</h1>
        <?php else: ?>
          <h1><?php echo get_the_title(); ?></h1>
        <?php endif; if(get_field('hero_caption')): ?>
          <p><?php the_field('hero_caption'); ?></p>
        <?php endif; ?>

        <?php if(is_front_page()): ?>
          <div class="btns-inline">
            <a href="<?php echo home_url('products'); ?>" class="btn-main">Read More</a>
            <br class="visible-xs-block" />
            <a href="<?php echo home_url('contact'); ?>" class="btn-main btn-white">Contact Us</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if(is_front_page()){ echo '<div class="hero-overlay"></div>'; } ?>
  </div>
