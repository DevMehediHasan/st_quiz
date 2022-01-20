<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('New Quiz', 'studiox-quiz'); ?></h1>

	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=studiox-quiz'); ?>"><?php _e('Back', 'studiox-quiz'); ?></a>

	<?php //var_dump($this->errors); ?>
	<form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<table class="form-table">
			<tbody>
				<tr class="row">
					<th scope="row">
						<label for="title"><?php _e('Title', 'studiox-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title" id="title" class="regular-text" value="">

					</td>
				</tr>

				<tr>
					<th scope="row">
						<input type="hidden" name="action" value="image"/>
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
						<input type="text" name="title_one" id="title_one" class="regular-text" value="">
						<input type="file" name="image_one" id="image_one" class="regular-text" value="">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<input type="hidden" name="action" value=""/>
						<label for="image_two"><?php _e('Seceond Image / Title', 'studiox-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title_two" id="title_two" class="regular-text" value="">
						<input type="file" name="image_two" id="image_two" class="regular-text" value="">
					</td>
				</tr>

			</tbody>
		</table>

		<?php wp_nonce_field( 'new-quiz' ); ?>
		<?php submit_button( __( 'Add Quiz', 'studiox-quiz' ), 'primary', 'submit_quiz' ); ?>
	</form>

</div>
</body>
</html>


<script type="text/javascript">
	

</script>