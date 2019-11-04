<?php
	session_start();
	ob_start("ob_gzhandler");
	## Hataları Gizle ##
	error_reporting(0);
	## Sistem Değişkenleri ##

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'dbname';

	## Mysql Bağlantısı ##

	$con = mysqli_connect($host ,$user ,$pass,$db) or die (mysqli_connect_error());


	## Karakter Sorunu ##

	//mysqli_query($con,"SET CHARACTER SET 'utf8'");
	//mysqli_query($con,"SET NAMES 'utf8'");

	## Genel Ayarlar ##

	$query = mysqli_query($con,"select * from ayarlar");
	$ayar = mysqli_fetch_array($query);
	$sayfaBol=explode("|",$ayar["tema_sayfalama"]);

	define("PATH" , realpath("."));
	define("URL" , $ayar['site_url']);
	define("TEMA_URL" , $ayar['site_url']."/tema/".$ayar['site_tema']);
	define("TEMA" , PATH."/tema/".$ayar['site_tema']);
	define("TEMA_DIR" ,$ayar['site_tema']);
	define("ANASAYFA_LIMIT",$sayfaBol[0]);
	define("KATEGORI_LIMIT",$sayfaBol[1]);
	define("ARAMA_LIMIT",$sayfaBol[2]);
	define("ETIKET_LIMIT",$sayfaBol[3]);
	define("SITE_TITLE", $ayar["site_baslik"]);
	define("SITE_DESC", $ayar["site_desc"]);
	define("SITE_KEYW", $ayar["site_keyw"]);

?>
