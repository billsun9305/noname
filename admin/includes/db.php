<?php

	// $db = new mysqli("localhost" , "root" , "12345678" , "blogcms");
	// if (!$db){
	// 	echo 'error db';
	// }

	$link = mysqli_connect("localhost" , "root" , "12345678" , "blogcms");
	if (!$link){
		echo 'admin link error';
	}
?>