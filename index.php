<?php

	// Set a length limit for string which is going to be sequencially incremented
	define('ansiLimit', 30);

	// link ANSI class with your code
	require_once('ansi.php');

	// Different set of values for testing
	$test = array(
			'ZZZ','   1000','DASD231DASDA12Z','000000000000000','zzzzzzzzzzzzzzzz','edwaeqweq31321eae2131ea19',
			'rweQW324eq321CDG','fdsad3!###'
			);

	// Creating an object
	$ansi = new ANSI();

	foreach ($test as $v) {
	    echo '<pre>';
	    echo 'Old String - '.$v. '<br/>New String - '.$ansi->__getString($v). '<br/><br/>';
	    echo '</pre>';
	}

?>
