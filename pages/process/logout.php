<?php
session_start();
session_reset();
session_unset();
session_destroy();
//echo '';
setcookie('emailcookie','',time()-604800);// deleting email cookie
setcookie('passwordcookie','',time()-604800);// deleting password cookie
header('Location: ../../index.php');
exit();
?>
<script> localStorage.setItem("theme", "light"); </script>