<h1 class="nombre-pagina">Facturas</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>


<div>
<div class="enlaces">
    <a href="/factura?id=<?php echo $factura->id ?>"class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<h3 class="descripcion-pagina nombreFactura"><?php echo $factura->nombre; ?></h3>

<div class="contenedor-sm">

<?php if ($factura->estado == 1): ?>
    <p class="descripcion-pagina cancelado">Cancelada</p>
<?php endif; ?>

<div class="contenedor-nuevo-item">
    <button type="button" class="agregar-item" id="agregar-item" <?php if ($factura->estado == 1) echo 'style="display:none;"'; ?>><i class="ti ti-shopping-bag-plus"></i></button>

</div>

<ul id="listado-items" class="listado-items">

</ul>

</div>


<?php 
$script = "
   <script src='build/js/items.js'></script>
";
?>