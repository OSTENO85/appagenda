<h1 class="nombre-pagina">Facturas</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div>
<div class="enlaces">
    <a href="<?php echo $factura->estado == 1 ? '/factura-verCompletos' : '/factura-ver'; ?>" class="enlace">
        <i class="ti ti-arrow-big-left"></i>Volver
    </a>
</div>

    
<div class="contenedor-desglose">
<a href="/factura-items?id=<?php echo $factura->id ?>" class="botondesglose"><i class="ti ti-file-invoice"></i></a>

</div>



<?php if ($factura->estado == 1): ?>
    <p class="descripcion-pagina cancelado">Cancelada</p>
<?php endif; ?>




<h3 class="descripcion-pagina nombreFactura"><?php echo $factura->nombre; ?></h3>

<div id="app">
    
    <?php include_once __DIR__ . '/../templates/alertas.php'?>

    <form class="formulario" method="POST">

        <div class="campo">
            <label for="nombre">Nombre Factura</label>
            <input id="nombre" <?php echo $factura->estado == 1 ? 'disabled' : ''; ?> name="nombre" type="text" placeholder="Nombre Factura" value="<?php echo $factura->nombre; ?>">
        </div>

        <div class="campo">
            <label for="detalle">Detalles</label>
            <textarea id="detalle" <?php echo $factura->estado == 1 ? 'disabled' : ''; ?> name="detalle" rows="4" placeholder="Ingresa los detalles aquí"><?php echo htmlspecialchars($factura->detalle); ?></textarea>
        </div>

        <div class="campo">
    <label for="estado">Estado</label>
    <select id="estado" name="estado" <?php echo $factura->estado == 1 ? 'disabled' : ''; ?>>
    <option value="0" <?php echo $factura->estado == 0 ? 'selected' : ''; ?>>Pendiente</option>
    <option value="1" <?php echo $factura->estado == 1 ? 'selected' : ''; ?>>Completar</option>
</select>

</div>


<?php if ($factura->estado != 1): ?>
    <input type="submit" class="boton" value="Modificar Factura">
<?php endif; ?>


    </form>


</div>

<?php 
$script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'></script>
";
?>