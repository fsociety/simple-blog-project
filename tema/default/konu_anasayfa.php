<div class="konu">
				<div class="solBaslik">
					<h2>
						<a href="<?php echo $link; ?>"><?php echo $baslik; ?></a>
					</h2>
				</div>
				
				<div class="konuIc">
									
					<div class="konuAc" id="konu_anasayfa">
					<?php echo $konu; ?>
					</div>
					
					
					
					<div class="konuAlt">
					<div class="konuUst" style="float:left; padding-left:10px;">
					<span class="kaKategori"><a href="<?php echo $katlink; ?>"><?php echo $kategori; ?></a></span>
					<span class="kaOkunma"><?php echo $okunma; ?> Görüntülenme</span>
					<span class="kaTarih"><?php echo $tarih; ?></span>
				</div>
					<a href="<?php echo $link; ?>"><div class="devam"></div></a>
					</div>
				<div class="clear"></div>
				</div>
			</div>