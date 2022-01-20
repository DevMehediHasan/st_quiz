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

		$this->dispatch_actions($quiz,$question);
		new Admin\Menu( $quiz);

		// $this->dispatch_actions_question($question);
		// new Admin\Menu( $question );

	}

	/**
	 * dispatch and bind actions
	 * 
	 * @return void
	 */
	public function dispatch_actions($quiz){
		
		add_action( 'admin_init', [$quiz, 'form_handler'] );
		add_action( 'admin_post_bt_delete_quiz', [$quiz, 'delete_quiz'] );
	}

	// public function dispatch_actions_question($question){
		
	// 	add_action( 'admin_init', [$question, 'form_handler'] );
	// }
}