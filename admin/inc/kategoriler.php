<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
		<article class="module width_3_quarter" style="width:95%">
		<header>
		<div style="float:right; font-size:14px; font-weight:bold; padding:6px 10px;">
		<a href="<?php echo URL."/admin/index.php?do=kategori_ekle"; ?>">KATEGORİ EKLE</a>
		</div>
		<h3 class="tabs_involved">KATEGORİ LİSTESİ</h3>
		</header>

		<div class="tab_container">
		<?php

		$query = query("select * from kategoriler order by kategori_id desc");
		if(rows($query)){		
		?>
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   					<th style="width:20px;"></th>
    				<th style="width:70%;">Kategori</th>
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
    				<td><?php echo ss($row["kategori_adi"]); ?></td>
    				<td><?php echo $row["kategori_tarih"]; ?></td>
    				<td>
					<a href="<?php echo URL; ?>/admin/index.php?do=kategori_duzenle&id=<?php echo $row["kategori_id"]; ?>"><img src="images/icn_edit.png" title="Düzenle"></a>
					<a onclick="return confirm('Kategoriyi Silmek İstediğinize eminmisiniz?');" href="<?php echo URL; ?>/admin/index.php?do=kategori_sil&id=<?php echo $row["kategori_id"]; ?>" style="margin-left:10px;"><img src="images/icn_trash.png" title="Sil"></a>
					</td>
				</tr>
<?php } ?>
			</tbody>
			</table>
			</div>

			<?php
					}else{
			?>
			<h4 class="alert_warning">Henüz Bir Kategori Eklenmemiş...</h4>
			<?php }?>
		</div><!-- end of .tab_container -->

		</article>
