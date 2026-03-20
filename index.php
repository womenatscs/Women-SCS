<?php get_header(); ?>

<?php $calendar = wscs_get_calendar_events(2); ?>

<main>

	<div class="col s12 section-divider"></div>

  <?php
    $postctr = 0;
    global $more;
  ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ( $postctr === 0 ): ?>
			<div class="row news-section">

        		<div class="col s12 l4 post">
                <?php
                  $featured_image = has_post_thumbnail()
                    ? get_the_post_thumbnail_url()
                    : get_bloginfo('stylesheet_directory') . '/img/feature.jpeg';
                ?>
                <div class="image feature" style="background-image:url(<?php echo $featured_image; ?>);">
                  <div class="content feature">
                    <h3 class="feature-title"><?php echo get_the_title(); ?></h3>
                    <h4 class="feature-date"><?php echo get_the_date(); ?></h4>
                    <div class="hide-on-small"><?php echo get_the_content(); ?></div>
                  </div>
                </div>

        	</div>
		    </div>
		    <div class="row news-section posts-row2">
			<?php $postctr++; ?>
      <?php elseif ($postctr < 4): {
        $thumbnail_image = has_post_thumbnail()
          ? get_the_post_thumbnail_url()
          : get_bloginfo('stylesheet_directory') . '/img/feature.jpeg';

        echo '<div class="col s12 l4 post post' . $postctr . '">';
        echo sprintf('<a class="post-link" href="%s">', esc_url(get_permalink()));
        echo '<div class="image thumbnail" style="background-image:url(' . $thumbnail_image . ')">';
        echo sprintf(
          '<div class="content full-width">
            <h5>%s</h5>', the_title('', '', false));
        echo sprintf('<i>%s</i>
          </div>', get_the_date());
        echo '</div></a>';
        echo '</div>';
        $postctr++;
      }?>
	    <?php endif; ?>
	<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

      <!-- Upcoming events -->
      <div class="col s12 l4 label" id="dates">
        <div class="upcoming-events">Upcoming Events</div>
            <?php
            if ($calendar && !empty($calendar['items'])) {
              $events = wscs_sort_calendar_events($calendar['items']);
              foreach ($events as $event) {
                $dateString = !empty($event['start']['date']) ? $event['start']['date'] : $event['start']['dateTime'];
                $date = date_create($dateString);
                $formattedDate = date_format($date, "l, M j");
                echo '<div class="event">
                  <div class="info">' . $formattedDate . '</div>
                  <div class="name"><b>' . $event['summary'] . '</b></div>
                  <div class="info">' . ($event['location'] ?? '') . '</div>
                </div>';
              }
            }
	        ?>
      </div>
</div>
</main>

<?php get_footer('index'); ?>
