<?php 
include_once(__DIR__ . "Classes/KalenderBody.php");
require_once('bootstrap.php');
require_once('includes/header.inc.php');
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Lightpath</title>
    <link rel="stylesheet" href="./CSS/Kalender.css">
    <script src="./JS/Kalender.js"></script>
  </head>
  <body>
    <!-- (A) PERIOD SELECTOR -->
    <div id="calPeriod"><?php
      //Maand sellector
      $months = [
        1 => "januari", 2 => "februari", 3 => "maart", 4 => "april",
        5 => "mei", 6 => "juni", 7 => "juli", 8 => "augustus",
        9 => "september", 10 => "oktober", 11 => "november", 12 => "december"
      ];
      $monthNow = date("m");
      echo "<select id='calmonth'>";
      foreach ($months as $m=>$mth) {
        printf("<option value='%s'%s>%s</option>",
          $m, $m==$monthNow?" selected":"", $mth
        );
      }
      echo "</select>";
      //Jaar sellector
      echo "<input type='number' id='calyear' value='".date("Y")."'/>";
    ?></div>

    <div id="calwrap"></div>

    <?php 
    //Formulier om event in te plannen
    //Alleen als er ingelogged is door een van de klanten wordt dit getoont
    ?>
      <div id="calblock">
        <form id="calform">
          <input type="hidden" name="req" value="opslaan"/>
          <input type="hidden" id="evtid" name="eid"/>
          <label for="start">Date Start</label>
          <input type="datetime-local" id="evtstart" name="start" required/>
          <label for="end">Date End</label>
          <input type="datetime-local" id="evtend" name="end" required/>
          <label for="txt">Event</label>
          <textarea id="evttxt" name="txt" required></textarea>
          <label for="color">Color</label>
          <input type="color" id="evtcolor" name="color" value="#e4edff" required/>
          <input type="submit" id="calformsave" value="Opslaan"/>
          <input type="button" id="calformdel" value="Verwijderen"/>
          <input type="button" id="calformcx" value="Annuleren"/>
        </form>
      </div>
    <?php
    ?>
  </body>
</html>
