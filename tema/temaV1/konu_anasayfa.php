<!-- Konu --><div class="konu_content">	<div class="konu_baslik">	<div class="konu_tarih"><h2><?php echo $tarih2[2]; ?></h2><?php getAy($tarih2[1]); ?></div>	<h1><a href="<?php echo $link; ?>"><?php echo $baslik; ?></a></h1>	<div class="baslik_detay">		<span style="text-transform:capitalize;"><img src="<?php echo TEMA_URL; ?>/images/ikon1.png" alt="" /> <?php echo $row["uye_adi"]; ?></span>		<span><img src="<?php echo TEMA_URL; ?>/images/ikon2.png" alt="" /> <?php echo $okunma; ?> Okunma</span>			</div>	</div>	<div class="konu">	<?php echo $konu; ?>	</div>	<div class="konu_alt"></div></div><!--#Konu -->