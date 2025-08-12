

<div class="barra">

<h1 class="nombre-pagina">Hola <?php echo $_SESSION['nombre']; ?></h1>
<a href="/logout" class="boton">Cerrar Sesion</a>
</div>
<p class="descripcion-pagina">Fecha <?php echo date('d/m/Y'); ?></p>

<div class="contenedor-principal">
  <a class="cajas" href="/agenda-dashboard"><i class="ti ti-calendar"></i>Agenda</a>
  <a class="cajas" href="/lugares-ver"><i class="ti ti-globe"></i>Lugares</a>
  <a class="cajas" href="/comidas-ver"><i class="com ti ti-chef-hat"></i>Comidas</a>
<<<<<<< HEAD
  <a class="cajas" href=""><i class="ti ti-edit"></i>Usuario</a>
=======
  <a class="cajas" href="/factura-dashboard"><i class="ti ti-file-invoice"></i>Facturas</a>
>>>>>>> 25ce17e (nuevos cambios)

  <?php if ($_SESSION['perfil'] === '1') : // Verifica si es admin ?>
    <a class="cajas" href="/crear-cuenta"><i class="ti ti-settings"></i>Mantenimiento</a>
  <?php endif; ?>
</div>
