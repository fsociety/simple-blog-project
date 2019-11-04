<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

		<article class="module width_full">
		<form action="" method="post">
			<header><h3>KONU SİL</h3></header>
				<div class="module_content">
<?php
	$id = g("id");
	$delete = query("delete from konular where konu_id='$id'");
	if($delete){
	echo '<h4 class="alert_success">Konu Başarıyla Silindi. Yönlendiriliyorsunuz...</h4>';
			go(URL."/admin/index.php?do=icerikler",1);
	}else{
	echo '<h4 class="alert_warning">Bir Mysql Hatası Oldu : '.mysqli_error($con).'</h4>';
	}


?>
				</div>

			<footer>
			</footer>
			</form>
		</article><!-- end of post new article -->
