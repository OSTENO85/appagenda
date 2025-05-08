<h1 class="nombre-pagina"><i class="com ti ti-chef-hat"></i> Comidas</h1>



<div>
<div class="enlaces">
    <a href="/principal-admin" class="enlace">
<i class="ti ti-arrow-big-left"></i>Volver</a>
</div>

<div class="contenedor-principal">
  <a class="cajas cajas-c" href="/comidas-crear"><i class="ti ti-circle-plus"></i>Agregar Comida</a>
</div>

<ul class="comidas">
<?php foreach($comidas as $comida) {?>

    <li>

      <p><i class="com ti ti-chef-hat"></i><span> <?php echo $comida->nombre; ?></span></p>
      <p><span> <?php echo $comida->tipo; ?></span></p>
      <div class="acciones">
                    <a class="boton-modificar" href="/comidas-modificar?id=<?php echo $comida->id;?>"> 
                    <i class="ti ti-align-box-center-middle"></i>
                    </a>
                </div>
 
    </li>

  <?php } ?>


</ul>