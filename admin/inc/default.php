<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">Simple Blog</a></h1>
			<h2 class="section_title">Yönetim Paneli</h2><div class="btn_view_site"><a href="<?php echo URL; ?>" target="_blank">Siteyi Göster</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo session("uye_kadi"); ?> (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="#">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Yönetim Paneli</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>İÇERİK</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="index.php?do=icerik_ekle">Yeni İçerik Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=icerikler">İçerikleri Düzenle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=onay_bekleyen_icerikler">Onay Bekleyen İçerikler</a></li>
		</ul>
		<h3>SABİT SAYFALAR</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="index.php?do=sabit_sayfalar">Sabit Sayfalar</a></li>
			<li class="icn_edit_article"><a href="index.php?do=sayfa_ekle">Sayfa Ekle</a></li>
		</ul>
		<h3>KULLANICILAR</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="index.php?do=uye_ekle">Yeni Kullanıcı Ekle</a></li>
			<li class="icn_view_users"><a href="index.php?do=uyeler">Üyeleri Düzenle</a></li>
			<li class="icn_view_users"><a href="index.php?do=onay_bekleyen_uyeler">Onay Bekleyen Üyeler</a></li>
		</ul>
		<h3>KATEGORİLER</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="index.php?do=kategori_ekle">Yeni Kategori Ekle</a></li>
			<li class="icn_photo"><a href="index.php?do=kategoriler">Kategorileri Düzenle</a></li>
		</ul>
		<h3>REKLAM YÖNETİMİ</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="index.php?do=reklam_ekle">Reklam Ekle</a></li>
			<li class="icn_photo"><a href="index.php?do=reklamlar">Reklamları Düzenle</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="index.php?do=ayarlar">Genel Ayarlar</a></li>
			<li class="icn_jump_back"><a href="index.php?do=cikis_yap">Çıkış Yap</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 Blog</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<?php
		
		$do = g("do");
		if(file_exists("inc/{$do}.php")){
		require("inc/{$do}.php");
		}else{
		require("inc/anasayfa.php");
		}
		
		?>
	</section>