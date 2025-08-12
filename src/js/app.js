document.addEventListener('DOMContentLoaded', function(){
    iniciaApp();
});

const reserva = {
    id: window.reservaData?.id || '',
    nombre: window.reservaData?.nombre || '',
    tipos: window.reservaData?.tipoId ? [{ id: String(window.reservaData.tipoId) }] : [],
    fecha: window.reservaData?.fecha || '',
    hora: window.reservaData?.hora || '',
    detalles: window.reservaData?.detalles || '',
    usuario: document.querySelector('#usuario')?.value || '',
    estado: window.reservaData?.estado || 0
}

function iniciaApp(){
    consultarAPI();
    idUsuario();
    datosReserva();
}

async function consultarAPI(){

    const url = '/api/tipos';

    const url = 'http://localhost:3000/api/tipos';

    const resultado = await fetch(url);
    const tipos = await resultado.json();
    mostrarTipos(tipos);
}

function mostrarTipos(tipos){
    tipos.forEach(tipo => {
        const {id, nombre} = tipo;

        const nombreTipo = document.createElement('P');
        nombreTipo.classList.add('nombre-tipo');
        nombreTipo.textContent = nombre;

        const tipoDiv = document.createElement('DIV');
        tipoDiv.classList.add('tipo');
        tipoDiv.dataset.idTipo = id;
        tipoDiv.onclick = function() {
            seleccionartipo(tipo);
        };

        tipoDiv.appendChild(nombreTipo);
        document.querySelector('#tipos').appendChild(tipoDiv);
    });

    // Marcar tipo previamente seleccionado si se está editando
    const tipoSeleccionado = reserva.tipos[0]?.id;
    if (tipoSeleccionado) {
        const divTipo = document.querySelector(`[data-id-tipo="${tipoSeleccionado}"]`);
        if (divTipo) {
            seleccionartipo({ id: tipoSeleccionado });
        }
    }
}

function seleccionartipo(tipo) {
    reserva.tipos = [tipo];
    const { id } = tipo;

    const tiposSeleccionados = document.querySelectorAll('.seleccionado');
    tiposSeleccionados.forEach(el => {
        el.classList.remove('seleccionado', 'amarillo', 'rojo', 'morado', 'gris', 'verde');
    });

    const divTipo = document.querySelector(`[data-id-tipo="${id}"]`);
    switch (id) {
        case '1': divTipo.classList.add('rojo'); break;
        case '2': divTipo.classList.add('morado'); break;
        case '3': divTipo.classList.add('verde'); break;
        case '4': divTipo.classList.add('amarillo'); break;
        case '5': divTipo.classList.add('gris'); break;
        default: console.warn('ID no reconocido');
    }

    divTipo.classList.add('seleccionado');
}

function idUsuario(){
    reserva.usuario = document.querySelector('#usuario').value;
}

function datosReserva(){
    const inputNombre = document.querySelector('#nombre');
    inputNombre.value = reserva.nombre;
    inputNombre.addEventListener('input', function(){
        reserva.nombre = inputNombre.value;
    });

    const inputFecha = document.querySelector('#fecha');
    inputFecha.value = reserva.fecha;
    inputFecha.addEventListener('input', function(){
        reserva.fecha = inputFecha.value;
    });

    const inputHora = document.querySelector('#hora');
    inputHora.value = reserva.hora;
    inputHora.addEventListener('input', function(){
        reserva.hora = inputHora.value;
    });

    const inputDetalles = document.querySelector('#detalles');
    inputDetalles.value = reserva.detalles;
    inputDetalles.addEventListener('input', function(){
        reserva.detalles = inputDetalles.value;
    });

    const selectEstado = document.querySelector('#estado');
    if (selectEstado) {
        selectEstado.value = reserva.estado;
        selectEstado.addEventListener('change', function(){
            reserva.estado = parseInt(selectEstado.value);
        });
    }

    const botonReserva = document.querySelector('#botonReserva');
    botonReserva.value = reserva.id ? 'Guardar Cambios' : 'Reservar';
    botonReserva.onclick = reservarFecha;
}

async function reservarFecha(event){
    event.preventDefault();

    if (!validarReserva()) return;

    const { nombre, fecha, hora, detalles, tipos, usuario, estado } = reserva;
    const idTipos = tipos.map(tipo => tipo.id);

    const datos = new FormData();
    datos.append('nombre', nombre);
    datos.append('fecha', fecha);
    datos.append('hora', hora);
    datos.append('detalles', detalles);
    datos.append('tipoId', idTipos);
    datos.append('usuarioId', usuario);
    datos.append('estado', estado);


    const url = '/api/reservas';

    const url = 'http://localhost:3000/api/reservas';

    const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
    });

    const resultado = await respuesta.json();

    if (resultado.resultado) {
        Swal.fire({
            title: reserva.id ? "Reserva actualizada" : "Reserva creada",
            text: reserva.id ? "Los cambios fueron guardados correctamente" : "Tu reserva se creó correctamente",
            icon: "success"
        }).then(() => {
            window.location.reload();
        });
    }
}

function validarReserva() {
    const { nombre, fecha, hora, detalles, tipos, usuario } = reserva;

    if (
        nombre.trim() === '' ||
        fecha.trim() === '' ||
        hora.trim() === '' ||
        detalles.trim() === '' ||
        tipos.length === 0 ||
        usuario.trim() === ''
    ) {
        Swal.fire({
            title: "Campos incompletos",
            text: "Por favor completa todos los campos antes de continuar.",
            icon: "warning"
        });
        return false;
    }

    return true;
}
