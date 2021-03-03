<?php

// $db = new mysqli("localhost" , "root" , "12345678" , "blogcms");
// if (!$db){
// 	echo 'error db';
// }
$link = mysqli_connect("localhost" , "root" , "12345678" , "blogcms");
if (!$link){
	echo 'error link';
}
	// mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>