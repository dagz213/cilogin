<h1>Test Page</h1>
<div id="body">
	<?php
		foreach ($tests as $test) {
			echo $test->testname . '</br>';
		}
	?>
</div>

<input id="testName" type="text" name="testName">
<input id="insertTestButton" type="button" value="Insert">
<p id="message"></p>

<p><a href="registration">Not Registered yet? Click here</a></p>
