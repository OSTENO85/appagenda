<h1 class="nombre-pagina">Agenda</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div>
<div class="enlaces">
    <a href="/agenda-dashboard" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>


<p class="descripcion-pagina">Eventos pendientes</p>

<div class="busqueda">
<form class="formulario">
    <div class="campo">
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
    </div>


</form>

<?php 
    if(count($reservas) ===0){
        echo "<h3> No hay reservas para esta fecha</h3>";
    }
?>


</div>

<div id="reservas-admin">
    <ul class="citas">
    <?php foreach($reservas as $reserva) {
        $tipoClase = 'tipo-' . strtolower($reserva->nombreTipo);
    ?>
         <a class="" href="/agenda-modificar?id=<?php echo $reserva->id;?>"> 
        <li class="reserva-card <?php echo $tipoClase; ?>">
            <div class="reserva-fecha">
            <i class="ti ti-calendar"></i>
                <p class="dia-semana"><?php echo strtoupper(date('D', strtotime($reserva->fecha))); ?></p>
                <p class="dia"><?php echo date('d', strtotime($reserva->fecha)); ?></p>
                <p class="mes"><?php echo strtoupper(date('M', strtotime($reserva->fecha))); ?></p>
            </div>



            <div class="reserva-info">
                <h3 class="evento-nombre"><?php echo strtoupper($reserva->nombreEvento); ?></h3>
                <span class="tipo-badge <?php echo $tipoClase; ?>">
                    <?php echo strtoupper($reserva->nombreTipo); ?>
                </span>

           
          
        </li>
    <?php } ?>
    </ul>
</div>


<?php
    $script = "<script src='build/js/buscador.js'></script>";
?>
