<?php
namespace Mehedi\BeatnikQuiz\Frontend;

/**
 * 
 */
class Single
{
	

	function __construct(){
		add_shortcode('single-quizes', [$this, 'render_shortcode_single']);
	}

	public function render_shortcode_single( $atts, $content = '') {
		wp_enqueue_script('jquery-script');
		//wp_enqueue_script('owl-carousel-script');
		wp_enqueue_script('bootstrap-script');
		//wp_enqueue_style('owl-carousel-style');
		//wp_enqueue_style('owl-carousel-default-style');
		wp_enqueue_style('bootstrap-style');


		ob_start();
		include __DIR__ . '/views/single-quiz.php';

		return ob_get_clean();
	}
}