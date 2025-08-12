<h1 class="nombre-pagina">Modificar Agenda</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div>
<div class="enlaces">
    <a href="/agenda-dashboard" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<p class="descripcion-pagina">Selecciona la categoria del evento</p>

<div id="app">

    <p class="descripcion-pagina">Completa los siguientes datos</p>

<form class="formulario" method="POST">
<div class="campo">
    <label for="tipoId">Tipo</label>
    <select id="tipoId" name="tipoId">
        <option value="1" <?php echo $reserva->tipoId == 1 ? 'selected' : ''; ?>>Oscar</option>
        <option value="2" <?php echo $reserva->tipoId == 2 ? 'selected' : ''; ?>>Nadia</option>
        <option value="3" <?php echo $reserva->tipoId == 3 ? 'selected' : ''; ?>>Kinder</option>
        <option value="4" <?php echo $reserva->tipoId == 4 ? 'selected' : ''; ?>>Familiar</option>
        <option value="5" <?php echo $reserva->tipoId == 5 ? 'selected' : ''; ?>>Privada</option>
    </select>
</div>

<div class="campo">
    <label for="nombre">Nombre Evento</label>
    <input id="nombre" name="nombre" type="text" placeholder="Nombre Evento" value="<?php echo $reserva->nombre; ?>"/>
</div>

<div class="campo">
    <label for="fecha">Fecha</label>
<<<<<<< HEAD
    <input id="fecha" name="fecha" type="date" value="<?php echo $reserva->fecha; ?>"/>
=======
    <input id="fecha" name="fecha" type="date"  value="<?php echo $reserva->fecha; ?>"/>
>>>>>>> 25ce17e (nuevos cambios)
</div>

<div class="campo">
    <label for="hora">Hora</label>
    <input id="hora" name="hora" type="time" value="<?php echo $reserva->hora; ?>"/>
</div>

<div class="campo">
    <label for="detalles">Detalles</label>
    <textarea id="detalles" name="detalles" rows="4" placeholder="Ingresa los detalles aquí"><?php echo htmlspecialchars($reserva->detalles); ?></textarea>
</div>

<input type="hidden" name="usuario_id" value="<?php echo $id; ?>" />

        <div class="campo">
    <label for="estado">Estado</label>
    <select id="estado" name="estado">
        <option value="0" <?php echo $reserva->estado == 0 ? 'selected' : ''; ?>>Pendiente</option>
        <option value="1" <?php echo $reserva->estado == 1 ? 'selected' : ''; ?>>Completar</option>
    </select>
</div>


        <input id="botonReserva" type="submit" class="boton" value="Modificar Evento">

    </form>


</div>

<?php 
$script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'></script>
";

?>  


<script>
    window.reservaData = <?= json_encode($reserva); ?>;
</script>
