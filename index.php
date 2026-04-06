<?php get_header();
    $json = wscs_fetch_calendar_events( 2 );
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
            <?php wscs_render_calendar_events( $json, 'l, M j', true ); ?>
      </div>
      <!-- end mobile upcoming events info -->
	<!-- TODO: hacky way of ending row -->
</div>
</main>

<?php get_footer('index'); ?>
