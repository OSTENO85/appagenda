<h1 class="nombre-pagina">Facturas</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div>
<div class="enlaces">
    <a href="/factura-dashboard" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>


<p class="descripcion-pagina">Crear Factura</p>

<div id="app">

  
    <p class="descripcion-pagina">Completa los siguientes datos</p>

    <?php include_once __DIR__ . '/../templates/alertas.php'?>

    <form class="formulario" method="POST" action="/factura-crear">

        <div class="campo">
            <label for="nombre">Nombre Factura</label>
            <input id="nombre" name="nombre" type="text" placeholder="Nombre Factura">
        </div>

        <div class="campo">
        <label for="nombre">Moneda</label>
        <select name="moneda" id="moneda" required>
            <option value="CRC">₡ Colones</option>
            <option value="USD">$ Dólares</option>
        </select>
        </div>


        <div class="campo">
            <label for="detalle">Detalles</label>
            <textarea id="detalle" name="detalle" rows="4" placeholder="Ingresa los detalles aquí"></textarea>
        </div>

        <input type="submit" class="boton" value="Crear Factura">

    </form>


</div>

<?php 
$script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'></script>
";
?>