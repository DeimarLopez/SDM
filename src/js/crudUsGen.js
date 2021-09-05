function wachBoton() {
    const d = document.querySelector('#btntable');
    d.addEventListener('click', e => {
        cargarUsGen();
        document.querySelector('#btntable img').click(); 
    });
}

async function cargarUsGen() {
    try {
        const resultado = await fetch('insertUsGen.php');
        const db = await resultado.json();
        tablaUsuGen(db);

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

const insertar = document.querySelector('#insertarUsuGeneri');
insertar.addEventListener('submit', e => {
    e.preventDefault();
    const datos = new FormData(insertar);
    console.log(datos.get('Cedula'));

    
    fetch('insertUsGen.php', {
        method: 'POST',
        body: datos
    })

    document.querySelector('#btntable img').click();  
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
                    cargarFormulario(data)
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


function cargarFormulario(datos){
    datos.forEach(dato => {
        const { doc, nom, ape, correo, celular, sexo, fechanaci, fechanIn, direc, ciudad } = dato;
        document.querySelector('#Cedula').value=`${doc}`;
        document.querySelector('#Nombre').value=`${nom}`;
        document.querySelector('#Apellido').value=`${ape}`;
        document.querySelector('#Correo').value=`${correo}`;
        document.querySelector('#Celular').value=`${celular}`;
        document.querySelector('#fecha').value=`${fechanaci}`;
        document.querySelector('#Dirección').value=`${direc}`;
        document.querySelector('#Ciudad').value=`${ciudad}`;
    });
}