<?php
define('VISTAS_PATH', "./vistas/");

$INCLUDE_ALLOW_LIST = [
    'casa.php',
    'tablero.php',
    'perfil.php',
    'configuración.php'
];

// Función para verificar la sesión activa
function verificarSesionActiva() {
    if (empty($_SESSION['identificación']) || empty($_SESSION['usuario'])) {
        require_once VISTAS_PATH . 'cerrar sesión.php';
        exit();
    }
}

// Obtener la vista solicitada
$vista = $_GET["vista"] ?? '';

// Verificar si la vista solicitada está en la lista permitida y existe como archivo
if ($vista && in_array($vista, $INCLUDE_ALLOW_LIST) && is_file(VISTAS_PATH . $vista . ".php")) {
    require_once VISTAS_PATH . $vista . ".php";
} else {
    // Si la vista no está permitida o no existe, cargar la página 404
    require_once VISTAS_PATH . '404.php';
}

// Iniciar sesión si la vista solicitada es 'acceso'; de lo contrario, verificar la sesión activa
if ($vista === 'acceso') {
    require_once VISTAS_PATH . 'iniciar sesión.php';
} else {
    verificarSesionActiva();
}

// Incluir la barra de navegación
require_once "./inc/navbar.php";
?>