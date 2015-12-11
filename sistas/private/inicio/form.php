<?php include_once ('index.php') ?>
<!-- CONTENEDOR INICIO -->

<!-- Menu -->
<div id="Menu"><?php require_once ('../../inc/sysmenu/vMenu.php') ?></div>

<!-- Info -->
<div id="Formularios"><?php if ($_SESSION["auth_tipo"]=='venta'){ include ('../tasas/main.php'); } ?></div>

