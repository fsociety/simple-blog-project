<?php !defined("ADMIN") ? die("Hacking?") : null;

$id = g("id");
$query = query("select * from reklamlar WHERE reklam_id='$id'");
$row = row($query);
if(mysqli_affected_rows($con) < 1){
go(URL."/admin");
exit;
}

if($_POST){

$reklam_adi = p("reklam_adi");
$reklam_text = p("reklam_text");

if(!$reklam_adi){
echo '<h4 class="alert_error">Bir Reklam Adı Girmelisiniz</h4>';
}else{
	
	$insert = query("UPDATE reklamlar SET
			reklam_adi='$reklam_adi',
			reklam_text='$reklam_text'
			where reklam_id='$id'
			");
	if($insert){
	echo '<h4 class="alert_success">Reklam Başarıyla Güncellendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=reklamlar",1);
	}else{
	echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
	}


}

}

?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>Reklam Duzenle</h3></header>
				<div class="module_content">
						<fieldset>
							<label>REKLAM BAŞLIĞI:</label>
							<input type="text" name="reklam_adi" value="<?php echo ss($row["reklam_adi"]); ?>">
						</fieldset>
						<fieldset>
							<label>REKLAM İÇERİĞİ</label>
							<textarea rows="10" name="reklam_text"><?php echo ss($row["reklam_text"]); ?></textarea>
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
