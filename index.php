<?php
$data1 = $_GET['weather'];
$url = "https://api.openweathermap.org/data/2.5/weather?q=$data1&units=metric&appid=9ecbd1d0d87cbf3940995a41297a38d5&lang=ru";
$contents = file_get_contents($url);
$weather = json_decode($contents);
$temp_now = $weather->main->temp."°C";
$icon = $weather->weather[0]->icon.".png";
$today = date("j.m.Y, H:i");
$cityname = $weather->name;
// http://api.openweathermap.org/data/2.5/forecast?q=Нефтеюганск,RU&cnt=7&lang=ru&units=metric&appid=9ecbd1d0d87cbf3940995a41297a38d5 НА 7 ДНЕЙ
if (empty($data1)) {
  echo "-";
} else {
  echo "+";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Погода</title>
</head>
<body>
   <form action="index.php" method="get">
      <table>
         <tr><td>Город:</td><td><input name="weather" type="text"></td></tr><br>
         <tr><td><input type="submit" value="Узнать погоду"></td></tr>
      </table>
   </form>
   <div class="weather">
      <p> <?php echo $today?> </p>
      <p> <?php echo $cityname?> </p>
      <p> <?php echo $temp_now?> </p>
      <img src="./ico/<?php echo $icon?>" alt="ico" >
   </div>
</body>
</html>