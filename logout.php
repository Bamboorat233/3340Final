<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // 登出后返回登录页
exit;
?>
