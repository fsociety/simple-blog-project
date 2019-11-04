<!-- Neredeyim -->
<div class="neredeyim">
	<h4><?php neredeyim(); ?></h4>
</div>
<!--#Neredeyim -->

<div id="giris">
	<h2>Giriş Yap</h2>
	<?php require_once PATH."/sistem/post/giris_post.php"; ?>
	<form action="" method="post">
		<ul>
			<li>Kullanıcı Adı:</li>
			<li><input type="text" name="kadi" /></li>
			<li>Şifre:</li>
			<li><input type="password" name="sifre" /></li>
			<li><button type="submit">Giriş Yap</button></li>
		</ul>
	</form>
</div>