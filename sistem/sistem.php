<?php

require_once "fonksiyonlar.php";

## Tema BAŞLIK - DESC - KEYW Fonksiyonu ##
	function tdk() {
		$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
		$do = g("do");
		Switch ($do){

			case "konu":
			if ($link = g("link")){

				$query = query("SELECT * FROM konular WHERE konu_link = '$link'");
				if (mysqli_affected_rows($con)){

					$row = row($query);
					$konu = strip_tags($row["konu_aciklama"]);
					$title = ss($row["konu_baslik"]);
					$desc = strip_tags(kisalt(ss($konu), 220));
					$keyw = implode(", ", explode(" ", ss($row["konu_baslik"])));

				}

			}
			break;

			case "kategori":
			if ($link = g("link")){
				$query = query("SELECT * FROM kategoriler WHERE kategori_link = '$link'");
				if (mysqli_affected_rows($con)){
					$row = row($query);

					$title = ss($row["kategori_adi"]);
					$desc = ss($row["kategori_desc"]);
					$keyw = ss($row["kategori_keyw"]);

				}
			}
			break;

			case "uye":
			// boş
			break;

			case "giris":
			if (!session("login")){
				$title = "Üye Girişi - ".ss(SITE_TITLE);
			}
			break;

			case "cikis":
			if (!session("login")){
				$title = "Üye Çıkışı - ".ss(SITE_TITLE);
			}
			break;

			case "etiket":
			if ($etiket = g("link")){
				$title = ss($etiket)." ile İlgili Konular - ".SITE_TITLE;
				$desc = ss($etiket)." ile İlgili Konular";
				$keyw = implode(", ", explode(" ", $kelime));
			}
			break;


			case "sayfa":
			if ($link = g("link")){
				$query = query("SELECT * FROM sayfalar WHERE sayfa_link = '$link'");
				if (mysqli_affected_rows($con)){
					$row = row($query);

					$title = ss($row["sayfa_baslik"]);
					$desc = strip_tags(kisalt(ss($row["sayfa_icerik"]), 220));
					$keyw = implode(", ", explode(" ", $title));

				}else {
					$title = "Sayfa Bulunamadı - ".SITE_TITLE;
				}
			}
			break;

			case "arama":
			if ($kelime = g("kelime")){
				$title = ss($kelime)." İle İlgili Arama Sonuçları";
				$desc = ss($kelime)." İle İlgili Arama Sonuçları";
				$keyw = implode(", ", explode(" ", ss($kelime)));
			}
			break;

			default:
			$title = ss(SITE_TITLE);
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			break;

		}

		echo '<title>'.$title.'</title>
		<meta name="description" content="'.$desc.'" />
		<meta name="keywords" content="'.$keyw.'" />';

	}

## Tema İçerik Fonksiyonu ##
function tema_icerik(){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$do = g("do");
switch($do){
case "konu":
if($link = g("link")){

$query=query("select * from konular INNER JOIN uyeler where konu_link='$link'");

$row = row($query);
$konuid=$row["konu_id"];
$konu=$row["konu_aciklama"];
$baslik = ss($row["konu_baslik"]);
$link=URL."/".$row["konu_link"].".html";
$katlink=URL."/kategori/".$row["kategori_link"];
$kategori = $row["kategori_adi"];
$okunma = number_format($row["konu_hit"]);
$tarihExplode = explode(" ",$row["konu_tarih"]);
$tarih = $tarihExplode[0];
$zaman = $tarihExplode[1];
$tarih2=explode("-",$tarih);
$etiketler = $row["konu_etiket"];
if(!cookie("konu_".$konuid)){
$hitUpdate=query("update konular set konu_hit=konu_hit+1 where konu_id='$konuid'");
setcookie("konu_".$konuid,"_",time()+988989);
}
require TEMA."/konu_full.php";


}else{
go(URL);
}
break;

case "kategori":
if($link = g("link")){
$query = query("select * from kategoriler where kategori_link='$link'");
if(rows($query)){
$row=row($query);
$katid=$row["kategori_id"];
$katlink=$row["kategori_link"];
require_once TEMA."/kategori.php";
}else{
$hata = 'Böyle Bir Kategori Bulunmuyor.Silinmiş ya da hiç var olmamış olabilir.';
require_once TEMA."/hata.php";
}
}else{
go(URL);
}
break;

case "uye":

break;

case "giris":
if(session("login")){
go(URL);
}else{
require_once TEMA."/giris.php";
}
break;

case "cikis":

if(session("login")){
session_destroy();
go(URL);
}else{
go(URL);
}

break;

case "etiket":

if($etiket = g("link")){
require_once TEMA."/etiket.php";
}else{
go(URL);
}

break;

case "sayfa":

if($link = g("link")){
$query = query("select * from sayfalar where sayfa_link='$link'");
if(rows($query)){
$row = row($query);
$baslik = ss($row["sayfa_baslik"]);
$icerik = nl2br(ss($row["sayfa_icerik"]));
require_once TEMA."/sayfa.php";
}else{
$hata = 'Aradığınız Sayfaya Ulaşılamıyor.Silinmiş ya da hiç var olmamış olabilir.';
require_once TEMA."/hata.php";
}
}else{
go(URL);
}

break;

case "arama":

if($kelime = g("kelime")){

require_once TEMA."/arama.php";
}else{
go(URL);
}

break;

case "ara":
if($kelime = g("kelime")){
go(URL.'/arama/'.$kelime.'');
}else{
go(URL);
}
break;

default:
require_once TEMA."/default.php";
break;
}

}

