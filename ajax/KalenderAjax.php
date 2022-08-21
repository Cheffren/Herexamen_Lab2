<?php
//INVALID AJAX REQUEST
if (!isset($_POST["req"])) { exit("INVALID REQUEST"); }
require "../Classes/KalenderBody.php";
switch ($_POST["req"]) {
  //DRAW CALENDAR FOR MONTH
  case "draw":
    //DATE RANGE CALCULATIONS
    //aantal dagen in de maand
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST["month"], $_POST["year"]);
    //eerste en laatste dag van de maand
    $firstDayMonth = "{$_POST["year"]}-{$_POST["month"]}-01";
    $lastDayMonth = "{$_POST["year"]}-{$_POST["month"]}-{$daysInMonth}";
    //dag van de week - 0 is zondag
    $firstDayWeek = (new DateTime($firstDayMonth))->format("w");
    $lastDayWeek = (new DateTime($lastDayMonth))->format("w");

    $sunIsFirstDay = false;
    $days = ["maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag"];
    if ($sunIsFirstDay) { array_unshift($days, "zondag"); }
    else { $days[] = "zondag"; }
    foreach ($days as $d) { echo "<div class='calsq head'>$d</div>"; }
    unset($days);

    //PAD EMPTY SQUARES BEFORE FIRST DAY OF MONTH
    if ($sunIsFirstDay) { $pad = $firstDayWeek; }
    else { $pad = $firstDayWeek==0 ? 6 : $firstDayWeek-1 ; }
    for ($i=0; $i<$pad; $i++) { echo "<div class='calsq blank'></div>"; }

    //DRAW DAYS IN MONTH
    $events = $_CAL->get($_POST["month"], $_POST["year"]);
    $currentMonth = date("n");
    $currentYear = date("Y");
    $currentDay = ($currentMonth==$_POST["month"] && $currentYear==$_POST["year"]) ? date("j") : 0 ;
    for ($day=1; $day<=$daysInMonth; $day++) { ?>
    <div class="calsq day<?=$day==$currentDay?" today":""?>" data-day="<?=$day?>">
      <div class="calnum"><?=$day?></div>
        <?php if (isset($events["d"][$day])) { foreach ($events["d"][$day] as $eid) { ?>
        <div class="calevt" data-eid="<?=$eid?>"
             style="background:<?=$events["e"][$eid]["evt_color"]?>">
          <?=$events["e"][$eid]["evt_text"]?>
        </div>
        <?php if ($day == $events["e"][$eid]["first"]) {
          echo "<div id='evt$eid' class='calninja'>".json_encode($events["e"][$eid])."</div>";
        }}} ?>
    </div>
    <?php }

    //PAD EMPTY SQUARES AFTER LAST DAY OF MONTH
    if ($sunIsFirstDay) { $pad = $lastDayWeek==0 ? 6 : 6-$lastDayWeek ; }
    else { $pad = $lastDayWeek==0 ? 0 : 7-$lastDayWeek ; }
    for ($i=0; $i<$pad; $i++) { echo "<div class='calsq blank'></div>"; }
    break;

  //SAVE EVENT
  case "save":
    if (!is_numeric($_POST["eid"])) { $_POST["eid"] = null; }
    echo $_CAL->save(
      $_POST["start"], $_POST["end"], $_POST["txt"], $_POST["color"],
      isset($_POST["eid"]) ? $_POST["eid"] : null
    ) ? "OK" : $_CAL->error ;
    break;

  //DELETE EVENT
  case "del":
    echo $_CAL->del($_POST["eid"])  ? "OK" : $_CAL->error ;
    break;
}

/*
  We hebben deze tutorial gevolgt: https://code-boxx.com/simple-php-calendar-events/ 
*/