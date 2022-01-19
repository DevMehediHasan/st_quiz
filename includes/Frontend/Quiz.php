<?php
namespace Mehedi\BeatnikQuiz\Frontend;

/**
 * 
 */
class Quiz
{
	

	function __construct(){
		add_shortcode('beatnik-quizes', [$this, 'render_shortcode']);
	}

	public function render_shortcode( $atts, $content = '') {
		// wp_enqueue_script('owl-carousel-script');
		//wp_enqueue_script('bootstrap-script');
		// wp_enqueue_style('owl-carousel-style');
		//wp_enqueue_style('bootstrap-style');

		ob_start();
		include __DIR__ . '/views/quiz.php';

		return ob_get_clean();
	}
}