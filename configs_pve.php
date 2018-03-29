<?php
if(!isset($_SESSION)) session_start();

# Languages ############

if(isset($_GET['Local'])) $lang = $_GET['Local'];
else if(isset($_SESSION['Local'])) $lang = $_SESSION['Local'];
if(empty($lang)) $lang = 'zh-cn';


$language = $lang;
$langs = Array("zh-cn" => null, "ro-ro" => null, "en-gb" => null, "it-it" => null, "de-de" => null, "es-es" => null, "bu-bg" => null , "es-mx" => null, "gr-gr" => null, "ru-ru" => null, "en-us" => null, "zh-tw" => null, "fr-fr" => null);
if(array_key_exists($lang,$langs))require_once("lang/".$lang.".php");
else require_once("/lang/zh-cn.php");
$_SESSION['Local'] = $language;
######################


# Mysql ################

$serveraddress = "106.15.178.152";
$serveruser = "root";
$serverpass = "wt6655951";
$serverport	= "3306";

$server_db = "website";
$server_adb = "auth";

$server_cdb = "characters_pve";
$server_wdb = "worlds";

######################


# Extra ################

$website['realm'] = "2";
$name_realm1['realm'] = "洛丹伦王国";
$mysql_cod = 'cp1251';

# Comunity Links ############

$comun_link['Facebook'] = "http://weibo.com/ymisc";          // Your adress of Facebook comunity
$comun_link['Twitter'] = "http://t.qq.com/long21234675";               // Your adress of Twitter comunity
$comun_link['Youtube'] = "http://www.youtube.com/";            // Your adress of Youtube comunity

# Important #############

$website['title'] = "洛丹伦王国";
$website['slogan'] = "真正的纯公益魔兽世界服务器!";
$website['address'] = "https://wow.ymisc.com";
$website['root'] = "/";

######################

$maintenance = false; //Change true(maintenance mode)/false(normal mode) to disable/enable website
if($maintenance == true){
  if($bucle_mant == 0 ){                        
    header('Location: maintenance.php');
  }
}else{

############

$teamsLimit = 50;				// Number of team to display on each page

$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
mysql_select_db($server_db,$connection_setup)or die(mysql_error());

if(isset($_SESSION['username'])){
	$username = mysql_real_escape_string($_SESSION['username']);
	$account_information = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE username = '".$username."'"));
	$account_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$account_information['id']."'"));
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());
}
###########
}
?>