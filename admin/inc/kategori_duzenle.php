<?php !defined("ADMIN") ? die("Hacking?") : null;

$id = g("id");
$query = query("select * from kategoriler WHERE kategori_id='$id'");
$row = row($query);
if(mysqli_affected_rows($con) < 1){
go(URL."/admin");
exit;
}

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
	$insert = query("UPDATE kategoriler SET
			kategori_adi='$kategori_adi',
			kategori_desc='$kategori_desc',
			kategori_keyw='$kategori_keyw',
			kategori_anasayfa_konu='$kategori_anasayfa_konu',
			kategori_full_konu='$kategori_full_konu'
			where kategori_id='$id'
			");
	if($insert){
	echo '<h4 class="alert_success">Kategori Başarıyla Güncellendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=kategoriler",1);
	}else{
	echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
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
							<input type="text" name="kategori_adi" value="<?php echo ss($row["kategori_adi"]); ?>">
						</fieldset>

						<fieldset>
							<label>KATEGORİ AÇIKLAMASI</label>
							<textarea rows="3" name="kategori_desc"><?php echo ss($row["kategori_desc"]); ?></textarea>
						</fieldset>
						<fieldset>
							<label>KATEGORİ KEYWORDS:</label>
							<textarea rows="3" name="kategori_keyw"><?php echo ss($row["kategori_keyw"]); ?></textarea>
						</fieldset>
						<fieldset>
							<label>KATEGORİ ANASAYFA KONU (.php)</label>
							<input type="text" name="kategori_anasayfa_konu" value="<?php echo ss($row["kategori_anasayfa_konu"]); ?>">
						</fieldset>
						<fieldset>
							<label>KATEGORİ FULL KONU (.php)</label>
							<input type="text" name="kategori_full_konu" value="<?php echo ss($row["kategori_full_konu"]); ?>">
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
