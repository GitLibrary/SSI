<?php

	define('ansiLimit', 30);
	require_once('ansi.php');

	$test = array('ZZZ','   1000','DASD231DASDA12Z','000000000000000','fdsad3!###','zzzzzzzzzzzzzzzz','edwaeqweq31321eae2131ea19');

	$ansi = new ANSI();

	foreach ($test as $v) {
	    echo '<pre>';
	    echo 'Old String - '.$v. '<br/>New String - '.$ansi->__getString($v). '<br/><br/>';
	    echo '</pre>';
	}

?>
