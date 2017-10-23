<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class('karu-theme'); ?>>
    <div class="maxwidth">
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div role="document">
      <main>
        <?php include Wrapper\template_path(); ?>
      </main>
      <?php if (Setup\display_sidebar()) : ?>
        <aside>
          <?php include Wrapper\sidebar_path(); ?>
        </aside>
      <?php endif; ?>
    </div>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

    </div><!-- .container -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-41636874-3"></script>
    <script>
      window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-41636874-3');
    </script>

  </body>
</html>
