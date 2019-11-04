<?php

if($_POST){

$kadi = p("kadi");
$sifre = p("sifre");

if(!$kadi || !$sifre){
$hata = 'Tüm Alanları Doldurmanız Gerekiyor...';
require_once TEMA."/hata.php";
}else{
$sifre = md5($sifre);

$query = query("select * from uyeler where uye_kadi='$kadi' && uye_sifre='$sifre'");
if(mysql_affected_rows()){
$row=row($query);

	$session = array(
	"login" => true,
	"uye_id" => $row['uye_id'],
	"uye_rutbe" => $row['uye_rutbe'],
	"uye_kadi" => $row['uye_kadi']
	);
	session_olustur($session);

	go(URL);

}else{
$hata = 'Böyle Bir Üye Sistemde Kayıtlı Bulunmuyor.';
require_once TEMA."/hata.php";
}
}

}

?>