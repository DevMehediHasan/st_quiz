<?php
namespace Mehedi\BeatnikQuiz;

/**
 * Frontend handler
 */
class Frontend
{
	
	function __construct()
	{
		new Frontend\Shortcode();
		new Frontend\Quiz();
		new Frontend\Single();
	}
}