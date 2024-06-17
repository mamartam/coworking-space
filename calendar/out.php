<?php
session_start();
session_destroy();
header('Location: /CoWorkingSpace/mainFolder/mainPage/index.html');
exit;
?>