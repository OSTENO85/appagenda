<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" placeholder="Nombre Comida" name="nombre" value="<?php echo $comida->nombre; ?>"/>
</div>

<div class="campo">
    <label for="tipo">Tipo</label>
    <?php 
$tipos = ['Desayuno', 'Almuerzo/Cena', 'Tragos'];
?>
<select id="tipo" name="tipo">
    <option value="">Seleccione una opción</option>
    <?php foreach ($tipos as $tipo): ?>
        <option value="<?php echo $tipo; ?>" <?php if (isset($comida->tipo) && trim($comida->tipo) == $tipo) echo 'selected'; ?>>
            <?php echo $tipo; ?>
        </option>
    <?php endforeach; ?>
</select>
</div>


<div class="campo">
    <label for="descripcion">Detalles</label>
    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Ingresa la descripcion aquí"><?php echo htmlspecialchars($comida->descripcion); ?></textarea>
</div>
