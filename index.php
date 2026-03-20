<?php get_header();
    date_default_timezone_set('EST');
    $calendarJson = wscs_fetch_calendar_events( 2 );
?>

<main>

	<div class="col s12 section-divider"></div>

  <?php
    $postctr = 0;
    global $more;
  ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ( $postctr === 0 ): ?>
			<div class="row news-section">

        		<div class="col s12 14 post">
                <?php
                  if ( has_post_thumbnail() ) {
                    echo '<div class="image feature" style="background-image:url(' . get_the_post_thumbnail_url()
                      . ');">';
                    echo '<div class="content feature">';
                    echo '<h3 class="feature-title">' . get_the_title() . '</h3>';
                    echo '<h4 class="feature-date">' . get_the_date() . '</h4>';
                    echo '<div class="hide-on-small">' . get_the_content() . '</div>';
                    echo '</div>
                      </div>';
                  }
                  else {
                    echo '<div class="image feature" style="background-image:url(' . get_bloginfo( 'stylesheet_directory' )
                      . '/img/feature.jpeg)">';
                    echo '<div class="content feature">';
                    echo '<h3 class="feature-title">' . get_the_title() . '</h3>';
                    echo '<h4>' . get_the_date() . '</h4>';
                    echo '<div class="hide-on-small">' . get_the_content() . '</div>';
                    echo '</div>
                      </div>';
                  }
                ?>

        	</div>
		    </div>
		    <!-- TODO: hacky way of starting next row -->
		    <div class="row news-section posts-row2">
			<?php $postctr = $postctr + 1; ?>
      <?php elseif ($postctr < 4): {
        echo '<div class="col s12 l4 post post' . $postctr . '">';
        echo sprintf(
          '<a class="post-link" href="%s">', esc_url(get_permalink()));
        if ( has_post_thumbnail() ) {
            echo '<div class="image thumbnail" style="background-image:url(' . get_the_post_thumbnail_url()
              . ')">';
            echo sprintf(
              '<div class="content full-width">
                      <h5>%s</h5>', the_title('','',false));
            echo sprintf('<i>%s</i>
                    </div>', get_the_date());
            echo '</div></a>';
        }
        else {
            echo '<div class="image thumbnail" style="background-image:url(' . get_bloginfo( 'stylesheet_directory' )
              . '/img/feature.jpeg)">';
            echo sprintf(
              '<div class="content full-width">
                      <h5>%s</h5>', the_title('','',false));
            echo sprintf('<i>%s</i>
                    </div>', get_the_date());
            echo '</div></a>';
        }
        $postctr = $postctr + 1;
        echo '</div>';
      }?>
	    <?php endif; ?>
	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

      <!-- start mobile upcoming events info -->
      <div class="col s12 l4 label" id="dates">
        <div class="upcoming-events"> Upcoming Events </div>
            <?php
            if ( $calendarJson && ! empty( $calendarJson["items"] ) ) {
                usort($calendarJson["items"], function($a, $b) {
                  $dateStringA = ! empty( $a["start"]["date"] ) ? $a["start"]["date"] : ( isset( $a["start"]["dateTime"] ) ? $a["start"]["dateTime"] : '' );
                  $dateStringB = ! empty( $b["start"]["date"] ) ? $b["start"]["date"] : ( isset( $b["start"]["dateTime"] ) ? $b["start"]["dateTime"] : '' );
                  $currSeconds = time();
                  return strtotime($dateStringA) - $currSeconds < strtotime($dateStringB) - $currSeconds ? -1 : 1;
                });

                foreach ($calendarJson["items"] as $event) {
                    $dateString = ! empty( $event["start"]["date"] ) ? $event["start"]["date"] : ( isset( $event["start"]["dateTime"] ) ? $event["start"]["dateTime"] : '' );
                    $date = date_create($dateString);
                    $formattedDate = $date ? date_format($date,"l, M j") : '';
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
      <!-- end mobile upcoming events info -->
	<!-- TODO: hacky way of ending row -->
</div>
</main>

<?php get_footer('index'); ?>
