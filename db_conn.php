<pre>
<?php
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSW', '');
	define('DB', 'met');


function db_connect(){
	$link = mysqli_connect(HOST, USER, PASSW, DB) or die(mysqli_error());
	return $link;	
}

$link = db_connect();
?>