<?php
require( './connect-to-database.php' );

$sql2 = 'CREATE TABLE IF NOT EXISTS aluminiDetails( ' .
'alumini_id INT UNSIGNED NOT NULL AUTO_INCREMENT ,'.
'image_url VARCHAR(60) NOT NULL ,'.
'name VARCHAR(20) NOT NULL ,'.
'admin_no VARCHAR(20) NOT NULL ,'.
'house VARCHAR(20) ,'.
'date_of_birth DATE NOT NULL ,'.
'current_town_of_residence VARCHAR(20) NOT NULL ,'.
'year_of_completion VARCHAR(4) NOT NULL ,'.
'occupation VARCHAR(20) ,'.
'place_of_work VARCHAR(20) NOT NULL ,'.
'user_id VARCHAR(20) NOT NULL,'.
'PRIMARY KEY ( alumini_id ) )';

$creation_successful = mysqli_query( $dbc, $sql2 ) === TRUE;
?>
