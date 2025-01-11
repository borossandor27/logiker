<?php
/*
Plugin Name: Custom Schedule
Description: Adatrögzítés és órarend megjelenítés WordPress-ben.
Version: 1.0
Author: Boros Sándor
*/

// Egyedi táblák létrehozása az adatbázisban
register_activation_hook(__FILE__, 'custom_schedule_install');
function custom_schedule_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'schedule_data';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        event_name varchar(255) NOT NULL,
        event_date date NOT NULL,
        event_time time NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

add_shortcode('data_entry', 'custom_data_entry_form');
function custom_data_entry_form() {
    // Ellenőrizzük, hogy az űrlapot elküldték-e
    if (isset($_POST['submit'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'schedule_data';

        // Adatok mentése az adatbázisba
        $wpdb->insert(
            $table_name,
            [
                'event_name' => sanitize_text_field($_POST['event_name']),
                'event_date' => sanitize_text_field($_POST['event_date']),
                'event_time' => sanitize_text_field($_POST['event_time'])
            ]
        );

        echo '<p>Adatok sikeresen rögzítve!</p>';
    }

    // Űrlap megjelenítése
    ob_start();
    ?>
    <form method="POST">
        <label for="event_name">Esemény neve:</label>
        <input type="text" name="event_name" id="event_name" required>
        <label for="event_date">Dátum:</label>
        <input type="date" name="event_date" id="event_date" required>
        <label for="event_time">Időpont:</label>
        <input type="time" name="event_time" id="event_time" required>
        <button type="submit" name="submit">Mentés</button>
    </form>
    <?php
    return ob_get_clean();
}

add_shortcode('schedule_display', 'custom_schedule_display');
function custom_schedule_display() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'schedule_data';
    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY event_date, event_time");

    ob_start();
    ?>
    <table>
        <thead>
            <tr>
                <th>Esemény neve</th>
                <th>Dátum</th>
                <th>Időpont</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo esc_html($row->event_name); ?></td>
                <td><?php echo esc_html($row->event_date); ?></td>
                <td><?php echo esc_html($row->event_time); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    return ob_get_clean();
}
