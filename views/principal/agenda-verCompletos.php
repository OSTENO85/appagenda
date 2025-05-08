<h1 class="nombre-pagina">Agenda</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div>
    <div class="enlaces">
        <a href="/agenda-dashboard" class="enlace">
            <i class="ti ti-arrow-big-left"></i> Volver
        </a>
    </div>

    <p class="descripcion-pagina">Eventos completos</p>

    <div class="busqueda">
        <form class="formulario" method="GET" action="">
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

    <div id="tabla-reservas-contenedor">
        <div class="tabla-reservas-wrapper">
            <table class="tabla-reservas-custom">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Evento</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($reservas as $reserva) { ?>
                    <tr>
                        <td data-label="Fecha"><?php echo date('d/m/Y', strtotime($reserva->fecha)); ?></td>
                        <td data-label="Evento"><?php echo strtoupper($reserva->nombreEvento); ?></td>
                        <td data-label="Tipo">
                            <span class="badge-tipo badge-<?php echo strtolower($reserva->nombreTipo); ?>">
                                <?php echo strtoupper($reserva->nombreTipo); ?>
                            </span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    $script = "<script src='build/js/buscador.js'></script>";
?>
