<?php
  class auto{
    var $tank;
    
    function getTank(){
      echo "Tank: $this->tank";
    }
  }

  $auto_1=new auto;
  $auto_1->tank="20";
  $auto_1->getTank();

?>