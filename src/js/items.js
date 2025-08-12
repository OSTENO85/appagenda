(function(){

    obtenerItems();


    //boton para mostrar modal
    const nuevoItemBtn = document.querySelector('#agregar-item');
    nuevoItemBtn.addEventListener('click', mostrarFormulario);

    async function obtenerItems(){
        try {
            const id = obtenerFactura();
            const url = `/api/items?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            const {items} = resultado;
            mostrarItems(items);
            
        } catch (error) {
            console.log(error);
        }
    }

    function mostrarItems(items){
        const contenedorItems = document.querySelector('#listado-items');
        contenedorItems.innerHTML = ''; // Limpia antes de volver a renderizar
     
        if(items.length === 0){
             const textoNoItems = document.createElement('LI');
             textoNoItems.textContent = 'No hay Items';
             textoNoItems.classList.add('no-items');
             contenedorItems.appendChild(textoNoItems);
     
             // Si no hay items, el total es 0 y también lo actualizamos en BD
             actualizarTotalFactura(0);
             return;
        }
     
        let total = 0;
     
        items.forEach(item => {
             const li = document.createElement('LI');
             li.dataset.itemId = item.id;
             li.classList.add('item');
     
             const nombreItem = document.createElement('P');
             nombreItem.textContent = item.nombre;
     
             const montoItem = document.createElement('P');
             montoItem.textContent = item.monto;
     
             total += parseFloat(item.monto) || 0;
     
             li.appendChild(nombreItem);
             li.appendChild(montoItem);
             contenedorItems.appendChild(li);
        });
     
        const totalElemento = document.createElement('DIV');
        totalElemento.classList.add('total-items');
        totalElemento.textContent = `Total: ${total.toFixed(2)}`;
        contenedorItems.appendChild(totalElemento);
     
        // 📌 Actualizar total en la BD
        actualizarTotalFactura(total);
     }
     
     
    
    function mostrarFormulario(){
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML = `

       <form class="formulario nuevo-item" method="POST" action="">
    <legend>Añade un nuevo item</legend>

    <div class="campo">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre item" required>
    </div>

    <div class="campo">
        <label for="monto">Monto</label>
        <input type="number" name="monto" id="monto" placeholder="Ej: 1000" step="0.01" required>
    </div>

    <div class="opciones">
        <input type="submit" class="submit-nuevo-item" value="Añadir Item">
        <button type="button" class="cerrar-modal">Cerrar</button>
    </div>
</form>

        `;

        setTimeout(()=>{
            const formulario = document.querySelector('.formulario')
            formulario.classList.add('animar');
        }, 0)

modal.addEventListener('click', function(e){
    e.preventDefault();

    if(e.target.classList.contains('cerrar-modal')){
        const formulario = document.querySelector('.formulario');
        formulario.classList.add('cerrar');

        setTimeout(() => {
            modal.remove();
        }, 100);
        
        }
///////////////////////boton añadir item////////////////////////
if(e.target.classList.contains('submit-nuevo-item')){
    submitFormularioNuevoItem();
}
})
    document.querySelector('body').appendChild(modal);  
 }
    function submitFormularioNuevoItem(){
    const nombre = document.querySelector('#nombre').value.trim();
    const monto = document.querySelector('#monto').value.trim();
    if(nombre === ''){
        mostrarAlerta(
            'El nombre es obligatorio',
            'error',
            document.querySelector('.formulario legend')
        );
        return;
    }
    if(monto === ''){
        mostrarAlerta(
            'El monto es obligatorio',
            'error',
            document.querySelector('.formulario legend')
        );
        return;
    }
    

    agregarItem(nombre, monto);

 }   

 function mostrarAlerta(mensaje, tipo, referencia){
    //previene creacion de multiples alertas
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia){
        alertaPrevia.remove();
    }

    const alerta = document.createElement('DIV');
    alerta.classList.add('alerta', tipo);
    alerta.textContent = mensaje;

    referencia.parentElement.insertBefore(alerta, referencia);

    //eliminar la alerta
    setTimeout(() => {
        alerta.remove();
    },5000);
 }

 async function agregarItem(nombre, monto){
    const datos = new FormData();
    datos.append('nombre', nombre);
    datos.append('monto', monto);
    datos.append('facturaId', obtenerFactura());

    try{
        const url = 'http://localhost:3000/api/items';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });
        const resultado = await respuesta.json();

        mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.formulario legend'));

        if(resultado.tipo == 'exito'){
            // 📌 Recargar items y recalcular total
            obtenerItems();

            const modal = document.querySelector('.modal');
            setTimeout(() => {
                modal.remove();
            }, 300);
        }

    }catch (error){
        console.log(error);
    }
}



function obtenerFactura(){
    const facturaParams = new URLSearchParams(window.location.search);
    const factura = Object.fromEntries(facturaParams.entries());
    return factura.id;

}

async function actualizarTotalFactura(total){
    try {
        const facturaId = obtenerFactura();
        const datos = new FormData();
        datos.append('id', facturaId);
        datos.append('total', total.toFixed(2));

        const url = '/api/facturas/actualizar-total';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();
        console.log('Total actualizado:', resultado);
    } catch (error) {
        console.error('Error actualizando el total:', error);
    }
}



})();