<?php get_header();
    $json = wscs_get_calendar_events( 3 );
?>

<main>

  <div class="wscs-page-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="page-title "><b><?php the_title() ?></b></div>
      <p class="description"><?php the_content() ?></p>

    <?php endwhile; else : ?>

      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>

