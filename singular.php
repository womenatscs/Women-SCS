<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    // 3 query parameters set:
    // maxResults = 3
    // timeMin = currentTime
    // key = API key (obtain from console.developers.google.com - navigate to correct project > create credentials > API key)
    $api_key = defined( 'GOOGLE_CALENDAR_API_KEY' ) ? GOOGLE_CALENDAR_API_KEY : '';
    $calendarEventsRequest = wp_remote_get( 'https://www.googleapis.com/calendar/v3/calendars/women.at.scs@gmail.com/events?key=' . urlencode( $api_key ) . '&maxResults=3&timeMin=' . $currentTime);
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

