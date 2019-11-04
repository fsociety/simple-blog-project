<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
		<article class="module width_3_quarter" style="width:95%">
		<header>
		<div style="float:right; font-size:14px; font-weight:bold; padding:6px 10px;">
		<a href="<?php echo URL."/admin/index.php?do=icerik_ekle"; ?>">İÇERİK EKLE</a>
		</div>
		<h3 class="tabs_involved">ONAY BEKLEYEN İÇERİKLER</h3>
		</header>

		<div class="tab_container">
		<?php
		$sayfa = g("s") ? g("s") : 1;
		$ksayisi = rows(query("select konu_id from konular where konu_onay=0"));
		$limit = 10;
		$ssayisi = ceil($ksayisi/$limit);
		$baslangic = ($sayfa*$limit) - $limit;
		$query = query("select * from konular INNER JOIN uyeler ON uyeler.uye_id=konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id=konular.konu_kategori  where konu_onay=0 order by konu_id desc limit $baslangic,$limit ");

		if(rows($query)){		
		?>
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   					<th style="width:20px;"></th>
    				<th style="width:50%;">Başlık</th>
    				<th style="width:10%;">Ekleyen</th>
    				<th style="width:10%;">Kategori</th>
    				<th style="width:15%;">Tarih</th>
    				<th style="width:10%;">İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = row($query)){
			?>
				<tr>
   					<td><input type="checkbox"></td>
    				<td><?php echo ss($row["konu_baslik"]); ?></td>
    				<td><a href="<?php echo URL."/admin/index.php?do=uye_duzenle&id=".$row["uye_id"] ?>"><?php echo ss($row["uye_kadi"]); ?></a></td>
    				<td><a href="<?php echo URL."/admin/index.php?do=kategori_duzenle&id=".$row["kategori_id"] ?>"><?php echo $row["kategori_adi"]; ?></a></td>
    				<td><?php echo $row["konu_tarih"]; ?></td>
    				<td>
					<a href="<?php echo URL; ?>/admin/index.php?do=icerik_duzenle&id=<?php echo $row["konu_id"]; ?>"><img src="images/icn_edit.png" title="Düzenle"></a>
					<a onclick="return confirm('içeriği Silmek İstediğinize eminmisiniz?');" href="<?php echo URL; ?>/admin/index.php?do=icerik_sil&id=<?php echo $row["konu_id"]; ?>" style="margin-left:10px;"><img src="images/icn_trash.png" title="Sil"></a>
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
			<h4 class="alert_warning" style="margin-bottom:25px;">Henüz Onay Bekleyen İçerik Bulunmuyor...</h4>
			<?php }?>
		</div><!-- end of .tab_container -->
		<footer></footer>
		</article>
