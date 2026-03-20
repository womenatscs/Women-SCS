<?php get_header(); ?>

<?php $calendar = wscs_get_calendar_events(2); ?>

<main>

  <div class="col s12 section-divider"></div>
  <div class="wscs-page-content">
    <?php if ( have_posts() ) : ?>
      <header class="search-page-header">
        <span class="page-title">
          <b>Search Results for "<?php echo get_search_query(); ?>"</b>
        </span>
      </header>

      <?php while ( have_posts() ) : the_post(); ?>
        <article class="search-post">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php the_excerpt(); ?>
        </article>
      <?php endwhile; ?>

    <?php else : ?>
      <header class="search-page-header">
        <span class="page-title">
          <b>Search Results for "<?php echo get_search_query(); ?>"</b>
        </span>
      </header>
      <p class="no-results"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
