<?php /* Template Name: Photo Gallery */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $calendarJson = wscs_fetch_calendar_events( 3 );
?>

<main>

  <div class="row content-top">


      <div class="col s12 section-divider"><hr></div>

      <!-- start upcoming events info -->
      <div class="col s12 l4" id="dates">
        <div class="label"> <h2>Upcoming <br> Events</h2> </div>
            <?php
            if ( $calendarJson && ! empty( $calendarJson["items"] ) ) {
                foreach ($calendarJson["items"] as $event) {
                  $dateString = ! empty( $event["start"]["date"] ) ? $event["start"]["date"] : ( isset( $event["start"]["dateTime"] ) ? $event["start"]["dateTime"] : '' );
                  $date = date_create($dateString);
                  $formattedDate = $date ? date_format($date,"m/d/y") : '';
                  echo
                    '<div class="event">
                      <div class="info">' . esc_html( $formattedDate ) . '</div>
                      <div class="name"><b>' . esc_html( isset( $event["summary"] ) ? $event["summary"] : '' ) . '</b></div>
                      <div class="info">' . esc_html( isset( $event["location"] ) ? $event["location"] : '' ) . '</div>
                    </div>';
                }
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

