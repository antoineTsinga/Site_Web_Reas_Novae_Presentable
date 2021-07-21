<?php
/*define('HOST', 'localhost');
define('DB_NAME', 'mydb');
define('USER', 'root');
define('PASS', 'root');*/
	try
	{
		//$db = new PDO('mysql:host=". HOST . ";dbname=" . DB_NAME, USER, PASS');
		
		$db = new PDO('mysql:host=localhost;dbname=dbresnovae;charset=utf8;port=3306', 'root', 'root');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 }
catch(PDOException $e)
{
die('Erreur : '.$e->getMessage());
}

 ?>