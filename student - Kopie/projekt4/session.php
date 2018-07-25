<html>
  <head>
    <meta charset="utf-8">
    <title>Session Login</title>
  </head>
  <body>
    <?php
      session_start();
      
      if($_POST['name']=="hallo"&&$_POST['password']=="welt"){
        $_SESSION['eingeloggt']=TRUE;
      }else{
        $_SESSION['eingeloggt']=FALSE;
      }
        
      if($_SESSION['eingeloggt']){
        echo '<p>Hallo Welt</p>';
        echo 'Sie sind eingeloggt';
      }else{
        if($_GET['visited']==1){
          echo '<p>Daten falsch</p>';
        }
        echo '<form action="" method="POST">
              <p>Benutzername</p>
              <input type="text" name="name" value="" size="30" maxlength="50">
              <p>Passwort</p>
              <input type="text" name="password" value="" size="30" maxlength="50">
               <input type="hidden" name="visited" value="1">
              <input type="Submit" value="Absenden">
            </form>';
      }
      
    ?>
  </body>
</html>