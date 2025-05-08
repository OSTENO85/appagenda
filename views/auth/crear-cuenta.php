<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena los datos para crear una cuenta</p>

<div class="enlaces">
<a href="/principal-admin" class="enlace">
    <i class="ti ti-arrow-big-left"></i>Volver</a>

<a href="/ver-cuenta" class="enlace">
    <i class="ti ti-zoom"></i> Ver Cuentas</a>
</div>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="crear-cuenta">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre Usuario" value="<?php echo s($usuario->nombre);?>">
    </div>

    <div class="campo">
        <label for="nombre">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido Usuario" value="<?php echo s($usuario->apellido);?>">
    </div>

    <div class="campo">
        <label for="nombre">Correo</label>
        <input type="email" id="email" name="email" placeholder="Email Usuario" value="<?php echo s($usuario->email);?>">
    </div>

    <div class="campo">
    <label for="perfil">Perfil</label>
    <select id="perfil" name="perfil">
        <option value="" disabled <?php echo (!isset($usuario->perfil) || $usuario->perfil === '') ? 'selected' : ''; ?>>--Seleccionar Perfil--</option>
        <option value="1" <?php echo (isset($usuario->perfil) && $usuario->perfil == 1) ? 'selected' : ''; ?>>Admin</option>
        <option value="0" <?php echo (isset($usuario->perfil) && $usuario->perfil == 0) ? 'selected' : ''; ?>>Cliente</option>
    </select>
</div>


    <div class="campo">
        <label for="nombre">Password</label>
        <input type="password" id="password" name="password" placeholder="Password Usuario">
    </div>



    <input type="submit" class="boton" value="Crear Cuenta">


</form>



<?php 
$script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'></script>
";
?>

