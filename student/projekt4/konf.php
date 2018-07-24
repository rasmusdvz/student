<?php
error_reporting(E_ALL);
define ( 'MYSQL_HOST', 'localhost' );
define ( 'MYSQL_BENUTZER', 'root' );
define ( 'MYSQL_KENNWORT', '' );
define ( 'MYSQL_DATENBANK', 'addressen' );
$db_link = mysql_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);
if ( $db_link ){
  echo 'Verbindung erfolgreich: ';
  echo $db_link;
}else{
  die('keine Verbindung möglich: ' . mysql_error());
}
mysql_close($db_link );
?>