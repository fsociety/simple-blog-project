<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php


if($_POST){

$sayfa_baslik = p("sayfa_baslik");
$sayfa_link = sef_link($sayfa_baslik);
$sayfa_icerik = p("sayfa_icerik");

if(!$sayfa_baslik){
echo '<h4 class="alert_error">Bir Sayfa Adı Girmelisiniz</h4>';
}else{

$query = query("select * from sayfalar where sayfa_link='$sayfa_link'");
if(rows($query)){
echo '<h4 class="alert_error">'.$sayfa_baslik.' Adlı Sayfa Zaten Kullanılıyor. Başka Bir tane Deneyin...</h4>';
}else{
$insert = query("insert into sayfalar set
	sayfa_baslik='$sayfa_baslik',
	sayfa_link='$sayfa_link',
	sayfa_icerik='$sayfa_icerik'");

		if($insert){
		echo '<h4 class="alert_success">Sayfa Başarıyla Eklendi. Yönlendiriliyorsunuz...</h4>';
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
			<header><h3>SAYFA EKLE</h3></header>
				<div class="module_content">
						<fieldset>
							<label>SAYFA BAŞLIĞI:</label>
							<input type="text" name="sayfa_baslik">
						</fieldset>

						<fieldset>
							<label>SAYFA İÇERİĞİ</label>
							<textarea rows="10" name="sayfa_icerik"></textarea>
						</fieldset>

						<div class="clear"></div>
				</div>

			<footer>
				<div class="submit_link">
					<input type="submit" value="Sayfa Ekle" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
