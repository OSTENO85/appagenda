<h1 class="nombre-pagina"><i class="ti ti-globe"></i>Lugares</h1>


<div>

<div class="enlaces">
<a href="/principal-admin" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>

</div>

<div class="contenedor-principal">
  <a class="cajas cajas-l" href="/lugares-crear"><i class="ti ti-circle-plus"></i>Agregar Lugar</a>
</div>


<ul class="lugares">
<?php foreach($lugares as $lugar) {?>

    <li>
  
      <p><i class="ti ti-globe"></i><span> <?php echo $lugar->nombre; ?></span></p>

      <div class="acciones">
                    <a class="boton-modificar" href="/lugares-modificar?id=<?php echo $lugar->id;?>"> 
                    <i class="ti ti-align-box-center-middle"></i>
                    </a>
                </div>
 
    </li>
    </li>

  <?php } ?>


</ul>