<?php

	require_once('stringsequence.php');

	// values for testing
	$test = array(
			'ZZZ','   1000','DASD231DASDA12Z','000000000000000','zzzzzzzzzzzzzzzz','edwaeqweq31321eae2131ea19',
			'rweQW324eq321CDG','fdsad3!###'
			);

	foreach ($test as $v) {
	    echo '<pre>';
	    echo 'Old String - '.$v. '<br/>New String - '.StringSequence::Incrementor($v). '<br/><br/>';
	    echo '</pre>';
	}


?>
