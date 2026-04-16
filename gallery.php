<?php /* Template Name: Photo Gallery */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $calendarEventsRequest = wp_remote_get( wscs_get_calendar_api_url( 3 ) );
    if ( is_array( $calendarEventsRequest ) ) {
      $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>

<main>

  <div class="row content-top">


      <div class="col s12 section-divider"><hr></div>

      <!-- start upcoming events info -->
      <div class="col s12 l4" id="dates">
        <div class="label"> <h2>Upcoming <br> Events</h2> </div>
            <?php
            $json = json_decode($calendarEvents, true);
            // var_dump($json["items"]);
            foreach ($json["items"] as $event) {
              $dateString = $event["start"]["date"] ? $event["start"]["date"] : $event["start"]["dateTime"];
              $date = date_create($dateString);
              $formattedDate = date_format($date,"m/d/y");
              echo 
                '<div class="event">
                  <div class="info">' . $formattedDate . '</div>
                  <div class="name"><b>' . esc_html( $event["summary"] ) . '</b></div>
                  <div class="info">' . esc_html( $event["location"] ) . '</div>
                </div>';
            }
          ?>
      </div>
      <!-- end upcoming events info -->

    </div>


  <div class="col s12 section-divider"></div>
  <div class="wscs-page-content">
    <?php $first = true; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <div class="page-title "><b><?php the_title() ?> Photo Gallery</b></div>
      <p class="description"><?php the_content() ?></p>
      
    <?php endwhile; else : ?>

      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>

