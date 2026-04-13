<?php /* Template Name: Photo Gallery */ ?>
<?php get_header();
    $calendarEvents = wscs_fetch_calendar_events( 3, false, 'xiangyiqisara@gmail.com' );
?>

<main>

  <div class="row content-top">


      <div class="col s12 section-divider"><hr></div>

      <!-- start upcoming events info -->
      <div class="col s12 l4" id="dates">
        <div class="label"> <h2>Upcoming <br> Events</h2> </div>
            <?php
            $json = json_decode($calendarEvents, true);
            if ( ! empty( $json["items"] ) ) {
            foreach ($json["items"] as $event) {
              $dateString = isset($event["start"]["date"]) ? $event["start"]["date"] : $event["start"]["dateTime"];
              $date = date_create($dateString);
              $formattedDate = date_format($date,"m/d/y");
              echo 
                '<div class="event">
                  <div class="info">' . esc_html( $formattedDate ) . '</div>
                  <div class="name"><b>' . esc_html( $event["summary"] ) . '</b></div>
                  <div class="info">' . esc_html( $event["location"] ) . '</div>
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

