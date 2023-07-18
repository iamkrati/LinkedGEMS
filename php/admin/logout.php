<?php
session_start();
unset($_SESSION["name"]);
unset($_SESSION["ses"]);
session_unset();
header("Location: /GLA_ALUMNI_PORTAL-1/menu.html");
?>