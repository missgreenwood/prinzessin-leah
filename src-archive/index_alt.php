<!DOCTYPE html>

<html>

	<head>
		
		<!-- INDEX END -->
		<!-- HEADER.PHP (POSTS) -->

	</head>


	<body>

		<?php

			echo "This is a PHP String. Yeah!";
			$show_trueVersion = false;

			echo "<h1>This is " . $show_trueVersion . " version</h1>";

		?>


		<?php if ($show_trueVersion == true): ?>


			<h1>This is true version</h1>


		<?php else: ?>

			<?php the_title(); ?>


			<?php 
				echo "<h1>This is false version</h1>";
				echo "<p>".
					"\tlorem ispum".
					"</p>";

				$title = get_the_title();
				echo '<h2>('.$title.')</h2>';
				
				var_dump($post);
			?>

		<?php endif; ?> /		

	<!-- FOOTER: -->
	</body>

</html>


