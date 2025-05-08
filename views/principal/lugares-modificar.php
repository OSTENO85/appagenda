<h1 class="nombre-pagina"><i class="ti ti-globe"></i>Modificar Lugares</h1>

<div>
<div class="enlaces">
    <a href="/lugares-ver" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>


<?php
    include_once __DIR__ . '/../templates/alertas.php'
?>

<form method="POST" class="formulario">
<?php include_once __DIR__ . '/formulario-lugares.php'; ?>
<input type="submit" class="boton" value="Modificar Lugar">
</form>