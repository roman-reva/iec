<?php
if (($_SERVER['PHP_AUTH_USER']!="iec-service")||($_SERVER['PHP_AUTH_PW']!="27.10.2011.20:58")) {
    header('WWW-Authenticate: Basic realm="df"');
    header('HTTP/1.0 404 Not found');
    echo '404 Not found';
    exit;
} 
?>
<html>
<head>
</head>
<body>
<center>
<?php
//регистратор
$file="mmo_base.log";    //куда пишем логи
$col_zap=4999;        //строк в файле не более
function getRealIpAddr()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))        // Определяем IP
  { $ip=$_SERVER['HTTP_CLIENT_IP']; }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    // Если IP идёт через прокси
  { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }
  else { $ip=$_SERVER['REMOTE_ADDR']; }
  return $ip;
}
if (strstr($_SERVER['HTTP_USER_AGENT'], 'YandexBot')) {$bot='YandexBot';}
elseif (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {$bot='Googlebot';}
else { $bot=$_SERVER['HTTP_USER_AGENT']; }

$ip = getRealIpAddr();
$date = date("H:i:s d.m.Y");        //дата события


try {
 $str=explode("/",$bot);   
 $port = intval($str[1]);
echo '<table><tr><td>'.$port.'</td></tr></table>';

	$lines = file($file);
	while(count($lines) > $col_zap) array_shift($lines);
	$lines[] = $date."|".$bot."|".$ip."|\r\n";
	file_put_contents($file, $lines);

	//вывод таблицы из файла

	if (isset($_GET[col])) { $col=$_GET[col]; } else { $col=50; }
	$file=file("mmo_base.log");

	if ($col>sizeof($file)) { $col=sizeof($file); }
	echo "Последние <b>".$col."</b> посещений сайта:"?>
	<table>
	<?php
   	for ($si=sizeof($file)-1; $si+1>sizeof($file)-$col; $si--) {
   	$string=explode("|",$file[$si]);
   	$q1[$si]=$string[0]; // дата и время
   	$q2[$si]=$string[1]; // имя бота
   	$q3[$si]=$string[2]; // ip бота
 	echo '<tr><td>'.$q2[$si].'</td>';
	echo '<td>'.$q3[$si].'</td></tr>';
	}
	echo '</table>';
}
catch (Exception $e) {
echo '<table><tr><td>'.ip.'</td></tr></table>';
}

echo '</body></html>';
?>
