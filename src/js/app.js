document.addEventListener('DOMContentLoaded', function() {
    registrarCliente();
});



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


function registrarCliente(){

    const registrar = document.querySelector('#registrar');
    const overlay = document.querySelector('#overlay');

    registrar.addEventListener('click', e=>{
        if(overlay.classList.contains('overlay')){
            overlay.classList.remove('overlay');
            overlay.classList.add('overlays');
        }else{
            overlay.classList.remove('overlays');
            overlay.classList.add('overlay');
        }
    });

    const cerrarForm = document.querySelector('.cerrar')

    cerrarForm.addEventListener('click',e=>{
        overlay.classList.remove('overlays');
            overlay.classList.add('overlay');
    });


}
