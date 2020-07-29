<?php
session_start();
//destroy session
session_destroy();
//unset cookies
header("Location: index.php");
?>