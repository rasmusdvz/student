<?php
  error_reporting(E_ALL);
  ini_set("display_startup_errors", "On");
  ini_set("display_errors", "On");
  define ( 'MYSQL_HOST', 'localhost' );
  define ( 'MYSQL_BENUTZER', 'root' );
  define ( 'MYSQL_KENNWORT', '' );
  define ( 'MYSQL_DATENadressen' );
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
  /*$sql = "
  CREATE TABLE `adressentest` (
  `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `nachname` VARCHAR( 150 ) NOT NULL ,
  `vorname` VARCHAR( 150 ) NULL ,
  `akuerzel` VARCHAR( 2 ) NOT NULL ,
  `strasse` VARCHAR( 150 ) NULL ,
  `plz` INT( 5 ) NOT NULL ,
  `telefon` VARCHAR( 20 ) NULL
  ) ENGINE = MYISAM ;
  ";*/

  $sql="
  INSERT INTO `adressentest`(
  `id` , `nachname` , `vorname` , `akuerzel` , `strasse` , `plz` , `telefon`)
  VALUES(
  NULL , 'Pratuner', 'Alex', 'w', NULL , '72470', '07571-77..'
  );
  ";
 $db_erg = mysqli_query($db_link, $sql) or die("Anfrage fehlgeschlagen: " . mysqli_error());
/*$db_erg = mysqli_query($db_link, "select * from adressentest") or die("Anfrage fehlgeschlagen: " . mysqli_error());
  echo "<p>Success</p>";
  $erg_arr = array();
  while ($row = $db_erg->fetch_object()){
        $erg_arr[] = $row;
  }
  // Free result set
  $db_erg->close();
  echo "<pre>" . var_export($erg_arr, true) . "</pre>";*/
?>