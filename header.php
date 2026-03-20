<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Women@SCS</title>
    <?php wp_head(); ?>
    <link rel="icon" href="<?php echo get_template_directory_uri() . '/img/wscs_logo2.png'; ?>">
  </head>

  <body <?php body_class(); ?>>
    <div class="row blue-bar">
      <div class="col s12 padding-top zindex-top"></div>
    </div>

      <div class="row content-top">
        <!-- W@SCS general info (CMU logo, W@SCS) -->
        <div class="col s12 l3">
          <div class="wscs-info">
            <a href="https://www.cmu.edu/"><img class="cmu-logo" src="<?php echo get_template_directory_uri() . '/img/cmu_wordmark.png'; ?>" alt="Carnegie Mellon University"></a>
          </div>
          <a href="<?php echo home_url(); ?>" style="color: #00294b;"><h1 class="wscs-info">WOMEN<b>@SCS</b></h1></a>
        </div>

        <!-- Navigation -->
        <div class="col s12 l9">
        <nav class="nav-wrapper">
          <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
          <?php
            wp_nav_menu(array(
              'menu_class'     => 'right hide-on-med-and-down',
              'container'      => false,
              'theme_location' => 'primary-menu',
              'walker'         => new wscs_materializecss_large_walker(),
            ));

            wp_nav_menu(array(
              'menu_class'     => 'side-nav',
              'menu_id'        => 'mobile-nav',
              'container'      => false,
              'theme_location' => 'primary-menu',
              'walker'         => new wscs_materializecss_small_walker(),
            ));
          ?>
        </nav>
        </div>
      </div>
