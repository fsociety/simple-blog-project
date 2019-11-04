<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<link rel="shortcut icon" href="<?php echo TEMA_URL;?>/images/favicon.ico" />
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<?php tdk(); ?>
	<style type="text/css">@import url("<?php echo TEMA_URL;?>/css/reset.css");</style>
	<script type="text/javascript" src="<?php echo TEMA_URL;?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php echo TEMA_URL;?>/js/Museo_Sans_500_400.font.js"></script>
	<script type="text/javascript" src="<?php echo TEMA_URL;?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo TEMA_URL;?>/js/site.js"></script>
</head>
<body>
<!-- Genel -->
<div id="genel">

	<!-- Header -->
	<div id="header">
	
		<!-- Logo -->
		<div class="logo">
			<a href="<?php echo URL;?>/index.php">
				<img src="<?php echo TEMA_URL;?>/images/logo.png" alt="logo" />
			</a>
		</div>
		<!--#Logo -->
		
		<!-- Menü -->
		<div id="hMenu">
			<ul>
				<li class="m1 aktif"><a href="<?php echo URL;?>">Anasayfa</a></li>
				<li class="m2 <?php echo g("do") == "sayfa" ? g("link") == "hakkimda" ? 'aktif' :null :null ?>"><a href="<?php echo URL;?>/sayfa/hakkimda">Ben Kimim?</a></li>
				<li class="m5 <?php echo g("do") == "sayfa" ? g("link") == "iletisim" ? 'aktif' :null :null ?>"><a href="<?php echo URL;?>/sayfa/iletisim">İletişim</a></li>
			</ul>
		</div>
		<!--#Menü -->
	
	</div>
	<!--#Header -->
	
	<!-- Menü -->
	<div id="menu">
		<ul>
			<li class="anasayfa"><a href="<?php echo URL;?>/index.php">Anasayfa</a></li>
			<?php tema_kategoriler(); ?>
		</ul>
	</div>
	<!--#Menü -->
	
	<!-- İçerik -->
	<div class="icerikUst"></div>
	<div id="icerik">
	
		<!-- Sağ -->
		<div id="sag">
			
			<!-- Abone Ol -->
			<div class="sagBaslik">
				<h2>ARAMA</h2>
			</div>
			<div class="cizgi"></div>
			<div class="sagBlok">
				<div class="aboneOl">
					<ul>
						<li class="s2"><a href="mailto:mustafa.goktas07@gmail.com">Mail</a></li>
						<li class="s4"><a href="http://www.facebook.com/cizikcd" target="_blank">Facebook</a></li>
						<li class="s8"><a href="rssfeed.php">Rss</a></li>
					</ul>
					<div class="clear"></div>
					<div class="aboneYazi">
					
					</div>
					<div class="aboneInput">
					<form action="<?php echo URL."/index.php"; ?>" method="get">
					<input type="hidden" name="do" value="ara" />
						<span>
							<input type="text" name="kelime" placeholder="Ara..." />
						</span>
						</form>
					</div>
				</div>
			</div>
			<!--#Abone Ol -->
			
			<!-- Sponsor Bağlantılar
			<div class="sagBaslik scizgi">
				<h2>Sponsor Bağlantılar</h2>
			</div>
			<div class="cizgi"></div>
			<div class="sagBlok">
				<div class="sponsor">
					
					<div class="sponsorReklam">
						<span>
							<?php tema_reklam("sponsor"); ?>
						</span>
					</div>
					
					
					
					<div class="banner">
					
					</div>
					
					
				</div>
			</div>
			<!--#Sponsor Bağlantılar -->
			
			<!-- Öne Çıkanlar -->
			<div class="sagBaslik scizgi">
				<h2>Öne Çıkanlar</h2>
			</div>
			<div class="cizgi"></div>
			<div class="sagBlok">
				<div class="oneCikanlar">
					<ul>
						<?php tema_cok_okunanlar(); ?>
					</ul>
				</div>
				
				<!-- Banner2 
				<div class="banner2">
				
				</div>
				#Banner2 -->
				
			</div>
			<!--#Öne Çıkanlar -->
			
		</div>
		<!--#Sağ -->
	
		<!-- Sol -->
		<div id="sol">
		<?php tema_icerik(); ?>
		</div>
		<!--#Sol -->
	
	<div class="clear"></div>
	</div>
	<div class="icerikAlt"></div>
	<!--#İçerik -->
	
	<!-- Footer -->
	<div id="footer">
	
		<div class="fSag">
			<p>Tasarım: <a href="http://www.huseyinemanet.com">Hüseyin Emanet</a></p>
			<p style="padding-top: 3px">CSS: <a href="http://erbilen.net">Tayfun Erbilen</a></p>
		</div>
	
		<div class="fSol">
			<ul>
				<li><a href="#">Anasayfa</a>|</li>
				<li><a href="#">Ben Kimim?</a>|</li>
				<li><a href="#">Galeri</a>|</li>
				<li><a href="#">Dosyalar</a>|</li>
				<li><a href="#">Arşiv</a>|</li>
				<li><a href="#">İstatistikler</a>|</li>
				<li><a href="#">İletişim</a>|</li>
			</ul>
			<p>Tüm Hakları Saklıdır. &copy; 2012</p>
		</div>
	
	</div>
	<!--#Footer -->

</div>
<!--#Genel -->
</body>
</html>