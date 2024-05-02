<?php
define('VISTAS_DIR', "./vistas/");

$vista = $_GET["vista"];
if (isset($vista) && in_array($vista, $INCLUDE_ALLOW_LIST)) {
    require_once VISTAS_DIR . $vista . ".php";
}

require_once "./inc/session_start.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once "./inc/head.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<?php
if(!isset($_GET['vista']) || $_GET['vista']==""){
    $_GET['vista']="login";
}
if(is_file(VISTAS_DIR . $_GET['vista'] . ".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){
    /*== Cerrar sesión ==*/
    if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
        require_once VISTAS_DIR . "logout.php";
        exit();
    }
    require_once "./inc/navbar.php";
    require_once VISTAS_DIR . $_GET['vista'] . ".php";
    require_once "./inc/script.php";
} else {
    if($_GET['vista']=="login"){
        require_once VISTAS_DIR . "login.php";
    } else {
        require_once VISTAS_DIR . "404.php";
    }
}
?>
</body>
</html>