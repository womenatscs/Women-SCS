<?php

/**
 * Echos a table displaying the calendar events.
 *
 * Uses a prepared statement to prevent SQL injection. Requires a mysqli
 * connection obtained via $wpdb->dbh (WordPress) or mysqli_connect().
 *
 * Query must contain the following fields to display correctly:
 *      date, endDate, startTime, endTime, location, title, description, audience
 *
 * @param string $query             the MySQL query to run (use $wpdb->prepare or parameterised queries)
 * @param string $empty_message     message to display when no results are returned
 *
 * @author Lucy Li <lucyl@andrew> 2010-11-11
 */

function echo_calendar_events($query, $empty_message) {
    global $wpdb;
    $result = $wpdb->get_results($query, ARRAY_A);

    if (!empty($result)) {
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
        foreach ($result as $row) {
            echo ' <tr>
                <td class="calendar_when">
                    ' . esc_html($row['date']); // start date
                    if ($row['endDate'])
                        echo '&ndash;' . esc_html($row['endDate']); // end date

                     // show start and end times if applicable
                    if ($row['startTime'] != "00:00:00") {
                        $startTime = date('g:iA', strtotime($row['startTime']));
                        echo '<br>' . esc_html($startTime);

                        if ($row['endTime']) {
                            $endTime = date('g:iA', strtotime($row['endTime']));
                            echo '-' . esc_html($endTime);
                        }
                    }

            if (!$row['location'])
                $row['location'] = "N/A";

            echo '</td>
                <td class="calendar_event">
                <p class="calendar_event_title">';
                if (isset($row['link']) && $row['link'])
                    echo '<p><a href="' . esc_url($row['link']) . '" target="_blank">' . esc_html($row['title']) . '</a></p>';
                else
                    echo '<p><b>' . esc_html($row['title']) . '</b></p>';
            echo '
                    <p>' . esc_html($row['description']) . '</p>
                </td>
                <td class="calendar_where">
                    ' . esc_html($row['location']) . '
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