## Tema Kategoriler fonksiyonu ##

function tema_kategoriler(){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$query=query("select * from kategoriler order by kategori_id asc");
while($row=row($query)){
echo '<li><a href="'.URL.'/kategori/'.$row["kategori_link"].'">'.ss($row["kategori_adi"]).'</a></li>';
}
}

## Tema Anasayfa Konu Fonksiyonu ##

function tema_anasayfa_konu(){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$sayfa= g("s") ? g("s") : 1;
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_anasayfa=1"));
if($ksayisi > 0){
$limit=ANASAYFA_LIMIT;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa*$limit)-$limit;
$query=query("select * from konular INNER JOIN uyeler ON uyeler.uye_id=konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id=konular.konu_kategori where konu_onay=1 && konu_anasayfa=1 order by konu_id desc LIMIT $baslangic,$limit");
while($row = row($query)){
$konu=$row["konu_aciklama"];
$konu = strip_tags(kisalt($konu,200));
$baslik = ss($row["konu_baslik"]);
$link=URL."/".$row["konu_link"].".html";
$katlink=URL."/kategori/".$row["kategori_link"];
$kategori = $row["kategori_adi"];
$okunma = number_format($row["konu_hit"]);
$tarihExplode = explode(" ",$row["konu_tarih"]);
$tarih = $tarihExplode[0];
$zaman = $tarihExplode[1];
$tarih2=explode("-",$tarih);
require TEMA."/konu_anasayfa.php";
}
}else{
$hata = "Henüz Bir İçerik Girilmemiş.";
require_once TEMA."/hata.php";
}

}

## Tema Anasayfa Sayfalama ##

function tema_sayfalama($tip = "anasayfa",$id=null){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$sayfa= g("s") ? g("s") : 1;
if($tip == "anasayfa"){
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_anasayfa=1"));
}elseif($tip == "kategori"){
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_kategori='$id'"));
}elseif($tip == "arama"){
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_baslik like '%$id%'"));
}elseif($tip == "etiket"){
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_etiket like '%$id%'"));
}
if($tip == "anasayfa"){
$limit=ANASAYFA_LIMIT;
}elseif($tip == "kategori"){
$limit=KATEGORI_LIMIT;
}elseif($tip == "arama"){
$limit=ARAMA_LIMIT;
}elseif($tip == "etiket"){
$limit=ETIKET_LIMIT;
}
$ssayisi = ceil($ksayisi/$limit);
if($ksayisi > $limit){
## önceki sayfa ##
$oncekiSayfa = $sayfa > 1 ? $sayfa - 1 :1;
if($tip == "anasayfa"){
$onceki = URL.'/s/'.$oncekiSayfa;
}elseif($tip == "kategori"){
$onceki = URL.'/kategori/'.g("link").'/sayfa/'.$oncekiSayfa;
}elseif($tip == "arama"){
$onceki = URL.'/arama/'.g("kelime").'/sayfa/'.$oncekiSayfa;
}elseif($tip == "etiket"){
$onceki = URL.'/etiket/'.g("link").'/sayfa/'.$oncekiSayfa;
}
## önceki sayfa ##
$sonrakiSayfa = $sayfa < $ssayisi ? $sayfa + 1 :$ssayisi;
if($tip == "anasayfa"){
$sonraki = URL.'/s/'.$sonrakiSayfa;
}elseif($tip == "kategori"){
$sonraki = URL.'/kategori/'.g("link").'/sayfa/'.$sonrakiSayfa;
}elseif($tip == "arama"){
$sonraki = URL.'/arama/'.g("kelime").'/sayfa/'.$sonrakiSayfa;
}elseif($tip == "etiket"){
$sonraki = URL.'/etiket/'.g("link").'/sayfa/'.$sonrakiSayfa;
}
require_once TEMA."/sayfala.php";
}

}

## Konu Etiketler Fonksiyonu ##

function konu_etiketler($etiketler){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$bol = explode(",",$etiketler);
$etikets=array();
foreach($bol as $etiket){
$etiket = '<a href="'.URL.'/etiket/'.ss(trim($etiket)).'">'.ss(trim($etiket)).'</a>';
array_push($etikets,$etiket);
}

echo implode(", ",$etikets);

}

## Tema Kategori Konu Fonksiyonu ##

