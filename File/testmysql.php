<?php
	$dsn  =  'mysql:dbname=test;host=localhost' ;
	$user  =  'xxx' ;
	$password  =  '1' ;

	try {
		$dbh  = new  PDO ( $dsn ,  $user ,  $password );
		$data =$dbh->prepare('select * from x');
		$data -> execute ();
		$x =  $data->fetch();
		var_dump($x);

	} catch ( PDOException $e ) {
		echo  'Connection failed: '  .  $e -> getMessage ();
	}

?>