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








