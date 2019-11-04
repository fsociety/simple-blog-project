<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
		<article class="module width_3_quarter" style="width:95%">
		<header>
		<div style="float:right; font-size:14px; font-weight:bold; padding:6px 10px;">
		<a href="<?php echo URL."/admin/index.php?do=uye_ekle"; ?>">ÜYE EKLE</a>
		</div>
		<h3 class="tabs_involved">ONAY BEKLEYEN ÜYELER</h3>
		</header>

		<div class="tab_container">
		<?php
		$sayfa = g("s") ? g("s") : 1;
		$ksayisi = rows(query("select uye_id from uyeler where uye_onay=0"));
		$limit = 10;
		$ssayisi = ceil($ksayisi/$limit);
		$baslangic = ($sayfa*$limit) - $limit;
		$query = query("select * from uyeler where uye_onay=0 order by uye_id desc limit $baslangic,$limit ");

		if(mysqli_affected_rows($con)){		
		?>
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   					<th style="width:20px;"></th>
    				<th style="width:50%;">Üye Adı</th>
    				<th style="width:20%;">Üye E-posta</th>
    				<th>Tarih</th>
    				<th>İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = row($query)){
			?>
				<tr>
   					<td><input type="checkbox"></td>
    				<td><?php echo ss($row["uye_kadi"]); ?></td>
    				<td><?php echo ss($row["uye_eposta"]); ?></td>
    				<td><?php echo $row["uye_tarih"]; ?></td>
    				<td>
					<a href="<?php echo URL; ?>/admin/index.php?do=uye_duzenle&id=<?php echo $row["uye_id"]; ?>"><img src="images/icn_edit.png" title="Düzenle"></a>
					<a onclick="return confirm('Üyeyi Silmek İstediğinize eminmisiniz?');" href="<?php echo URL; ?>/admin/index.php?do=uye_sil&id=<?php echo $row["uye_id"]; ?>" style="margin-left:10px;"><img src="images/icn_trash.png" title="Sil"></a>
					</td>
				</tr>
<?php } ?>
			</tbody>
			</table>
			</div>
			<footer>
			<form action="" method="get">
			<input type="hidden" value="<?php echo g("do"); ?>" name="do">
			<select name="s" style="float:left;">
			<?php for($i = 1;$i <= $ssayisi;$i++){
			echo '<option ';
			echo $i == $sayfa ? 'selected ' : null;
			echo 'value="'.$i.'">'.$i.'.Sayfa</option>';
			} ?>
			</select>
			<div class="submit_link" style="float:left;">
					<input type="submit" value="Getir" class="alt_btn">
			</div>
			</form>
			</footer>

			<?php
					}else{
			?>
			<h4 class="alert_warning" style="margin-bottom:25px;">Henüz Onay Bekleyen Bir Üye Bulunmuyor...</h4>
			<?php }?>
		</div><!-- end of .tab_container -->
		<footer></footer>
		</article>
