<?php
 require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyonlar.php";
define("ADMIN",true);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Cizikcd - Yönetim Paneli</title>

	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
    	{
      	  $(".tablesorter").tablesorter();
   	 }
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
</head>
<body>

<?php
if($_SESSION["login"] && session("uye_rutbe") == 1){
require_once "inc/default.php";
}else{

if($_POST){
$kadi = p("kadi");
$sifre = md5(p("sifre"));

if(!$kadi || !$sifre){
echo "Kullanıcı Adı Veya Şifre Boş Bırakılamaz !";
}else{
$query = query("select * from uyeler WHERE uye_kadi = '$kadi' && uye_sifre = '$sifre' && uye_rutbe = 1");
if(mysqli_affected_rows($con)){

	$row = row($query);
	$session = array(
	"login" => true,
	"uye_id" => $row['uye_id'],
	"uye_rutbe" => $row['uye_rutbe'],
	"uye_kadi" => $row['uye_kadi']
	);
	session_olustur($session);

	go(URL."/admin");

}else{
echo '<font color="red">Bölye Bir Yönetici Bulunmuyor !</font>';
}
}

}
?>

<div id="giris_yap">
<form action="" method="post">
<table cellspacing="0" cellpadding="0">
<tr>
	<td>Kullanıcı Adı:</td>
	<td><input type="text" name="kadi" /></td>
</tr>
<tr>
	<td>Şifre:</td>
	<td><input type="password" name="sifre" /></td>
</tr>
<tr>
	<td></td>
	<td><button type="submit">Giriş Yap</button></td>
</tr>
</table>
</form>
</div>

<?php
}
?>

</body>

</html>
