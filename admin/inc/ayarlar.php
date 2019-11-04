<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

$query = query("select * from ayarlar");
$row = row($query);

$sayfa = explode("|",$row["tema_sayfalama"]);

if($_POST){

$site_url = p("site_url", true);
$site_baslik = p("site_baslik", true);
$site_desc = p("site_desc", true);
$site_keyw = p("site_keyw", true);
$site_durum = p("site_durum", true);
$site_tema = p("site_tema", true);
$anasayfa_limit = p("anasayfa_limit");
$kategori_limit = p("kategori_limit");
$arama_limit = p("arama_limit");
$etiket_limit = p("etiket_limit");
$tema_sayfalama=$anasayfa_limit."|".$kategori_limit."|".$arama_limit."|".$etiket_limit;

if(!$site_url || !$site_baslik){

echo '<h4 class="alert_error">Lütfen Gerekli Alanları Doldurun</h4>';

}else{

$update = query("UPDATE ayarlar SET
			site_url='$site_url',
			site_baslik='$site_baslik',
			site_desc='$site_desc',
			site_keyw='$site_keyw',
			site_tema='$site_tema',
			site_durum='$site_durum',
			tema_sayfalama='$tema_sayfalama'
			");

			if($update){
			echo '<h4 class="alert_success">Ayarlarınız Başarıyla Güncellendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=".g("do"),1);
			}else{
			echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu '.mysqli_error($con).'</h4>';
			}



}

}


?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>GENEL AYARLAR</h3></header>
				<div class="module_content">
						<fieldset>
							<label>SİTE URL:</label>
							<input type="text" name="site_url" value="<?php echo $row["site_url"]; ?>">
						</fieldset>
						<fieldset>
							<label>SİTE BAŞLIK:</label>
							<input type="text" name="site_baslik" value="<?php echo ss($row["site_baslik"]); ?>">
						</fieldset>
						<fieldset>
							<label>SİTE AÇIKLAMASI</label>
							<textarea rows="3" name="site_desc"><?php echo ss($row["site_desc"]); ?></textarea>
						</fieldset>
						<fieldset>
							<label>SİTE KEYWORDS:</label>
							<textarea rows="3" name="site_keyw"><?php echo ss($row["site_keyw"]); ?></textarea>
						</fieldset>
						<fieldset>
							<label>SİTE DURUM</label>
							<select name="site_durum" style="width:92%;">
								<option value="1" <?php echo $row["site_durum"] ? 'selected' :null?>>Online</option>
								<option value="0" <?php echo !$row["site_durum"] ? 'selected' :null?>>Offline</option>
							</select>
						</fieldset>
						<fieldset>
							<label>SİTE TEMA</label>
							<select name="site_tema" style="width:92%;">
							<?php klasor_listele("../tema");?>
							</select>
						</fieldset>
						<fieldset>
							<label>ANASAYFA SAYFA LİMİT:</label>
							<input type="text" name="anasayfa_limit" value="<?php echo $sayfa[0]; ?>">
						</fieldset>
						<fieldset>
							<label>KATEGORİ SAYFA LİMİT:</label>
							<input type="text" name="kategori_limit" value="<?php echo $sayfa[1]; ?>">
						</fieldset>
						<fieldset>
							<label>ARAMA SAYFA LİMİT:</label>
							<input type="text" name="arama_limit" value="<?php echo $sayfa[2]; ?>">
						</fieldset>
						<fieldset>
							<label>ETİKET SAYFA LİMİT:</label>
							<input type="text" name="etiket_limit" value="<?php echo $sayfa[3]; ?>">
						</fieldset>
						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Ayarları Güncelle" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
