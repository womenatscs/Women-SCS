<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    $calendarApiUrl = wscs_get_calendar_api_url( 'women.at.scs@gmail.com', 3 );
    $calendarEventsRequest = $calendarApiUrl ? wp_remote_get( $calendarApiUrl . $currentTime ) : array();
    if ( is_array( $calendarEventsRequest ) ) {
      $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
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

