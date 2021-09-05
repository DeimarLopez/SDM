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


