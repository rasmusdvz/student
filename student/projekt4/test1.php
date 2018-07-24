<html>
  <head>
    <meta charset="utf-8">
    <title>php Test</title>
  </head>
  <body>
    <?php
      $name=$_GET['name'];
      $vorname=$_GET['vorname'];
      $visited=$_GET['visited'];
      if(!empty($visited)){
        if((empty($name)||empty($vorname))){
          echo "Daten unzureichend";
        }else{
          echo "Die Daten sind gespeichert";
          echo "<br \>$vorname $name";
          $handle=fopen("texttest.txt","w");
          fwrite($handle,$vorname);
          fclose($handle);
        }
      }
      echo "<p>$ann</p>";
      echo '<form action="" method="">
              <p>Name</p>
              <input type="text" name="name" value="" size="30" maxlength="50">
              <p>Vorname</p>
              <input type="text" name="vorname" value="" size="30" maxlength="50">
               <input type="hidden" name="visited" value="1">
              <input type="Submit" value="Absenden">
            </form>';
    ?>
    
  </body>
</html>