<?php

require_once "sistem/ayar.php";
require_once "sistem/sistem.php";


if($ayar['site_durum'] == 1){
//Site Açık

	require(TEMA."/index.php");

}else{
//Site Kapalı

echo "Site Kapalı...";

}

?>
