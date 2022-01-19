<?php
namespace Mehedi\BeatnikQuiz\Frontend;

/**
 * shortcode
 */
class Shortcode
{
	
	function __construct()
	{
		add_shortcode('beatnik-quiz', [ $this, 'render_shortcode']);
	}

	public function render_shortcode( $atts, $content = '') {
		return 'Hello Shortcode';
	}
}