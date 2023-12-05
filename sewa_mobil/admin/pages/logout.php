<?php
session_start();
$_SESSION["login"] = [];
session_unset();
session_destroy();

// menghapus cookie
setcookie("xx", "", time() - 3600);
setcookie("yy", "", time() - 3600);

header("Location: ../../index.php");
exit;
