
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Edit Quiz', 'beatnik-quiz'); ?></h1>

	<a class="page-title-action" href="<?php echo admin_url('admin.php?page=beatnik-quiz'); ?>"><?php _e('Back', 'beatnik-quiz'); ?></a>


    <?php if (isset($_GET['quiz-updated'])) { ?>
			<div class="notice notice-success">
				<p><?php _e('Quiz has been updated Successfully!', 'beatnik-quiz'); ?></p>
			</div>
		<?php } ?>

	<?php //var_dump($this->errors); ?>
	<form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<table class="form-table">
			<tbody>
            <?php
                global $wpdb;
                global $result;
                $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}quizes ");

                $quizes = $result;
            ?>
				<tr class="row">
					<th scope="row">
						<label for="title"><?php _e('Title', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<input type="text" name="title" id="title" class="regular-text" value="<?php echo esc_attr($quizes->title); ?>">

					</td>
				</tr>

				<tr>
					<th scope="row">
						<input type="hidden" name="action" value="image"/>
						<label for="image"><?php _e('Featured Image', 'beatnik-quiz'); ?></label>
					</th>

					<td>
						<input type="file" name="image" id="image" class="regular-text" value="">
					</td>
				</tr>
                
			</tbody>
		</table>

		<?php wp_nonce_field( 'new-quiz' ); ?>
		<?php submit_button( __( 'Update Quiz', 'beatnik-quiz' ), 'primary', 'submit_quiz' ); ?>
	</form>

</div>
</body>
</html>


<script type="text/javascript">
	

</script>