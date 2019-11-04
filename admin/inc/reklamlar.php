<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
		<article class="module width_3_quarter" style="width:95%">
		<header>
		<div style="float:right; font-size:14px; font-weight:bold; padding:6px 10px;">
		<a href="<?php echo URL."/admin/index.php?do=reklam_ekle"; ?>">REKLAM EKLE</a>
		</div>
		<h3 class="tabs_involved">REKLAMLAR</h3>
		</header>

		<div class="tab_container">
		<?php

		$query = query("select * from reklamlar order by reklam_id desc");
		if(mysqli_affected_rows($con)){		
		?>
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
   					<th style="width:20px;"></th>
    				<th style="width:70%;">Reklam Başlığı</th>
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
    				<td><?php echo ss($row["reklam_adi"]); ?></td>
    				<td><?php echo $row["reklam_tarih"]; ?></td>
    				<td>
					<a href="<?php echo URL; ?>/admin/index.php?do=reklam_duzenle&id=<?php echo $row["reklam_id"]; ?>"><img src="images/icn_edit.png" title="Düzenle"></a>
					<a onclick="return confirm('Reklamı Silmek İstediğinize eminmisiniz?');" href="<?php echo URL; ?>/admin/index.php?do=reklam_sil&id=<?php echo $row["reklam_id"]; ?>" style="margin-left:10px;"><img src="images/icn_trash.png" title="Sil"></a>
					</td>
				</tr>
<?php } ?>
			</tbody>
			</table>
			</div>

			<?php
					}else{
			?>
			<h4 style="margin-bottom:26px;" class="alert_warning">Henüz Bir Reklam Eklenmemiş...</h4>
			 <footer>
			 </footer>
			<?php }?>
		</div><!-- end of .tab_container -->

		</article>
