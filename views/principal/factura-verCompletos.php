<h1 class="nombre-pagina">Facturas</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>


<div>
<div class="enlaces">
    <a href="/factura-dashboard" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>


<p class="descripcion-pagina cancelado">CANCELADAS</p>

<?php if(count($facturas) ===0){ ?>
<h3> No hay facturas pagadas</h3>
<?php  } else { ?>

    <div id="tabla-reservas-contenedor">
        <div class="tabla-reservas-wrapper">
            <table class="tabla-reservas-custom">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($facturas as $factura) { ?>
                        <tr onclick="window.location.href='/factura?id=<?php echo $factura->id; ?>'" style="cursor: pointer;">
    <td data-label="id"><?php echo $factura->id; ?></td>
    <td data-label="nombre"><?php echo $factura->nombre; ?></td>
    <td data-label="Tipo">
    <?php 
        $signo = ($factura->moneda === 'CRC') ? '₡' : '$';
        echo $signo . ' ' . $factura->total; 
    ?>
</td>

</tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <?php } ?>