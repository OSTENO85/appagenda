<h1 class="nombre-pagina">Facturas</h1>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>


<div>
<div class="enlaces">
    <a href="/factura-dashboard" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<p class="descripcion-pagina">Facturas Pendientes</p>

<?php if(count($facturas) ===0){ ?>
<h3> No hay facturas pendientes</h3>
<?php  } else { ?>

    <ul class="listado-facturas">

    <?php foreach($facturas as $factura)  { ?>

        <li class="factura">
        <i class="ti ti-file-invoice"></i>
            <a href="/factura?id=<?php echo $factura->id ?>">
          
                 <?php echo $factura->nombre; ?>
               
                 <div class="contenedor-totales">
               
    <p class="monto-factura">
        <?php 
            $signo = $factura->moneda === 'CRC' ? '₡' : '$';
            echo $signo . ' ' . number_format($factura->total, 2);
        ?>
    </p>
    </a>
</div>

        
     
        </li>
     
    <?php  } ?>

    </ul>

   

    <?php } ?>

