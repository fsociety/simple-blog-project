<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php


if($_POST){

$konu_baslik = p("konu_baslik");
$konu_link = sef_link($konu_baslik);
$konu_kategori = p("konu_kategori");
$konu_aciklama = p("konu_aciklama");
$konu_etiket = p("konu_etiket");
$konu_onay = p("konu_onay");
$konu_anasayfa = p("konu_anasayfa");
$konu_ekleyen = session("uye_id");

if(!$konu_baslik || !$konu_aciklama){
echo '<h4 class="alert_error">Gerekli Alanları Doldurmanız Gerekiyor...</h4>';
}else{
$varmi = query("select * from konular where konu_link='$konu_link'");
if(rows($varmi) > 0){
echo '<h4 class="alert_warning"><strong>'.ss($konu_baslik).'</strong> Adlı Konu Sitede Zaten Bulunuyor, Başka Bir tane Deneyin.</h4>';
}else{
$insert = query("insert into konular set
		konu_baslik='$konu_baslik',
		konu_link='$konu_link',
		konu_kategori='$konu_kategori',
		konu_aciklama='$konu_aciklama',
		konu_etiket='$konu_etiket',
		konu_onay='$konu_onay',
		konu_ekleyen='$konu_ekleyen',
		konu_anasayfa='$konu_anasayfa'");

		if($insert){
		echo '<h4 class="alert_success">Konu Başarıyla Eklendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=icerikler",1);
		}else{
		echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
		}
}
}

}

?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>İÇERİK EKLE</h3></header>
				<div class="module_content">
						<fieldset>
							<label>KONU BAŞLIĞI:</label>
							<input type="text" name="konu_baslik">
						</fieldset>
						<fieldset>
							<label>KONU KATEGORİSİ:</label>
							<select name="konu_kategori">
							<?php
							$katQuery=query("select * from kategoriler order by kategori_adi asc");
							while($katRow = row($katQuery)){
							echo '<option value="'.$katRow["kategori_id"].'">'.$katRow["kategori_adi"].'</option>';
							}
							?>
							</select>
						</fieldset>
						<fieldset>
						<span style="float:right; margin-right:10px; font-weight:bold;"><a href="http://codepen.io" target="_blank">CodePen</a></span>
						<span style="float:right; margin-right:10px; font-weight:bold;"><a href="index.php?do=highlight" target="_blank">HIGHLIGHT</a></span>
							<label>KONU İÇERİĞİ</label><br><br>
							<?php
			include_once 'ckeditor/ckeditor.php' ;
			require_once 'ckfinder/ckfinder.php' ;
			$initialValue = "" ;
			$ckeditor = new CKEditor( ) ;
			$ckeditor->basePath  = 'ckeditor/' ;
			CKFinder::SetupCKEditor( $ckeditor, 'ckfinder/' ) ;
			$config['height'] = '300';
			$config['toolbar'] = 'Full';
			$ckeditor->editor('konu_aciklama', $initialValue, $config);
			?>
						</fieldset>
						<fieldset>
							<label>KONU ETİKETLERİ</label>
							<input type="text" name="konu_etiket">
						</fieldset>
						<fieldset>
							<label>KONU ONAYI</label>
							<select name="konu_onay">
							<option value="1" selected>ONAYLI</option>
							<option value="0">ONAYLI DEĞİL</option>
							</select>
						</fieldset>
						<fieldset>
							<label style="width:250px;">KONU ANASAYFADA GÖZÜKSÜN MÜ?</label>
							<select name="konu_anasayfa">
							<option value="1" selected>EVET</option>
							<option value="0">HAYIR</option>
							</select>
						</fieldset>
						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Konu Ekle" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
