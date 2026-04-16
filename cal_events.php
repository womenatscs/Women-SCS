<?php

/**
 * Echos a table displaying the calendar events.
 *
 * Uses a mysqli prepared statement to safely execute the query.
 * All output is escaped with htmlspecialchars() to prevent XSS.
 *
 * @param mysqli  $mysqli            an active mysqli connection
 * @param string  $query             the MySQL query to run (use ? placeholders for parameters)
 * @param array   $params            array of parameter values to bind (empty array if none)
 * @param string  $param_types       mysqli type-string for the parameters (e.g. "ss")
 * @param string  $empty_message     message to display when no results are returned
 *
 * @author Lucy Li <lucyl@andrew> 2010-11-11
 */

function echo_calendar_events($mysqli, $query, $params, $param_types, $empty_message) {
    $stmt = $mysqli->prepare($query);
    if ( ! $stmt ) {
        error_log('cal_events: prepare() failed – ' . $mysqli->error);
        echo '<p>' . esc( $empty_message ) . '</p>';
        return;
    }

    if ( ! empty($params) ) {
        $stmt->bind_param($param_types, ...$params);
    }

    if ( ! $stmt->execute() ) {
        error_log('cal_events: execute() failed – ' . $stmt->error);
        echo '<p>' . esc( $empty_message ) . '</p>';
        $stmt->close();
        return;
    }

    $result = $stmt->get_result();
    $count  = $result->num_rows;

    if ($count > 0) {
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
        while ($row = $result->fetch_assoc()) {
            echo ' <tr>
                <td class="calendar_when">
                    ' . esc($row['date']); // start date
                    if ($row['endDate'])
                        echo '&ndash;' . esc($row['endDate']); // end date

                     // show start and end times if applicable
                    if ($row['startTime'] != "00:00:00") {
                        $startTime = date('g:iA', strtotime($row['startTime']));
                        echo '<br>' . esc($startTime);

                        if ($row['endTime']) {
                            $endTime = date('g:iA', strtotime($row['endTime']));
                            echo '-' . esc($endTime);
                        }
                    }

            if (!$row['location'])
                $row['location'] = "N/A";

            echo '</td>
                <td class="calendar_event">
                <p class="calendar_event_title">';
                if (isset($row['link']) && $row['link'])
                    echo '<p><a href="' . esc($row['link']) . '" target="_blank">' . esc($row['title']) . '</a></p>';
                else
                    echo '<p><b>' . esc($row['title']) . '</b></p>';
            echo '
                    <p>' . esc($row['description']) . '</p>
                </td>
                <td class="calendar_where">
                    ' . esc($row['location']) . '
                </td>
                <td class="calendar_who">
                    ' . esc($row['audience']) . '
                </td>
             </tr>';
        }

        echo '</tbody>
        </table>';
    }

    // no events
    else {
        echo '<p>' . esc( $empty_message ) . '</p>';
    }

    $stmt->close();
} // end of echo_calendar_events()

/**
 * Helper: escape a string for safe HTML output.
 */
function esc($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

?>
