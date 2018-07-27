<?php
 function setComma($comma){
   if($comma){
    echo ',';
   }
   return TRUE;
 }

 function nestJSON($key,$value,$comma){
   if(count($value)>1){
      foreach ($value as $downkey => $valuedown){
        nestJSON($key."_".$downkey,$valuedown,$comma);
      }
    }else{
     $comma=setComma($comma);
     $value=addslashes($value);
     echo '"'.$key.'":"'.$value.'"';
    }
   return $comma;
 }

 if(!isset($_GET['path'])){
  $path="http://apache-php7-mysql-phpmyadmin-rasmus381710.codeanyapp.com/student/bootstraptable/logs/filebeat-tomcat-log-events.json";
 }else{
  $path=urldecode($_GET['path']);
 }
 $json = json_decode(file_get_contents($path),true);
 echo '[';
 $first=FALSE;
 foreach($json as $row){
   $comma=FALSE;
   $first=setComma($first);
   echo '{';
   foreach($row as $key => $value){
    $comma=nestJSON($key,$value,$comma);
   }
   echo '}';
 }
 echo ']';
?>