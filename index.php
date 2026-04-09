<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    $calendarApiUrl = wscs_get_calendar_api_url( 'women.at.scs@gmail.com', 2 );
    $calendarEventsRequest = $calendarApiUrl ? wp_remote_get( $calendarApiUrl . $currentTime ) : array();
    if ( is_array( $calendarEventsRequest ) ) {
        $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
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
	        	$json = json_decode($calendarEvents, true);
            // var_dump($json["items"]);

            usort($json["items"], function($a, $b) { //Sort the array using a user defined function
              $dateStringA = $a["start"]["date"] ? $a["start"]["date"] : $a["start"]["dateTime"];
              $dateStringB = $b["start"]["date"] ? $b["start"]["date"] : $b["start"]["dateTime"];
              $currSeconds = strtotime(time());
              return strtotime($dateStringA) - $currSeconds < strtotime($dateStringB) - $currSeconds ? -1 : 1; //Compare the scores
            });

            // var_dump($json["items"]);
            foreach ($json["items"] as $event) {
	        		$dateString = $event["start"]["date"] ? $event["start"]["date"] : $event["start"]["dateTime"];
	        		$date = date_create($dateString);
	        		$formattedDate = date_format($date,"l, M j");
	        		echo
	        			'<div class="event">
	        				<div class="info">' . esc_html( $formattedDate ) . '</div>
	        				<div class="name"><b>' . esc_html( $event["summary"] ) . '</b></div>
	        				<div class="info">' . esc_html( $event["location"] ) . '</div>
	        			</div>';
	        	}
	        ?>
      </div>
      <!-- end mobile upcoming events info -->
	<!-- TODO: hacky way of ending row -->
</div>
</main>

<?php get_footer('index'); ?>
