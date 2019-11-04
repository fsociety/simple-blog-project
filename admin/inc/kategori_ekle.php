<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php


if($_POST){

$kategori_adi = p("kategori_adi");
$kategori_link = sef_link($kategori_adi);
$kategori_desc = p("kategori_desc");
$kategori_keyw = p("kategori_keyw");
$kategori_anasayfa_konu = p("kategori_anasayfa_konu");
$kategori_full_konu = p("kategori_full_konu");

if(!$kategori_adi){
echo '<h4 class="alert_error">Bir Kategori Adı Girmelisiniz</h4>';
}else{
	$varmi = query("select * from kategoriler where kategori_adi='$kategori_adi'");
	if(rows($varmi)){
	echo '<h4 class="alert_error">Böyle Bir Kategori Bulunmaktadır.</h4>';
	}else{
	$insert = query("insert into kategoriler set
	kategori_adi='$kategori_adi',
	kategori_link='$kategori_link',
	kategori_desc='$kategori_desc',
	kategori_keyw='$kategori_keyw',
	kategori_anasayfa_konu='$kategori_anasayfa_konu',
	kategori_full_konu='$kategori_full_konu'");
	if($insert){
	echo '<h4 class="alert_success">Kategori Başarıyla Eklendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=kategoriler",1);
	}else{
	echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
	}

	}
}

}


?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>KATEGORİ EKLE</h3></header>
				<div class="module_content">
						<fieldset>
							<label>KATEGORİ ADI:</label>
							<input type="text" name="kategori_adi">
						</fieldset>

						<fieldset>
							<label>KATEGORİ AÇIKLAMASI</label>
							<textarea rows="3" name="kategori_desc"></textarea>
						</fieldset>
						<fieldset>
							<label>KATEGORİ KEYWORDS:</label>
							<textarea rows="3" name="kategori_keyw"></textarea>
						</fieldset>
						<fieldset>
							<label>KATEGORİ ANASAYFA KONU (.php)</label>
							<input type="text" name="kategori_anasayfa_konu">
						</fieldset>
						<fieldset>
							<label>KATEGORİ FULL KONU (.php)</label>
							<input type="text" name="kategori_full_konu">
						</fieldset>
						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Kategori Ekle" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
