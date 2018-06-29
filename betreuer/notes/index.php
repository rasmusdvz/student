<?php

define('PHP_DIR', 'php');
//error_reporting(E_ALL);
error_reporting(E_ALL | E_STRICT);
setlocale(LC_TIME, 'de_DE.utf8'); // Locale muss auf dem Server installiert sein (vbox!). Fuer Ausgabe Wochentag
ini_set("display_startup_errors", "On");
ini_set("display_errors", "On");
spl_autoload_register(function($class) {
  $className = $class;
  $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  if (strpos($class, "//") !== FALSE) {
    list($fae, $className) = explode("//", $class, 2);
  } else if (strpos($class, "\\") !== FALSE) {
    list($fae, $className) = explode("\\", $class, 2);
  }
  include "php/$className.php";
});
$phpProperties = array();
// Die Reihenfolge ist entscheidend!
// wer zuerst steht, ueberschreibt andere, wenn der
// request nach einer property gefragt wird.
foreach (array(
"server" => $_SERVER,
 "get" => $_GET,
 "post" => $_POST,
 "session" => &$_SESSION,
 "cookie" => &$_COOKIE,
 "files" => &$_FILES,
 "request" => &$_REQUEST,
) as $arrayName => $arr) {
  if (is_array($arr)) {
    $phpProperties[$arrayName] = $arr;
  }
}

$request = Request::getSingleInstance($phpProperties);
Zeit::setRequestStartzeit();
echo View::create()->getResponse();
