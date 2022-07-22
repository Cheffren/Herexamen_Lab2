<?php
include_once(__DIR__ . "/Classes/Kalender.php");


// Set your timezone
date_default_timezone_set('Europe/Brussels'); //Hier staat de tijdszone

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / m', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<a><td></td></a>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        $week .= '<a><td class="today">' . $day;
    } else {
        $week .= '<a><td>' . $day;
    }
    $week .= '</td></a>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<a><tr>' . $week . '</tr></a>';

        // Prepare for new week
        $week = '';
    }

}









if(!empty($_POST)) {
    $kalender = new Kalender();
     $kalender->setStart($_POST['start']);
    $kalender->setEnd($_POST['end']);
    $kalender->setDescription($_POST['description']);
    $k = $kalender ->createEvent();
}
$kalender = new Kalender();
$kal = $kalender ->showEvents();



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<ul>
<?php foreach($kal as $ka):?>
    <li><?php echo $ka['start'] . $ka['end'] . $ka['description'] ?></li>
<?php endforeach;?>




</ul>
<div class="container">
    <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title?><a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
    <br>

<table class="calendar">
    <tr>
        <th>zondag</th>
        <th>maandag</th>
        <th>dinsdag</th>
        <th>woensdag</th>
        <th>donderdag</th>
        <th>vrijdag</th>
        <th>zaterdag</th>


</tr>
<?php foreach ($weeks as $week) {
    
    echo $week;
    
}?>
   

    </div>


</table>








<div class="event">

<form action="" method="post">

<label for="">Start Evenement:</label>
<input type="datetime-local" name="start">

<label for="">Einde van Evenement</label>
<input type="datetime-local" name="end">

<label for="">Beschrijving van evenement</label>
<input type="text" name="description">


<input type="submit">









</form>








</div>


    
</body>
</html>