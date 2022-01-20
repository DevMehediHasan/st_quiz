<?php
namespace Mehedi\BeatnikQuiz;

class Installer
{
    public function run()
    {
        $this->add_version();
        $this->create_tables();
    }

    public function add_version()
    {
        $installed = get_option('bt_quiz_installed');

        if ( !$installed ) {
            update_option('bt_quiz_installed', time());
        }
        update_option('bt_quiz_version', BT_QUIZ_VERSION);
    }
    public function create_tables()
    {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema= "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}st_quizes` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `image` varchar(255) DEFAULT NULL,
                `title` varchar(255) DEFAULT NULL,
                `title_one` varchar(255) DEFAULT NULL,
                `image_one` varchar(255) DEFAULT NULL,
                `title_two` varchar(255) DEFAULT NULL,
                `image_two` varchar(255) DEFAULT NULL,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) $charset_collate";

            if ( !function_exists('dbDelta')) {
                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            }

            dbDelta($schema);
    }
}
