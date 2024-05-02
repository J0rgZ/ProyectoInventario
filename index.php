<?php
// Definimos una constante para el directorio de las vistas
define('VISTAS_DIR', "./vistas/");

$INCLUDE_ALLOW_LIST = [
     "home.php",
     "dashboard.php",
     "profile.php",
     "settings.php"
];

$vista = $_GET["vista"];
if (in_array($vista, $INCLUDE_ALLOW_LIST)) {
   require_once VISTAS_DIR . $vista . ".php";
}

require_once "./inc/session_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once "./inc/head.php"; ?>
    </head>
    <body>
        <?php
            if(!isset($_GET['vista']) || $_GET['vista']==""){
                $_GET['vista']="login";
            }
            if(is_file(
VISTAS_DIR . $_GET['vista'] . ".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){
                /*== Cerrar sesion ==*/
                if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                    include_once VISTAS_DIR . "logout.php";
                    exit();
                }
                include_once "./inc/navbar.php";
                include_once VISTAS_DIR . $_GET['vista'] . ".php";
                include_once "./inc/script.php";
            }else{
                if($_GET['vista']=="login"){
                    include_once VISTAS_DIR . "login.php";
                }else{
                    include_once VISTAS_DIR . "404.php";
                }
            }
        ?>
    </body>
</html>
