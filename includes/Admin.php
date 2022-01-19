<?php
namespace Mehedi\BeatnikQuiz;

/**
 * admin class
 */
class Admin
{
	
	function __construct()
	{
		$quiz = new Admin\Quiz();
		$question = new Admin\Question();

		$this->dispatch_actions($quiz,$question);
		new Admin\Menu( $quiz, $question );

		// $this->dispatch_actions_question($question);
		// new Admin\Menu( $question );

	}

	/**
	 * dispatch and bind actions
	 * 
	 * @return void
	 */
	public function dispatch_actions($quiz,$question){
		
		add_action( 'admin_init', [$quiz, 'form_handler'] );
		add_action( 'admin_post_bt_delete_quiz', [$quiz, 'delete_quiz'] );
		add_action( 'admin_init', [$question, 'form_handler_question'] );
		add_action( 'admin_post_bt_delete_question', [$question, 'delete_question'] );
	}

	// public function dispatch_actions_question($question){
		
	// 	add_action( 'admin_init', [$question, 'form_handler'] );
	// }
}