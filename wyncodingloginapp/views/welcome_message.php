<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script src="js/jquery.js"></script>
	<script src="js/posts.js"></script>
</head>
<body>

<div id="container">
	<h1>Test Page</h1>
	<h1 id="h01"></h1>
	<div id="body">
		<?php
			foreach ($tests as $test) {
				echo $test->testname . '</br>';
			}
		?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>