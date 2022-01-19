<?php

/** 
 * Plugin Name:       Studiox Quiz
 * Plugin URI:        https://github.com/DevMehediHasan
 * Description:       Quiz manage for WordPress Developed by Beatnik Technology.
 * Version:           1.0
 * Author:            Mehedi Hasan
 * Author URI:        https://github.com/DevMehediHasan
 * License:           GPL2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       studiox-quiz
 * Domain Path:       /languages
 */

if (defined('abspath')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

final class Studiox_Quiz {
    /**
    * plugin version
    *
    * @var string
    */
    const version = '1.0';

    /**
     * class constructor
     */
    
    private function __construct() {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);

        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * @return \Studiox_Quiz
     */
    public static function init() {
        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }
        return $instance;
    }

    /**
    *define the required plugin constants
    *
    *@return void
    */

    public function define_constants() {
        define('BT_QUIZ_VERSION', self::version);
        define('BT_QUIZ_FILE', __FILE__);
        define('BT_QUIZ_PATH', __DIR__);
        define('BT_QUIZ_URL', plugins_url('', BT_QUIZ_FILE));
        define('BT_QUIZ_ASSETS', BT_QUIZ_URL . '/assets');
        // define('BT_QUIZ_TEMPLATE', BT_QUIZ_TEMPLETE . '/includes');
    }

    public function init_plugin(){
        new Mehedi\BeatnikQuiz\Assets();
        if (is_admin()) {
            new Mehedi\BeatnikQuiz\Admin();
        } else {
            new Mehedi\BeatnikQuiz\Frontend();
        }
        
    }
    /**
    *do stuff upon activation
    *
    *@return void
    */
    public function activate(){
        $installer = new Mehedi\BeatnikQuiz\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 *
 *@ @return \Studiox_Quiz
 */
 function studiox_quiz(){
    return Studiox_Quiz::init();
 }

studiox_quiz();