<?php

function klasor_listele($dizin){
$dizinAc = opendir($dizin) or die ("Dizin Bulunamadı!");
while($dosya = readdir($dizinAc)){
if(is_dir($dizin.'/'.$dosya) && $dosya != '.' && $dosya != '..'){
echo '<option ';
echo TEMA_DIR == $dosya ? 'selected' :null;
echo' value="'.$dosya.'">'.$dosya.'</option>';
}
}
}

function p($par, $st = false){
	if($st){
	return htmlspecialchars(addslashes(trim($_POST[$par])));
	}else{
	return addslashes(trim($_POST[$par]));
	}

}

function g($par){
return strip_tags(addslashes(trim($_GET[$par])));
}

function kisalt($par, $uzunluk = 50){
if(strlen($par) > $uzunluk){
	$par = mb_substr(strip_tags($par), 0, $uzunluk, "UTF-8")."...";
}

return $par;
}

function ss($par){
return stripslashes($par);
}

function go($par, $time = 0){
if($time == 0){
header("location: {$par}");
}else{
header("refresh: {$time}; url={$par}");
}
}

function session_olustur($par){
foreach($par as $anahtar => $deger){
 $_SESSION[$anahtar] = $deger;
}
}

function session($par){
if($_SESSION[$par]){
return $_SESSION[$par];
}else{
return false;
}
}

function cookie($par){
if($_COOKIE[$par]){
return $_COOKIE[$par];
}else{
return false;
}
}

function sef_link($baslik){
	$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
	$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
	$perma = strtolower(str_replace($bul, $yap, $baslik));
	$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
	$perma = trim(preg_replace('/\s+/',' ', $perma));
	$perma = str_replace(' ', '-', $perma);
	return $perma;
}

function query($query){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
return mysqli_query($con,$query);
}

function row($query){
return mysqli_fetch_array($query);
}

function rows($query){
return mysqli_num_rows($query);
}

function getAy($ay){
if($ay == "1"){
$ay = "Ocak";
}elseif($ay == "2"){
$ay = "Şubat";
}elseif($ay == "3"){
$ay = "Mart";
}elseif($ay == "4"){
$ay = "Nisan";
}elseif($ay == "5"){
$ay = "Mayıs";
}elseif($ay == "6"){
$ay = "Haziran";
}elseif($ay == "7"){
$ay = "Temmuz";
}elseif($ay == "8"){
$ay = "Ağustos";
}elseif($ay == "9"){
$ay = "Eylül";
}elseif($ay == "10"){
$ay = "Ekim";
}elseif($ay == "11"){
$ay = "Kasım";
}elseif($ay == "12"){
$ay = "Aralık";
}
echo $ay;

}
?>
