<?php

add_theme_support('menus');
add_theme_support('post-thumbnails');

function register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __('Primary WSCS Menu'),
    )
  );
}

add_action('init', 'register_theme_menus');

/**
 * Set default timezone for all templates.
 */
function wscs_set_timezone() {
  date_default_timezone_set('America/New_York');
}
add_action('init', 'wscs_set_timezone');

/**
 * Fetch upcoming calendar events from the Google Calendar API.
 *
 * @param int $max_results Maximum number of events to return.
 * @return array|null Decoded JSON array of calendar data, or null on failure.
 */
function wscs_get_calendar_events($max_results = 2) {
  $current_time = date('c');
  $calendar_url = 'https://www.googleapis.com/calendar/v3/calendars/women.at.scs@gmail.com/events'
    . '?key=AIzaSyCOUaXqxVzZfCLB5Hqk_1WJZupfo7IoWv4'
    . '&maxResults=' . intval($max_results)
    . '&timeMin=' . $current_time;

  $response = wp_remote_get($calendar_url);
  if (is_array($response)) {
    return json_decode($response['body'], true);
  }
  return null;
}

/**
 * Sort calendar events by start date (ascending).
 *
 * @param array $events Array of calendar event items.
 * @return array Sorted events array.
 */
function wscs_sort_calendar_events($events) {
  if (empty($events)) {
    return array();
  }
  usort($events, function ($a, $b) {
    $date_a = !empty($a['start']['date']) ? $a['start']['date'] : $a['start']['dateTime'];
    $date_b = !empty($b['start']['date']) ? $b['start']['date'] : $b['start']['dateTime'];
    return strtotime($date_a) - strtotime($date_b);
  });
  return $events;
}

function wscs_theme_styles() {
  wp_enqueue_style('materialize_css', get_template_directory_uri() . '/css/materialize.min.css');
  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('googlefont_css', 'https://fonts.googleapis.com/icon?family=Material+Icons');
  wp_enqueue_style('small_css', get_template_directory_uri() . '/css/small.css', array(), false, '(max-width:992px)');
  wp_enqueue_style('large_css', get_template_directory_uri() . '/css/large.css', array(), false, '(min-width:993px)');
}

add_action('wp_enqueue_scripts', 'wscs_theme_styles');

function wscs_theme_js() {
  wp_enqueue_script('materialize_js', get_template_directory_uri() . '/js/materialize.min.js', array('jquery'), '', true);
  wp_enqueue_script('main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'materialize_js'), '', true);
}

add_action('wp_enqueue_scripts', 'wscs_theme_js');

/**
 * Custom walker for large-screen (desktop) navigation menu.
 *
 * Outputs dropdown-based navigation compatible with Materialize CSS.
 */
class wscs_materializecss_large_walker extends Walker_Nav_Menu
{
  private $wscsCurItem;

  function start_lvl(&$output, $depth)
  {
    $indent = str_repeat("\t", $depth);
    $parentID = $this->wscsCurItem;
    $output .= "\n" . $indent . '<ul class="dropdown-content dropdown-top" id="child-of-' . $parentID . '">' . "\n";
  }

  function start_el(&$output, $item, $depth, $args)
  {
    $currentId = $this->wscsCurItem = $item->ID;

    global $wp_query;
    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $class_names = '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $class_names . '>';

    $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

    if ($depth == 0) {
      $attributes .= (esc_attr($item->url) == 'https://www.women.cs.cmu.edu/test-site')
        ? ''
        : ' class="wscs-dropdown" data-activates="child-of-' . $currentId . '"';
    }

    $prepend = '<strong>';
    if (esc_attr($item->url) == 'https://www.women.cs.cmu.edu/test-site') {
      $append = '</strong><i class="material-icons right"></i>';
    } else {
      $append = '</strong><i class="material-icons right">arrow_drop_down</i>';
    }
    $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';

    if ($depth != 0) {
      $description = $append = $prepend = "";
    }

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
    $item_output .= $description . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

/**
 * Custom walker for small-screen (mobile) navigation menu.
 *
 * Outputs collapsible navigation compatible with Materialize CSS.
 */
class wscs_materializecss_small_walker extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth)
  {
    $indent = str_repeat("\t", $depth);
    $output .= "\n" . $indent . '<div class="collapsible-body"><ul>';
  }

  function end_lvl(&$output, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div></ul></li>\n";
  }

  function start_el(&$output, $item, $depth, $args)
  {
    global $wp_query;
    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $class_names = '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $output .= $indent . '<li class="no-padding"> <ul class="collapsible collapsible-accordion">';
    $output .= '<li id="menu-item-' . $item->ID . '"' . $class_names . '>';

    $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

    $prepend = '<strong>';
    $append = '</strong>';
    $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';

    if ($depth != 0) {
      $description = $append = $prepend = "";
    }

    $item_output = $args->before;
    $item_output .= '<a class="collapsible-header"' . $attributes . '>';
    $item_output .= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
    $item_output .= $description . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

function envira_gallery_image_titles($output, $id, $item, $data, $i) {
  $galleriesToShowTitles = array(260);

  if (!in_array($data['id'], $galleriesToShowTitles)) {
    return $output;
  }

  if (isset($item['title'])) {
    $output .= '<h3 style="padding-top: 0.25rem; text-align: center; display: block; letter-spacing: 0.5px; font-size: 1.25rem;">' . $item['title'] . '</h3>';
  }

  return $output;
}
add_action('envira_gallery_output_after_link', 'envira_gallery_image_titles', 10, 5);

function modify_read_more_link() {
  return '<a class="button" href="' . get_permalink() . '">Read Full Story</a>';
}
add_filter('the_content_more_link', 'modify_read_more_link');
add_filter('wp_nav_menu_items', 'add_search_box', 1, 2);

function get_search_form_custom($echo = true) {
  do_action('pre_get_search_form');

  $format = current_theme_supports('html5', 'search-form') ? 'html5' : 'xhtml';
  $format = apply_filters('search_form_format', $format);

  $search_form_template = locate_template('searchform.php');
  if ('' != $search_form_template) {
    ob_start();
    require($search_form_template);
    $form = ob_get_clean();
  } else {
    if ('html5' == $format) {
      $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label>
          <span class="screen-reader-text">' . _x('Search for:', 'label') . '</span>
          <input type="search" class="search-field" placeholder="Search" value="' . get_search_query() . '" name="s" />
        </label>
        <input type="submit" class="search-submit" value="' . esc_attr_x('Search', 'submit button') . '" />
      </form>';
    } else {
      $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url('/')) . '">
        <div>
          <input type="text" class="search-input" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
        </div>
      </form>';
    }
  }

  $result = apply_filters('get_search_form', $form);
  if (null === $result) {
    $result = $form;
  }
  if ($echo) {
    echo $result;
  } else {
    return $result;
  }
}

function add_search_box($items, $args) {
  $items .= '<li class="searchbox-position">' . get_search_form_custom(false) . '</li>';
  return $items;
}

?>
