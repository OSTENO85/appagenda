<h1 class="nombre-pagina">Agenda</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div>
<div class="enlaces">
    <a href="/agenda-dashboard" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<p class="descripcion-pagina">Selecciona la categoria del evento</p>

<div id="app">

    <div id="tipos" class="listado-tipos"></div>
    <p class="descripcion-pagina">Completa los siguientes datos</p>

    <form class="formulario">

        <div class="campo">
            <label for="nombre">Nombre Evento</label>
            <input id="nombre" type="text" placeholder="Nombre Evento">
        </div>

        <div class="campo">
            <label for="fecha">Fecha</label>
            <input id="fecha" type="date" min="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="campo">
            <label for="hora">Hora</label>
            <input id="hora" type="time">
        </div>

        <div class="campo">
            <label for="detalles">Detalles</label>
            <textarea id="detalles" rows="4" placeholder="Ingresa los detalles aquí"></textarea>
        </div>

        <div class="campo">
            <input id="usuario" type="hidden" value="<?php echo $id; ?>">
        </div>

        <input id="botonReserva" type="submit" class="boton" value="Crear Evento">

    </form>


</div>

<?php 
$script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'></script>
";
?>