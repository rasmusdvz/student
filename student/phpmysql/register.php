<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <style>
      body{
        font-size: 2em;
        text-align: center;
        vertical-align: center;
      }
    </style>
  </head>
  <body>
    <h1>
      Registrierung <br><br>
    </h1>
    <?php
      $login=FALSE;
      function nameNotTaken($name,$db_erg){
        while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC)){
          if($name==$zeile['name']){
            return FALSE;
          }
        }
        return TRUE;
      }
    
      if($_POST['visited']==1&&!empty($_POST['name'])&&!empty($_POST['password'])){
        error_reporting(E_ALL);
        ini_set("display_startup_errors", "On");
        ini_set("display_errors", "On");
        define ( 'MYSQL_HOST', 'localhost' );
        define ( 'MYSQL_BENUTZER', 'root' );
        define ( 'MYSQL_KENNWORT', '' );
        define ( 'MYSQL_DATENBANK', 'data' );
        try {
          $db_link = mysqli_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);
        } catch (Exception $e) {
          echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
        }
        if ( !$db_link ){
          die('keine Verbindung möglich: ' . mysqli_error($db_link));
        }
        mysqli_select_db($db_link, MYSQL_DATENBANK )
        or die("Auswahl der Datenbank fehlgeschlagen");
        $sql = "
          SELECT
          *
          FROM login
          ORDER BY id
          ";
        $db_erg = mysqli_query($db_link, $sql) or die("Anfrage fehlgeschlagen: " . mysqli_error($db_link));
        if(nameNotTaken($_POST['name'],$db_erg)){
          
          $sql="
          INSERT INTO `login`(
          `id` , `name` , `password` )
          VALUES(
          NULL , '".$_POST['name']."', '".$_POST['password']."');
          ";
         $db_erg = mysqli_query($db_link, $sql) or die("Anfrage fehlgeschlagen: " . mysqli_error($db_link));
         echo '<div class="alert alert-success" role="alert"><p>Erfolgreich registriert!</p></div>';
         $login=TRUE;
        }else{
          echo '<div class="alert alert-danger" role="alert"><p>Dieser Name existiert bereits.</p></div>';
        }
     }else if($_POST['visited']==1){
        echo '<div class="alert alert-danger" role="alert"><p>Die Daten sind unzureichend.</p></div>';
      }
     if(!$login){
     echo '<form action="" method="POST">
            <p>Benutzername</p>
            <input type="text" name="name" value="" size="30" maxlength="50">
            <p>Passwort</p>
            <input type="password" name="password" value="" size="30" maxlength="50">
            <input type="hidden" name="visited" value="1">
            <p><input type="Submit" value="Absenden"></p>
          </form>';
     }
     echo '<a href="http://apache-php7-mysql-phpmyadmin-rasmus381710.codeanyapp.com/student/phpmysql/session.php">Zum Login</a>';
    
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  
  </body>
</html>