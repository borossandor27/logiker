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
