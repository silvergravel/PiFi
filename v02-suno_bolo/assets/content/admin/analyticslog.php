<?php

$analyticsFilePath = "../analytics/analytics.txt";
$file = fopen($analyticsFilePath, r);
$analyticsLog = fread($file, filesize($analyticsFilePath));
fclose($file);

$split = explode("\n",$analyticsLog);

foreach ($split as $key => $value) {
  echo "<p>".$key."  ---  ".$value."</p>";
}



?>
