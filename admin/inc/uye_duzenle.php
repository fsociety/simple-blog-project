<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

$id = g("id");
$query = query("select * from uyeler where uye_id='$id'");
if(rows($query) < 1){
go(URL."/admin");
exit;
}

$row = row($query);

$uye_adi = explode(" ",$row["uye_adi"]);

if($_POST){

$uye_kadi = p("uye_kadi");
$uye_link = sef_link($uye_kadi);
if(p("uye_sifre")){
$uye_sifre = md5(p("uye_sifre"));
}else{
$uye_sifre = $row["uye_sifre"];
}
$adi = p("uye_adi");
$soyadi = p("uye_soyadi");
$uye_adi=$adi.' '.$soyadi;
$uye_eposta = p("uye_eposta");
$uye_rutbe = p("uye_rutbe");
$uye_onay = p("uye_onay");

if(!$uye_kadi || !$uye_sifre || !$uye_eposta){
echo '<h4 class="alert_warning">Tüm Alanları Doldurmanız Gerekiyor...</h4>';
}else{
$update = query("UPDATE uyeler set
		uye_kadi='$uye_kadi',
		uye_link='$uye_link',
		uye_sifre='$uye_sifre',
		uye_adi='$uye_adi',
		uye_eposta='$uye_eposta',
		uye_rutbe='$uye_rutbe',
		uye_onay='$uye_onay'
		where uye_id='$id'");
		if($update){
	echo '<h4 class="alert_success">Üye Başarıyla Güncellendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=uyeler",1);
	}else{
	echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
	}


}

}


?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>ÜYE EKLE</h3></header>
				<div class="module_content">
						<fieldset>
							<label>ÜYE KULLANICI ADI:</label>
							<input type="text" name="uye_kadi" value="<?php echo $row["uye_kadi"]; ?>">
						</fieldset>
						<fieldset>
							<label>ÜYE ŞİFRE:</label>
							<input type="text" name="uye_sifre">
						</fieldset>
						<fieldset>
							<label>ÜYE ADI:</label>
							<input type="text" name="uye_adi" value="<?php echo $uye_adi[0]; ?>">
						</fieldset>
						<fieldset>
							<label>ÜYE SOYADI:</label>
							<input type="text" name="uye_soyadi" value="<?php echo $uye_adi[1]; ?>">
						</fieldset>
						<fieldset>
							<label>ÜYE E-POSTA:</label>
							<input type="text" name="uye_eposta" value="<?php echo $row["uye_eposta"]; ?>">
						</fieldset>
						<fieldset>
							<label>ÜYE RÜTBE</label>
							<select name="uye_rutbe">
							<option value="1" <?php echo $row["uye_rutbe"] == 1 ? 'selected' :null ?>>YÖNETİCİ</option>
							<option value="2" <?php echo $row["uye_rutbe"] == 2 ? 'selected' :null ?>>ÜYE</option>
							</select>
						</fieldset>

						<fieldset>
							<label>ÜYE ONAY</label>
							<select name="uye_onay">
							<option value="1" <?php echo $row["uye_onay"] == 1 ? 'selected' :null ?>>ONAYLI</option>
							<option value="0" <?php echo $row["uye_onay"] == 0 ? 'selected' :null ?>>ONAYLI DEĞİL</option>
							</select>
						</fieldset>
						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Düzenlemeyi Bitir." class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
