<h1 class="nombre-pagina"><i class="com ti ti-chef-hat"></i>Modificar Comidas</h1>

<div>
<div class="enlaces">
    <a href="/comidas-ver" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>


<?php
    include_once __DIR__ . '/../templates/alertas.php'
?>


<form method="POST" class="formulario">

<?php include_once __DIR__ . '/formulario-comidas.php'; ?>

<input type="submit" class="boton" value="Modificar Comida">
</form>