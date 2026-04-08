<?php

/**
 * Echos a table displaying the calendar events.
 *
 * Uses the WordPress $wpdb abstraction layer instead of deprecated mysql_*
 * functions.  The caller is responsible for passing a safe query built with
 * $wpdb->prepare().
 *
 * Required columns: date, endDate, startTime, endTime, location, title,
 *                   description, audience
 * Optional columns: link
 *
 * @param array  $results        Array of row objects returned by $wpdb->get_results().
 * @param string $empty_message  Message to display when no results are returned.
 *
 * @author Lucy Li <lucyl@andrew> 2010-11-11
 */

function echo_calendar_events($results, $empty_message) {
    if ( ! empty( $results ) ) {
        // table header
        echo '<table cellspacing="10" cellpadding="5" border="0" width="100%">
         <thead>
         <tr>
            <th class="calendar_when">When</th>
            <th class="calendar_event">Women@SCS Event</th>
            <th class="calendar_where">Where</th>
            <th class="calendar_who">Who</th>
         </tr>
         </thead>

         <tbody>';

        // display the events
        foreach ( $results as $row ) {
            $row = (array) $row;

            echo ' <tr>
                <td class="calendar_when">
                    ' . esc_html($row['date']); // start date
                    if ( ! empty($row['endDate']) )
                        echo '&ndash;' . esc_html($row['endDate']); // end date

                     // show start and end times if applicable
                    if ( isset($row['startTime']) && $row['startTime'] !== '00:00:00' ) {
                        $startTime = date('g:iA', strtotime($row['startTime']));
                        echo '<br>' . esc_html($startTime);

                        if ( ! empty($row['endTime']) ) {
                            $endTime = date('g:iA', strtotime($row['endTime']));
                            echo '-' . esc_html($endTime);
                        }
                    }

            $location = ! empty($row['location']) ? $row['location'] : 'N/A';

            echo '</td>
                <td class="calendar_event">
                <p class="calendar_event_title">';
                if ( ! empty($row['link']) )
                    echo '<p><a href="' . esc_url($row['link']) . '" target="_blank">' . esc_html($row['title']) . '</a></p>';
                else
                    echo '<p><b>' . esc_html($row['title']) . '</b></p>';
            echo '
                    <p>' . esc_html($row['description']) . '</p>
                </td>
                <td class="calendar_where">
                    ' . esc_html($location) . '
                </td>
                <td class="calendar_who">
                    ' . esc_html($row['audience']) . '
                </td>
             </tr>';
        }

        echo '</tbody>
        </table>';
    }

    // no events
    else {
        echo '<p>' . esc_html($empty_message) . '</p>';
    }
} // end of echo_calendar_events()

?>
