const crear = document.querySelector('#crear');
const tarea = document.querySelector('#tarea');
const sinPendientes = document.querySelector('#sinPendientes');
const padre = document.querySelector('.padre');

crear.addEventListener('click', ()=>{
    const contenido = tarea.value;
    console.log(contenido);
    if(contenido != ''){
        let elemento = document.createElement('li');
        elemento.innerHTML = contenido;

        elemento.appendChild(borrar());
        padre.appendChild(elemento);
        tarea.value = '';
        sinPendientes.style.display = 'none';
    }
});

function borrar(){
    const btnBorrar = document.createElement('button');

    btnBorrar.innerHTML = 'X';
    btnBorrar.classList.add('btnBorrar');

    btnBorrar.addEventListener('click', (event)=>{
        const li = event.target.parentElement;
        console.log(li);
        padre.removeChild(li);

        const elementos = document.querySelectorAll('li');

        if(elementos.length == 0){
            sinPendientes.style.display = 'block';
        }
    });

    return btnBorrar;
}