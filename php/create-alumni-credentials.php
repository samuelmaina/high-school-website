<?php
require( './connect-to-database.php' );


$sql = 'CREATE TABLE IF NOT EXISTS aluminiCredentials( ' .
'user_id INT UNSIGNED NOT NULL AUTO_INCREMENT ,' .
'username VARCHAR(20) NOT NULL ,' .
'email VARCHAR(30) NOT NULL ,' .
'password VARCHAR(100) NOT NULL ,' .
'PRIMARY KEY ( user_id ) ) ' ;

$aluminiCredentials_creation_success = mysqli_query( $dbc, $sql ) === TRUE;

?>