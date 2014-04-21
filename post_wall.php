<?php
	/**
	 * Prints Postwall
	 *
	 * A postwall contains of post-teasers ordered in two columns (main, side) with two post columns within the main
	 * column. Posts to show, have to be accessible through the_post().
	 *
	 * First row contains of two posts, following row contain three posts:
	 * 	+ posts = 3 * rows - 1;
	 * 	+ rows = (posts + 1) / 3;
	 */

	$ROW_START = '<div class="columns row"><div class="columns-wrapper">'.PHP_EOL;
	$ROW_END = '</div></div>'.PHP_EOL;
	$COLUMN_LEFT = '<div class="left column">'.PHP_EOL;
	$COLUMN_RIGHT = '<div class="right column">'.PHP_EOL;
	$COLUMN_END = '</div>'.PHP_EOL;

	/**
	 * Prints the next post
	 *
	 * @param  String $column_markup column container markup (1 div)
	 */
	function print_next_post($column_markup) {
		global $COLUMN_END, $post, $post_count, $current_post_count;

		if ($current_post_count < $post_count) {
			$current_post_count += 1;

			echo $column_markup;

			the_post();
			print_post_teaser($post);

			echo $COLUMN_END;
		}
	}

	/**
	 * Prints a row with two columns
	 */
	function print_row() {
		global $COLUMN_LEFT, $COLUMN_RIGHT, $ROW_START, $ROW_END;

		echo $ROW_START;

		print_next_post($COLUMN_LEFT);
		print_next_post($COLUMN_RIGHT);

		echo $ROW_END;
	}

	$current_post_count = 0;
	// current post count of teasers
	$post_count = $wp_query->post_count;

	$total_rows = ceil($post_count + 1) / 2;
	// foreach two rows, one right row
	$right_rows = floor($total_rows / 2);
	$left_rows = ($total_rows - $right_rows);

	// POST WALL

	echo $ROW_START;
?>
	<div id="column-main" class="left column">

		<?php
			// MAIN COLUMN (LEFT)

			// Latest
			print_next_post('<div id="latest">');

			for ($i = 0; $i < $right_rows; $i++) {
				print_row();
			}
		?>

	</div>

	<div id="column-side" class="right column">

		<?php
			// SIDE COLUMN (RIGHT)

			// print uneven posts in sidebar
			for ($i = 0; $i < $left_rows; $i++) {
				print_row();
			}
		?>

	</div>
<?php
	echo $ROW_END;
?>