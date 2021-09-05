let pagina = 1;
document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    registrarCliente();
    mostrarSeccion();
    cambiarSeccion();
    wachBoton();
}

try {
    const lista1 = document.querySelector('.lista1');
    const lista2 = document.querySelector('.lista2');

    Sortable.create(lista1, {
        group: 'shared',
        animation: 150
    });

    Sortable.create(lista2, {
        group: 'shared',
        animation: 150

    });
} catch (error) {
    console.log(error);
}


function registrarCliente() {

    if (document.querySelector('#registrar') != null && document.querySelector('#overlay') != null) {

        const registrar = document.querySelector('#registrar');
        const overlay = document.querySelector('#overlay');

        registrar.addEventListener('click', e => {
            if (overlay.classList.contains('overlay')) {
                overlay.classList.remove('overlay');
                overlay.classList.add('overlays');
            } else {
                overlay.classList.remove('overlays');
                overlay.classList.add('overlay');
            }
        });

        const cerrarForm = document.querySelector('.cerrar')

        cerrarForm.addEventListener('click', e => {
            overlay.classList.remove('overlays');
            overlay.classList.add('overlay');
        });
    }
}


function mostrarSeccion() {
    const seccionActual = document.querySelector(`#paso-${pagina}`);
    seccionActual.classList.add('mostrar-seccion');

    //Resalta el tab actual
    const tab = document.querySelector(`[data-paso="${pagina}"]`);
    tab.classList.add('actual');
}


function cambiarSeccion() {
    const enlaces = document.querySelectorAll('.tabs button img');
    enlaces.forEach(enlace => {
        enlace.addEventListener('click', (e) => {
            e.preventDefault();
            pagina = parseInt(e.target.dataset.paso);

            // Eliminar la seccion anterior
            document.querySelector('.mostrar-seccion').classList.remove('mostrar-seccion');

            //Agraga
            const seccion = document.querySelector(`#paso-${pagina}`);
            seccion.classList.add('mostrar-seccion');

            //Elimina tab activado anterior
            document.querySelector('.tabs .actual').classList.remove('actual');
            //Activa tab activado
            const tab = document.querySelector(`[data-paso="${pagina}"]`);
            tab.classList.add('actual');

        })
    })
}


function wachBoton() {
    const d = document.querySelector('#btntable');
    d.addEventListener('click', e => {
        cargarUsGen();
    });
}

async function cargarUsGen() {
    try {
        const resultado = await fetch('insertUsGen.php');
        const db = await resultado.json();
        console.log(db);
        tablaUsuGen(db);
        actualizarUsuGen();

    } catch (error) {
        console.log(error);
    }
}



/* Funcionde buscar para usuario general */
const buscar = document.querySelector('#formulario');
buscar.addEventListener('submit', e => {
    e.preventDefault();
    const datos = new FormData(buscar);


    fetch('insertUsGen.php', {
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            tablaUsuGen(data)
        })

    document.querySelector('[data-paso="1"]').classList.remove('actual');
    document.querySelector('.mostrar-seccion').classList.remove('mostrar-seccion');
    document.querySelector('#paso-2').classList.add('mostrar-seccion');
    document.querySelector(`[data-paso="2"]`).classList.add('actual');

});


function tablaUsuGen(db) {
    const tbody = document.querySelector('.tbody');
    tbody.textContent = '';
    db.forEach(db => {
        const { doc, nom, ape, correo, celular, sexo, fechanaci, fechanIn, direc, ciudad } = db;

        const row = document.createElement('TR');

        const documento = document.createElement('TD');
        documento.textContent = `${doc}`;

        const nombre = document.createElement('TD');
        nombre.textContent = `${nom}`;

        const apellido = document.createElement('TD');
        apellido.textContent = `${ape}`;

        const phone = document.createElement('TD');
        phone.textContent = `${celular}`;

        const gmail = document.createElement('TD');
        gmail.textContent = `${correo}`;

        const genero = document.createElement('TD');
        genero.textContent = `${sexo}`;

        const naci = document.createElement('TD');
        naci.textContent = `${fechanaci}`;

        const ingreso = document.createElement('TD');
        ingreso.textContent = `${fechanIn}`;

        const direction = document.createElement('TD');
        direction.textContent = `${direc}`;

        const city = document.createElement('TD');
        city.textContent = `${ciudad}`;

        const actualizar = document.createElement('TD');
        const eliminar = document.createElement('TD');

        const formEli = document.createElement('FORM');
        formEli.method = 'POST';
        formEli.classList.add('formeliminar');
        formEli.addEventListener('submit', e => {
            e.preventDefault();
            if (confirm('Seguro deseas Eliminarlo')) {

                const datos = new FormData(formEli);

                console.log(datos.get('codigoE'));

                fetch('insertUsGen.php', {
                    method: 'POST',
                    body: datos
                })
                    .then(res => res.json())
                    .then(data => {
                        tablaUsuGen(data)
                    })
            }
        });

        const formAct = document.createElement('FORM');
        formAct.method = 'POST';
        formAct.classList.add('formactualizar');
        formAct.addEventListener('submit', e => {
            e.preventDefault();
            const datos = new FormData(formAct);

            console.log(datos.get('codigoA'));


            fetch('insertUsGen.php', {
                method: 'POST',
                body: datos
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                })
            document.querySelector('[data-paso="2"]').classList.remove('actual');
            document.querySelector('.mostrar-seccion').classList.remove('mostrar-seccion');
            document.querySelector('#paso-3').classList.add('mostrar-seccion');
            document.querySelector(`[data-paso="3"]`).classList.add('actual');
        });

        const inputdoc = document.createElement('INPUT');
        inputdoc.type = 'hidden';
        inputdoc.name = 'codigoE';
        inputdoc.value = `${doc}`;
        formEli.appendChild(inputdoc);

        const inputdo = document.createElement('INPUT');
        inputdo.type = 'hidden';
        inputdo.name = 'codigoA';
        inputdo.value = `${doc}`;
        formAct.appendChild(inputdo);


        const inputAct = document.createElement('INPUT');
        inputAct.type = 'submit';
        inputAct.name = 'actualizar';
        inputAct.value = 'Actualizar';
        inputAct.classList.add('btnAct');
        formAct.appendChild(inputAct);

        const inputEli = document.createElement('INPUT');
        inputEli.type = 'submit';
        inputEli.name = 'eliminar';
        inputEli.value = 'Eliminar';
        formEli.appendChild(inputEli);

        actualizar.appendChild(formAct);
        eliminar.appendChild(formEli);

        row.appendChild(documento);
        row.appendChild(nombre);
        row.appendChild(apellido);
        row.appendChild(gmail);
        row.appendChild(phone);
        row.appendChild(genero);
        row.appendChild(naci);
        row.appendChild(ingreso);
        row.appendChild(direction);
        row.appendChild(city);
        row.appendChild(actualizar);
        row.appendChild(eliminar);
        tbody.appendChild(row);

    });
}


function crearFormulario(datos){
    db.forEach(db => {
        const { doc, nom, ape, correo, celular, sexo, fechanaci, fechanIn, direc, ciudad } = db;
        const formularioActualizar = document.createElement('FORM');
        formEli.method = 'POST';

        const cedula = document.createElement('INPUT');
        inputdo.type = 'text';
        inputdo.name = 'cedula';
        inputdo.value = `${doc}`;
    });
}