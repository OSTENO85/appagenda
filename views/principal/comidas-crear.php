<h1 class="nombre-pagina"><i class="com ti ti-chef-hat"></i>Agregar Comidas</h1>

<div>
<div class="enlaces">
    <a href="/comidas-ver" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<p class="descripcion-pagina">Llena los siguientes campos para agregar una nueva comida</p>

<?php
    include_once __DIR__ . '/../templates/alertas.php'
?>


<form action="/comidas-crear" method="POST" class="formulario">

<?php include_once __DIR__ . '/formulario-comidas.php'; ?>

<input type="submit" class="boton" value="Guardar Comida">
</form>