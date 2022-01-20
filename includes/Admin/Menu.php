<?php
namespace Mehedi\BeatnikQuiz\Admin;

use Mehedi\BeatnikQuiz\Admin\Question;
/**
 * the menu handler
 */
class Menu
{

	public $quiz;

	public $question;
	
	function __construct($quiz)
	{
		$this->quiz = $quiz;
		$this->question = $question;
		add_action('admin_menu', [$this, 'admin_menu']);
	}

	public function admin_menu(){
		$parent_slug ='studiox-quiz';
		$capability ='manage_options';
		add_menu_page( __( 'Beatnik Quiz', 'studiox-quiz'), __( 'Quizes', 'studiox-quiz' ), $capability, $parent_slug, [ $this->quiz, 'plugin_page'], 'dashicons-games' );

		add_submenu_page($parent_slug, __('Quizes', 'studiox-quiz'), __('Quizes', 'studiox-quiz'), $capability, $parent_slug, [$this->quiz, 'plugin_page']);

	}
}