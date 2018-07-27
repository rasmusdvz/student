<html>
  <head>
    <meta charset="utf-8">
    <title>Session Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <style>
      body{
        font-size: 2em;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>
      Login <br><br>
    </h1>
    <?php
      function loginValid($name,$password,$db_erg){
        while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC)){
          if($name==$zeile['name']&&$password==$zeile['password']){
            return TRUE;
          }
        }
        return FALSE;
      }
      session_start();
      if (!isset($_SESSION['eingeloggt'])||$_POST['logout']==1){
        $_SESSION['eingeloggt']=FALSE;
        $_SESSION['name']=NULL;
        $_POST['visited']=0;
      }
      if($_POST['visited']==1&&$_SESSION['eingeloggt']!=TRUE){
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
        if(loginValid($_POST['name'],$_POST['password'],$db_erg)){
          $_SESSION['eingeloggt']=TRUE;
          $_SESSION['name']=$_POST['name'];
        }else{
          echo '<div class="alert alert-danger" role="alert"><p>Die Daten sind falsch.</p></div>';
        }
      }
      if($_SESSION['eingeloggt']){
        echo '<div class="alert alert-success" role="alert">Sie sind eingeloggt, '. $_SESSION['name'].'</div>';
        echo '<form action="" method="POST">
              <input type="hidden" name="logout" value="1">
              <p><input type="Submit" value="Logout"></p> 
              </form>';
      }else{
      echo '<form action="" method="POST">
              <p>Benutzername</p>
              <input type="text" name="name" value="" size="30" maxlength="50">
              <p>Passwort</p>
              <input type="password" name="password" value="" size="30" maxlength="50">
              <input type="hidden" name="visited" value="1">
              <p><input type="Submit" value="Absenden"></p>
            </form>
            <a href="http://apache-php7-mysql-phpmyadmin-rasmus381710.codeanyapp.com/student/phpmysql/register.php">Registrieren</a>';
      }
      
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  
  </body>
</html>