<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
session_destroy();
go(URL."/admin",1);
?>
<h4 class="alert_success">Başarıyla Çıkış Yaptınız. Yönlendiriliyorsunuz...</h4>