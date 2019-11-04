<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<link rel="shortcut icon" href="<?php echo TEMA_URL;?>/images/favicon.ico" />
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<?php tdk(); ?>

	<link rel="stylesheet" href="<?php echo TEMA_URL; ?>/css/style.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#SearchForm").submit(function(event){
				var SearchKey = $("#SearchForm input[name=kelime]").val();
				window.location.href = "<?php echo URL; ?>/arama/"+SearchKey;

				event.preventDefault();
			});
		});
	</script>
	<script type="text/javascript" src="<?php echo URL; ?>/sistem.js"></script>
</head>
<body>
<!-- Genel -->
<div id="genel">

	<!-- Header -->
	<div id="header">

		<!-- Reklam -->
		<div class="reklam">

		<?php tema_reklam("sponsor"); ?>

		</div>

		<!-- Logo -->
		<a href="<?php echo URL; ?>"><img src="<?php echo TEMA_URL; ?>/images/logo.png" alt="" /></a>

		<div style="clear: both"></div>

		<!-- Menü -->
		<div id="menu">
		<a href="<?php echo URL; ?>">anasayfa</a><a href="<?php echo URL."/sayfa/hakkimda" ?>">hakkımda</a><a href="<?php echo URL."/sayfa/iletisim" ?>" style="background: none">iletişim</a>
		</div>
		<!--#Menü -->

	</div>
	<!--#Header -->

	<!-- Sağ -->
	<div id="sag">

		<!-- Arama -->
		<div class="aramabas">Arama</div>
		<ul id="kategoriler">
		<form action="" method="get" id="SearchForm">
		<input type="hidden" name="do" value="ara" />
		<button class="arama" type="submit">ARA</button><input name="kelime" type="text" class="arama" />
		</form>
		</ul>
		<div class="sag_alt2"></div>
		<!--#Arama -->
		<div style="clear: both"></div>

		<!-- Kategori -->
		<div class="sag_bas2">Kategoriler</div>
		<ul id="kategoriler">
		<?php tema_kategoriler(); ?>
		</ul>
		<div class="sag_alt2"></div>
		<!--#Kategori -->
		<div style="clear: both"></div>

		<!-- Çok okunanlar -->
		<div class="sag_bas3">Öne Çıkanlar</div>
		<ul id="kategoriler">
		<?php tema_cok_okunanlar(); ?>
		</ul>
		<div class="sag_alt2"></div>
		<!--#Çok okunanlar -->




	</div>
	<!--#Sağ -->

	<!-- Sol -->
	<div id="sol">
	<?php tema_icerik(); ?>
	</div>
	<!--#Sol -->

</div>
<!--#Genel -->

<!-- Footer -->
<div id="footer">
<div class="footer">
<div style="float: right"><a href="#"><img src="<?php echo TEMA_URL; ?>/images/tasarim.png" alt="" /></a></div>
Tüm Hakları Saklıdır. &copy; 2013 - Cizikcd.com
</div>
</div>
<!--#Footer -->
</body>
</html>
