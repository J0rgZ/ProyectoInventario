<?php
define('VISTAS_DIR', "./vistas/");

$INCLUDE_ALLOW_LIST = [
     "home.php",
     "dashboard.php",
     "profile.php",
     "settings.php"
];

$vista = isset($_GET["vista"]) ? $_GET["vista"] : "";
if ($vista !== "" && in_array($vista, $INCLUDE_ALLOW_LIST) && is_file(VISTAS_DIR . $vista . ".php")) {
    require_once VISTAS_DIR . $vista . ".php";
}

require_once "./inc/session_start.php";

if(empty($_SESSION['id']) || empty($_SESSION['usuario'])){
    require_once VISTAS_DIR . "logout.php";
    exit();
}
require_once "./inc/navbar.php";

if ($vista === "login") {
    require_once VISTAS_DIR . "login.php";
} else {
    require_once VISTAS_DIR . "404.php";
}
?>
