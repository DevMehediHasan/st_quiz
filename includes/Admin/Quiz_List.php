<?php
namespace Mehedi\BeatnikQuiz\Admin;

if ( ! class_exists('WP_List_Table')) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class Quiz_List extends \WP_List_Table
{
	
	function __construct()
	{
		parent:: __construct([
			'singular' => 'quiz',
			'plural' => 'quizes',
			'ajax' => false
		]);

	}
	public function get_columns(){
		return [
			'cb'	=>	'<input type="checkbox"/>',
			'title' =>	__('Title', 'beatnik-quiz'),
			// 'image' =>	__('Image', 'beatnik-quiz'),
			'created_at' =>	__('Date', 'beatnik-quiz'),
		];
	}

	protected function column_default( $item, $column_name) {
		switch ($column_name) {
			case 'value':
				# code...
				break;
			
			default:
				return isset($item->$column_name) ? $item->$column_name : '';
		}
	}

	public function column_title( $item){
		$actions = [];

		$actions['edit'] = sprintf('<a href="%s" title="%s">%s</a>', admin_url('admin.php?page=beatnik-quiz&action=edit&id' . $item->id), $item->id, __('Edit', 'beatnik-quiz'));

		$actions['delete'] = sprintf('<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url(admin_url('admin-post.php?action=bt_delete_quiz&id=' . $item->id), 'bt_delete_quiz'), $item->id, __('Delete', 'beatnik-quiz'), __('Delete', 'beatnik-quiz'));

		return sprintf(
			'<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url('admin.php?page=beatnik-quiz&action=view&id' . $item->id), $item->title, $this->row_actions($actions) 
		);
	}

	protected function column_cb($item) {
		return sprintf(
			'<input type="checkbox" name="quiz_id[]" value="%d"/>', $item->id
		);
	}

	public function prepare_items() {
		$column = $this->get_columns();
		$hidden = [];
		$sortable = $this->get_sortable_columns();

		$per_page = 10;

		$this->_column_headers = [ $column, $hidden, $sortable ];

		$this->items = bt_get_quizes();
		$this->set_pagination_args( [
			'total_items'	=>	bt_quiz_count(),
			'per_page'		=>	$per_page
		]);
	}
}