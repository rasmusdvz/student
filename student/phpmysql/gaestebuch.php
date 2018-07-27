<?php
  error_reporting(E_ALL);
  ini_set("display_startup_errors", "On");
  ini_set("display_errors", "On");
  define ( 'MYSQL_HOST', 'localhost' );
  define ( 'MYSQL_BENUTZER', 'root' );
  define ( 'MYSQL_KENNWORT', '' );
  define ( 'MYSQL_DATENBANK', 'gaestebuch' );
  try {
    $db_link = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);
  } catch (Exception $e) {
    echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
  }
  if ( $db_link ){
    echo 'Verbindung erfolgreich: ';   
  }else{
    die('keine Verbindung möglich: ' . mysqli_error());
  }
  mysqli_select_db($db_link, MYSQL_DATENBANK )
  or die("Auswahl der Datenbank fehlgeschlagen");
  
  $sql = "
    SELECT
    *
    FROM daten
    ORDER BY datum
    ";
  
  $db_erg = mysqli_query($db_link, $sql) or die("Anfrage fehlgeschlagen: " . mysqli_error());
  print_r($db_erg);
  

?>