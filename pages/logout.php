<?php
session_start();
session_reset();
session_unset();
session_destroy();
setcookie('emailcookie','',time()-604800);// deleting email cookie
setcookie('passwordcookie','',time()-604800);// deleting password cookie
header('Location: ../index.php');
exit();
?>