function tema_kategori_konu($katid){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$sayfa= g("s") ? g("s") : 1;
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_kategori='$katid'"));
if($ksayisi > 0){
$limit=KATEGORI_LIMIT;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa*$limit)-$limit;
$query=query("select * from konular INNER JOIN uyeler ON uyeler.uye_id=konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id=konular.konu_kategori where konu_onay=1 && konu_anasayfa=1 && konu_kategori='$katid' order by konu_id desc LIMIT $baslangic,$limit");
while($row = row($query)){
$konu=$row["konu_aciklama"];
$konu = strip_tags(kisalt($konu,200));
$baslik = ss($row["konu_baslik"]);
$link=URL."/".$row["konu_link"].".html";
$katlink=URL."/kategori/".$row["kategori_link"];
$kategori = $row["kategori_adi"];
$okunma = number_format($row["konu_hit"]);
$tarihExplode = explode(" ",$row["konu_tarih"]);
$tarih = $tarihExplode[0];
$zaman = $tarihExplode[1];
$tarih2=explode("-",$tarih);
require TEMA."/konu_anasayfa.php";
}
}else{
$hata = "Henüz Bu Kategoriye Bir İçerik Girilmemiş.";
require_once TEMA."/hata.php";
}

}

## Tema Arama Konu Fonksiyonu ##

function tema_arama_konu($kelime){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$sayfa= g("s") ? g("s") : 1;
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_baslik like '%$kelime%'"));
if($ksayisi > 0){
$limit=ARAMA_LIMIT;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa*$limit)-$limit;
$query=query("select * from konular INNER JOIN uyeler ON uyeler.uye_id=konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id=konular.konu_kategori where konu_onay=1 && konu_baslik like '%$kelime%' order by konu_id desc LIMIT $baslangic,$limit");
while($row = row($query)){
$konu=$row["konu_aciklama"];
$konu = strip_tags(kisalt($konu,200));
$baslik = ss($row["konu_baslik"]);
$link=URL."/".$row["konu_link"].".html";
$katlink=URL."/kategori/".$row["kategori_link"];
$kategori = $row["kategori_adi"];
$okunma = number_format($row["konu_hit"]);
$tarihExplode = explode(" ",$row["konu_tarih"]);
$tarih = $tarihExplode[0];
$zaman = $tarihExplode[1];
$tarih2=explode("-",$tarih);
require TEMA."/konu_anasayfa.php";
}
}else{
$hata = '<strong>'.ss($kelime).' Aramasına Ait Sonuç Bulunamadı...</strong>';
require_once TEMA."/hata.php";
}

}


## Tema Etiket Konu Fonksiyonu ##

function tema_etiket_konu($kelime){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$sayfa= g("s") ? g("s") : 1;
$ksayisi=rows(query("select konu_id from konular where konu_onay=1 && konu_etiket like '%$kelime%'"));
if($ksayisi > 0){
$limit=ETIKET_LIMIT;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa*$limit)-$limit;
$query=query("select * from konular INNER JOIN uyeler ON uyeler.uye_id=konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id=konular.konu_kategori where konu_onay=1 && konu_etiket like '%$kelime%' order by konu_id desc LIMIT $baslangic,$limit");
while($row = row($query)){
$konu=$row["konu_aciklama"];
$konu = strip_tags(kisalt($konu,200));
$baslik = ss($row["konu_baslik"]);
$link=URL."/".$row["konu_link"].".html";
$katlink=URL."/kategori/".$row["kategori_link"];
$kategori = $row["kategori_adi"];
$okunma = number_format($row["konu_hit"]);
$tarihExplode = explode(" ",$row["konu_tarih"]);
$tarih = $tarihExplode[0];
$zaman = $tarihExplode[1];
$tarih2=explode("-",$tarih);
require TEMA."/konu_anasayfa.php";
}
}else{
$hata = '<strong>'.ss($kelime).' Aramasına Ait Sonuç Bulunamadı...</strong>';
require_once TEMA."/hata.php";
}

}

## Tema Çok Okunanlar Fonksiyonu ##

function tema_cok_okunanlar($limit = 5){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$query = query("select * from konular where konu_onay=1 order by konu_hit desc limit $limit");
$ksayisi = rows(query("select * from konular where konu_onay=1 order by konu_hit desc limit $limit"));
if($ksayisi > 0){
while($row = row($query)){
$link = URL."/".$row["konu_link"].".html";
$baslik = $row["konu_baslik"];
$hit = number_format($row["konu_hit"]);
require TEMA."/cok_okunanlar.php";
}
}else{
return false;
}
}

## Tema Reklam Fonksiyonu ##

function tema_reklam($reklamAdi){
$con = mysqli_connect('localhost' ,'root' ,'','cizikcd') or die (mysqli_connect_error());
$query = query("select * from reklamlar where reklam_adi='$reklamAdi'");
$ksayisi = rows(query("select * from reklamlar where reklam_adi='$reklamAdi'"));
if(mysqli_affected_rows($con)){
$row = row($query);
echo $row["reklam_text"];
}else{

}

}

?>
