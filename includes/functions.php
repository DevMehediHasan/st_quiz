<?php 

function bt_insert_quiz( $args = []){
	global $wpdb;

	if ( empty($args['title'])){
		return new \WP_Error( 'no-title', __('You must provide a title.', 'beatnik-quiz'));
	}

	$defaults = [
		'title'			=> '',
		'image'			=> '',
		'image_one'		=> '',
		'image_two'		=> '',
		'created_at'	=> current_time('mysql'),
	];

	$data = wp_parse_args( $args, $defaults);


	$inserted = $wpdb->insert(
		"{$wpdb->prefix}st_quizes",
		$data,
		[
			'%s',
			'%s',
			'%s',
			'%s',
			'%s'
		]
	);

	if (! $inserted) {
		return new \WP_Error('failed-to-insert', __('Failed to insert data', 'beatnik-quiz'));
	}
	return $wpdb->insert_id;
}

function bt_get_quizes( $args= []) {
	global $wpdb;

	$defaults  = [
		'number' => 20,
		'offset' => 0,
		'orderby' => 'id',
		'order' => 'DESC'
	];

	$args = wp_parse_args( $args, $defaults);

	$items = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}st_quizes
			ORDER BY %s %s
			LIMIT %d, %d",
			$args['orderby'],$args['order'],$args['offset'],$args['number']
		)
	);
	return $items;
}

function bt_quiz_count(){
	global $wpdb;

	return (int) $wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}st_quizes");
}

function bt_get_quiz( $id ) {
	global $wpdb;

	return $wpdb->get_row(
		$wpdb->prepare("SELECT * FROM {$wpdb->prefix}st_quizes WHERE id = %d", $id )
	);
}

function bt_delete_quiz($id){
	global $wpdb;
	return $wpdb->delete(
		$wpdb->prefix . 'st_quizes',
		['id' => $id],
		['%d']
	);
}