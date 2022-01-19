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
	
	function __construct($quiz, $question)
	{
		$this->quiz = $quiz;
		$this->question = $question;
		add_action('admin_menu', [$this, 'admin_menu']);
	}

	public function admin_menu(){
		$parent_slug ='beatnik-quiz';
		$capability ='manage_options';
		add_menu_page( __( 'Beatnik Quiz', 'beatnik-quiz'), __( 'Quizes', 'beatnik-quiz' ), $capability, $parent_slug, [ $this->quiz, 'plugin_page'], 'dashicons-games' );

		add_submenu_page($parent_slug, __('Quizes', 'beatnik-quiz'), __('Quizes', 'beatnik-quiz'), $capability, $parent_slug, [$this->quiz, 'plugin_page']);

		//add_submenu_page($parent_slug, __('Question', 'beatnik-quiz'), __('Questions', 'beatnik-quiz'), $capability, 'beatnik-question', [$this->question, 'bt_question_page']);
	}

	
	// public function beatnik_question_page(){
		
	// 	// $question = new Question;

	// 	// $question->bt_question_page();


		
	// }
}