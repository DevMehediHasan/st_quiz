<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Edit Quiz', 'studiox-quiz'); ?></h1>

	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=studiox-quiz'); ?>"><?php _e('Back', 'studiox-quiz'); ?></a>
	
	<?php
	var_dump($quiz);
	?>
	<form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<table class="form-table">
		<?php
                global $wpdb;
                global $result;
                $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}st_quizes" );

            ?>
			
			<?php //foreach( $result as $quizes) { ?>
			<tbody>
			<?php print_r($quizes); ?>
				<tr class="row">
					<th scope="row">
						<label for="title"><?php _e('Title', 'studiox-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title" id="title" class="regular-text" value="<?php  echo esc_attr($quizes->title); ?>">

					</td>
				</tr>

				<tr>
					<th scope="row">
						<input type="hidden" name="action" value="<?php  echo esc_attr($quizes->image); ?>"/>
						<label for="image"><?php _e('Featured Image', 'studiox-quiz'); ?></label>
					</th>

					<td>
						<input type="file" name="image" id="image" class="regular-text" value="">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<input type="hidden" name="action" value=""/>
						<label for="image_one"><?php _e('First Image / Title', 'studiox-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title_one" id="title_one" class="regular-text" value="<?php  echo esc_attr($quizes->title_one); ?>">
						<input type="file" name="image_one" id="image_one" class="regular-text" value="">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<input type="hidden" name="action" value=""/>
						<label for="image_two"><?php _e('Seceond Image / Title', 'studiox-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title_two" id="title_two" class="regular-text" value="<?php  echo esc_attr($quizes->title_two); ?>">
						<input type="file" name="image_two" id="image_two" class="regular-text" value="">
					</td>
				</tr>

			</tbody>
			<?php //} ?>
		</table>

		<?php wp_nonce_field( 'new-quiz' ); ?>
		<?php submit_button( __( 'Update Quiz', 'studiox-quiz' ), 'primary', 'submit_quiz' ); ?>
	</form>

</div>
</body>
</html>


<script type="text/javascript">
	

</script>