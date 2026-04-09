<?php

/**
 * Echos a table displaying the calendar events.
 *
 * Uses WordPress $wpdb for safe, parameterized database queries.
 * All output is escaped with esc_html() / esc_url() to prevent XSS.
 *
 * @param string $table             the database table name
 * @param string $where_clause      optional WHERE clause (without 'WHERE') using $wpdb->prepare() placeholders
 * @param array  $where_values      values to bind into the WHERE clause placeholders
 * @param string $empty_message     message to display when no results are returned
 *
 * @author Lucy Li <lucyl@andrew> 2010-11-11
 */

function echo_calendar_events($table, $empty_message, $where_clause = '', $where_values = array()) {
    global $wpdb;

    $table_name = $wpdb->prefix . sanitize_key($table);

    if (!empty($where_clause) && !empty($where_values)) {
        $sql = $wpdb->prepare(
            "SELECT date, endDate, startTime, endTime, location, title, description, audience, link FROM $table_name WHERE $where_clause",
            $where_values
        );
    } else {
        $sql = "SELECT date, endDate, startTime, endTime, location, title, description, audience, link FROM $table_name";
    }

    $results = $wpdb->get_results($sql, ARRAY_A);

    if ($results && count($results) > 0) {
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
        foreach ($results as $row) {
            echo ' <tr>
                <td class="calendar_when">
                    ' . esc_html($row['date']);
                    if ($row['endDate'])
                        echo '&ndash;' . esc_html($row['endDate']);

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
