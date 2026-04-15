<?php

/**
 * Echos a table displaying the calendar events.
 *
 * Executes a prepared statement and displays the results in an HTML table.
 * All output is escaped with htmlspecialchars() to prevent XSS.
 *
 * Required columns: date, endDate, startTime, endTime, location, title,
 *                   description, audience
 *
 * @param mysqli        $mysqli          an active MySQLi connection
 * @param string        $query           a parameterised SQL query (use ? placeholders)
 * @param array         $params          values to bind (may be empty)
 * @param string        $param_types     MySQLi type string, e.g. "ss" (may be empty)
 * @param string        $empty_message   message when no results are returned
 *
 * @author Lucy Li <lucyl@andrew> 2010-11-11 (original)
 */

function echo_calendar_events( $mysqli, $query, $params, $param_types, $empty_message ) {
    $stmt = $mysqli->prepare( $query );
    if ( ! $stmt ) {
        echo '<p>' . htmlspecialchars( $empty_message, ENT_QUOTES, 'UTF-8' ) . '</p>';
        return;
    }

    if ( ! empty( $params ) ) {
        $stmt->bind_param( $param_types, ...$params );
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ( $result && $result->num_rows > 0 ) {
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

        while ( $row = $result->fetch_assoc() ) {
            echo ' <tr>
                <td class="calendar_when">
                    ' . htmlspecialchars( $row['date'], ENT_QUOTES, 'UTF-8' );

            if ( $row['endDate'] ) {
                echo '&ndash;' . htmlspecialchars( $row['endDate'], ENT_QUOTES, 'UTF-8' );
            }

            if ( $row['startTime'] !== '00:00:00' ) {
                $startTime = date( 'g:iA', strtotime( $row['startTime'] ) );
                echo '<br>' . htmlspecialchars( $startTime, ENT_QUOTES, 'UTF-8' );

                if ( $row['endTime'] ) {
                    $endTime = date( 'g:iA', strtotime( $row['endTime'] ) );
                    echo '-' . htmlspecialchars( $endTime, ENT_QUOTES, 'UTF-8' );
                }
            }

            $location = $row['location'] ? $row['location'] : 'N/A';

            echo '</td>
                <td class="calendar_event">
                <p class="calendar_event_title">';

            if ( ! empty( $row['link'] ) ) {
                echo '<p><a href="' . htmlspecialchars( $row['link'], ENT_QUOTES, 'UTF-8' )
                     . '" target="_blank">' . htmlspecialchars( $row['title'], ENT_QUOTES, 'UTF-8' ) . '</a></p>';
            } else {
                echo '<p><b>' . htmlspecialchars( $row['title'], ENT_QUOTES, 'UTF-8' ) . '</b></p>';
            }

            echo '
                    <p>' . htmlspecialchars( $row['description'], ENT_QUOTES, 'UTF-8' ) . '</p>
                </td>
                <td class="calendar_where">
                    ' . htmlspecialchars( $location, ENT_QUOTES, 'UTF-8' ) . '
                </td>
                <td class="calendar_who">
                    ' . htmlspecialchars( $row['audience'], ENT_QUOTES, 'UTF-8' ) . '
                </td>
             </tr>';
        }

        echo '</tbody>
        </table>';
    } else {
        echo '<p>' . htmlspecialchars( $empty_message, ENT_QUOTES, 'UTF-8' ) . '</p>';
    }

    $stmt->close();
} // end of echo_calendar_events()

?>
