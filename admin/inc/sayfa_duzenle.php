<?php !defined("ADMIN") ? die("Hacking?") : null;

$id = g("id");
$query = query("select * from sayfalar WHERE sayfa_id='$id'");
$row = row($query);
if(mysqli_affected_rows($con) < 1){
go(URL."/admin");
exit;
}

if($_POST){

$sayfa_baslik = p("sayfa_baslik");
$sayfa_link = sef_link($sayfa_baslik);
$sayfa_icerik = p("sayfa_icerik");

if(!$sayfa_baslik){
echo '<h4 class="alert_error">Bir Sayfa Adı Girmelisiniz</h4>';
}else{
	$varmi = query("select * from sayfalar where sayfa_link='$sayfa_link' && sayfa_id != '$id'");
	if(rows($varmi) > 0){
	echo '<h4 class="alert_error">Böyle Bir Sayfa Bulunmaktadır.</h4>';
	}else{
	$insert = query("UPDATE sayfalar SET
			sayfa_baslik='$sayfa_baslik',
			sayfa_link='$sayfa_link',
			sayfa_icerik='$sayfa_icerik'
			where sayfa_id='$id'
			");
	if($insert){
	echo '<h4 class="alert_success">Sayfa Başarıyla Güncellendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=sabit_sayfalar",1);
	}else{
	echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
	}

	}
}

}

?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>Sayfa Duzenle</h3></header>
				<div class="module_content">
						<fieldset>
							<label>SAYFA BAŞLIĞI:</label>
							<input type="text" name="sayfa_baslik" value="<?php echo ss($row["sayfa_baslik"]); ?>">
						</fieldset>
						<fieldset>
							<label>SAYFA İÇERİĞİ</label>
							<textarea rows="10" name="sayfa_icerik"><?php echo ss($row["sayfa_icerik"]); ?></textarea>
						</fieldset>
						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Düzenlemeyi Bitir" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
