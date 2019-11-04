<?php
require_once "sistem/ayar.php";
require_once "sistem/fonksiyonlar.php";

header("Content-type: text/xml\n\n");
echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title>Cizikcd.com | Rss Feed</title>
<description>RSS</description>
<link>http://www.cizikcd.com</link>
<language>tr</language>
<webMaster>mustafa.goktas07@gmail.com</webMaster>
 
<image>
<url>http://cizikcd.com/favicon.ico</url>
<title>cizikcd.com</title>
<link>http://www.cizikcd.com</link>
<description>RSS</description>
</image>
';


$tablo="SELECT * FROM konular ORDER BY konu_id DESC LIMIT 0, 8";
$sorgu=mysql_query($tablo);
$hepsi=mysql_query("SELECT * FROM konular");

while($sat=mysql_fetch_assoc($sorgu)){ // sorguya ait verileri $sat değişkenine atıyoruz

$id = $sat['konu_id']; // yazi id sini çekiyoruz
$baslik = $sat['konu_baslik'];
$link = sef_link($sat['konu_baslik']);
$icerik = $sat['konu_aciklama'];



echo '
<item>
<title>'.stripslashes($baslik).'</title>
<description><![CDATA[
<p>'.ss(kisalt($icerik,300)).'<a href="'.URL.'/'.$link.'.html"><u>Devamını Oku</u></a></p>
]]></description> <!--içerik-->
<link>'.URL.'/'.$link.'.html</link> <!--link-->
</item>
';
}
?>

 

 
</channel>
</rss>