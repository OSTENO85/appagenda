<h1 class="nombre-pagina"><i class="ti ti-globe"></i>Agregar Lugares</h1>

<div>
<div class="enlaces">
    <a href="/lugares-ver" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<p class="descripcion-pagina">Llena los siguientes campos para agregar un nuevo lugar</p>



<?php
    include_once __DIR__ . '/../templates/alertas.php'
?>

<form action="/lugares-crear" method="POST" class="formulario">
<?php include_once __DIR__ . '/formulario-lugares.php'; ?>
<input type="submit" class="boton" value="Guardar Lugar">
</form>