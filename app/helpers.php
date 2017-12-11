<?php

function dateConvert($date) { 
	if ( ! strstr( $date, '/' ) ) {
		sscanf($date, '%d-%d-%d', $y, $m, $d); 
		return sprintf('%02d/%02d/%04d', $d, $m, $y); 
	} else {
		sscanf($date, '%d/%d/%d', $d, $m, $y); return sprintf('%04d-%02d-%02d', $y, $m, $d); 
	} 

	return false; 
}

function calculateAge($birthdate) { 
	$now = new DateTime(); 
	$diff = $now->diff(new DateTime($birthdate));
      
    return $diff->y;
}

function sayHello() {
    echo "Hello World";
}