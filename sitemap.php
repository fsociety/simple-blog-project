<?
// Önce mysql bağlantı bilgilerini içeren php dosyamızı include ediyoruz
$mysqlhost="localhost";
$mysqluser="cizikcd_cizikcd";
$mysqlpass="wk]3M~HtcK-f";
$mysqldatabase="cizikcd_cizikcd";
if(! $baglanti=@mysql_connect($mysqlhost, $mysqluser, $mysqlpass)) die("veritabani baglantisi yok.");
mysql_select_db($mysqldatabase);

// İkinci olarak sayfa output'unun hangi formatta olduğunu belirten header komutunu gönderiyoruz. Sayfamız xml formatında olacaktır.
header("Content-Type: text/xml");

// Get metoduyla aldığımız sayfa verisini $sayfa isimli değişkene atıyoruz. 
if(! isset($_GET[sayfa])) $sayfa=1; else $sayfa=$_GET[sayfa];


// Eğer sayfa değişkeni "index" değeri aldıysa output olarak sitemap-index verilecek. 
if($sayfa=="index"):

// İlk olarak bütün makale sayısını alıyoruz.
$index_sayi=mysql_num_rows(mysql_query("SELECT `konu_id` FROM `konular`"));
// İkinci olarak kaç adet index'te kaç adet sitemap listeleneceğini bulmak için, toplam rakamı sitemap başı url sayısına bölüyoruz. Ben genelde veritabanını yormamak ve hızlı yüklenme için 6000 kullanırım.
$index_sayi=ceil($index_sayi / 6000);

//Google sitemap-index header'larını giriyoruz. Encoding'i dileğinize göre değiştirebilirsiniz.
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
   <sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

// Ana etiketleri girdikten sonra sitemap'ları döngü ile listeliyoruz.
for($i=0; $i<$index_sayi; $i++){
echo "<sitemap>
      <loc>http://www.cizikcd.com/sitemap.php?sayfa=".($i+1)."</loc>
      <lastmod>$date</lastmod>
   </sitemap>\n";
}

// Son olarak sitemap-index sonlandırma etiketini girip index'i bitiriyoruz.
echo "</sitemapindex>";

// Eğer GET ile aldığımız sayfa değişkeni numerik ise bu kodlar çalışacak.
else:

// Sayfa numarasına göre 6000'lik veri alınıyor.
$sorgu=mysql_query("SELECT * FROM `konular` ORDER BY `konu_id` ASC LIMIT ".(($sayfa-1)*6000).",6000");
// Sitemap ana xml etiketleri giriliyor.
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
 xsi:schemaLocation=\"http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd\">\n";

// Alınan 6000'lik parça döngü ile yazdırılıyor.
while($sonuc=mysql_fetch_array($sorgu)):

$b = $sonuc['konu_link'];


echo "  <url>
                <loc>http://www.cizikcd.com/".stripslashes($b).".html</loc>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
        </url>\n";

endwhile;

// Son olarak sitemap'ı sonlandırma etiketini yazdırıp dosyayı kapatıyoruz.
echo '</urlset>';

endif;
?>