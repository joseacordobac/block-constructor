<?php


add_action('init', 'create_new_table_status_class');

function create_new_table_status_class() {
    global $wpdb;

    $tabla_nombre = $wpdb->prefix . 'completedTable';
    $tabla_existe = $wpdb->get_var("SHOW TABLES LIKE '$tabla_nombre'") === $tabla_nombre;

    if (!$tabla_existe) {
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $tabla_nombre (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            user_id BIGINT(20) UNSIGNED NOT NULL,
            class_id BIGINT(20) UNSIGNED NOT NULL,
            tax_id VARCHAR(250) UNSIGNED NOT NULL,
            status BOOLEAN DEFAULT FALSE,
						date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}
