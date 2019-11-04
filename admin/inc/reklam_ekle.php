<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php


if($_POST){

$reklam_baslik = p("reklam_baslik");
$reklam_text = p("reklam_text");

if(!$reklam_baslik || !$reklam_text){
echo '<h4 class="alert_error">Bir Reklam Girmelisiniz</h4>';
}else{

$query = query("select * from reklamlar where reklam_adi='$reklam_adi'");
if(rows($query)){
echo '<h4 class="alert_error">'.$reklam_baslik.' Adlı Sayfa Zaten Kullanılıyor. Başka Bir tane Deneyin...</h4>';
}else{
$insert = query("insert into reklamlar set
	reklam_adi='$reklam_baslik',
	reklam_text='$reklam_text'
	");

		if($insert){
		echo '<h4 class="alert_success">Reklam Başarıyla Eklendi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=reklamlar",1);
		}else{
		echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
		}

}

}

}


?>
		<article class="module width_full">
		<form action="" method="post">
			<header><h3>REKLAM EKLE</h3></header>
				<div class="module_content">
						<fieldset>
							<label>REKLAM BAŞLIĞI:</label>
							<input type="text" name="reklam_baslik">
						</fieldset>

						<fieldset>
							<label>REKLAM İÇERİĞİ</label>
							<textarea rows="10" name="reklam_text"></textarea>
						</fieldset>

						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Reklam Ekle" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
