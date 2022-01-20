<?php
namespace Mehedi\BeatnikQuiz;

/**
 * 
 */
class Assets
{
	
	function __construct()
	{
		add_action('wp_enqueue_scripts', [$this, 'register_assets']);
		add_action('admin_enqueue_scripts', [$this, 'register_assets']);
	}

	public function get_scripts() {
		return[
			'jquery-script' => [
				'src'	=> BT_QUIZ_ASSETS . '/js/jquery.min.js',
				'version' => filemtime(BT_QUIZ_PATH . '/assets/js/jquery.min.js'),
				'deps'		=> ['jquery']
			],
			'bootstrap-script' => [
				'src'	=> BT_QUIZ_ASSETS . '/js/bootstrap.min.js',
				'version' => filemtime(BT_QUIZ_PATH . '/assets/js/bootstrap.min.js'),
				'deps'		=> ['jquery']
			]
		];
	}

	public function get_styles() {
		return[
			'bootstrap-style' => [
				'src'	=> BT_QUIZ_ASSETS . '/css/bootstrap.min.css',
				'version' => filemtime(BT_QUIZ_PATH . '/assets/css/bootstrap.min.css')
			]
		];
	}

	public function register_assets() {
		$scripts = $this->get_scripts();
		$styles = $this->get_styles();

		foreach ( $scripts as $handle => $script) {
			$deps = isset($script['deps']) ? $script['deps'] : false;

			wp_register_script( $handle, $script['src'], $deps, $script['version'], true);
		}

		
		foreach ( $styles as $handle => $style) {
			$deps = isset($style['deps']) ? $style['deps'] : false;

			wp_register_style( $handle, $style['src'], $deps, $style['version']);
		}

	}
}