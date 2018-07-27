<html>
  <head>
    <meta charset="utf8">
    <title>Kalender</title>
  </head>
  <body>
    <?php
      $termin[] = array('Datum' => 20081208, 'Ort' => "Wangen", 'Band'=>'cOoL RoCkoPaS');
      $termin[] = array('Datum' => 20070311, 'Ort' => "Stuttgart", 'Band'=>'Die Hosenbodenband');
      $termin[] = array('Datum' => 20070628, 'Ort' => "Tübingen", 'Band'=>'flying socks');
      $termin[] = array('Datum' => 20070628, 'Ort' => "Stuttgart", 'Band'=>'flying socks');
    
      foreach ($termin as $nr => $inhalt) {
        $band[$nr] = $inhalt['Band'];
        $ort[$nr] = $inhalt['Ort'];
        $datum[$nr] = $inhalt['Datum'];
      }
      if(!empty($_GET['date'])){
        array_multisort($datum, SORT_ASC, $termin);
      }elseif(!empty($_GET['place'])){
        array_multisort($ort, SORT_ASC, $termin);
      }elseif(!empty($_GET['band'])){
        array_multisort($band, SORT_ASC, $termin);
      }

      function datum ( $datum ) {
        $jahr = substr ( $datum, 0, 4 );
        $monat = substr ( $datum, 4, 2 );
        $tag = substr ( $datum, -2 );
        $date = $tag .".". $monat .".". $jahr;
        return ( $date );
      }
    
    
      echo '<table>';
      foreach($termin as $inhalt){
        echo "<tr>";
        echo "<td>";
        echo $inhalt ['Band'];
        echo "</td><td>";
        echo $inhalt ['Ort'];
        echo " </td><td>";
        echo datum($inhalt['Datum']);
        echo "</td></tr>";
      }
      echo '</table>';
    
      echo '<form action="" method="">
          <input type="Submit" name="band" value="Band Sort">
          <input type="Submit" name="place" value="Place Sort">
          <input type="Submit" name="date" value="Date Sort">
        </form>';
    ?>
  </body>
</html>