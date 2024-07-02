const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1');
const lista = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

cargarEventListeners();

function cargarEventListeners(){
    
    elementos1.addEventListener('click',comprarElemento);
    carrito.addEventListener('click',eliminarElemento);
    vaciarCarritoBtn.addEventListener('click',vaciarCarrito);
}
function comprarElemento(e){
    e.preventDefault();
    if(e.target.classList.contains('agregar-carrito')){
        const elemento = e.target.parentElement.parentElement;
        leerDatosElemento(elemento);
    }
}
function leerDatosElemento(elemento){
    const infoElemento = {
        imagen:elemento.querySelector('img').src,
        titulo:elemento.querySelector('h3').textContent,
        precio:elemento.querySelector('.precio').textContent,
        id:elemento.querySelector('a').getAttribute('data-id')
    }
    insertarCarrito(infoElemento);
}
function insertarCarrito(elemento){
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>
            <img src="${elemento.imagen}" width=100 >
        </td>
        <td>
            ${elemento.titulo}
        </td>
        <td>
            ${elemento.precio}
        </td>
        <td>
            <a href="#" class="borrar" data-id="${elemento.id}">X</a>
        </td>
    `;
    lista.appendChild(row);
}
    function eliminarElemento(e){
        e.preventDefault();
        let elemento,
            elementoId;
        if(e.target.classList.contains('borrar')){
            e.target.parentElement.parentElement.remove();
            elemento=e.target.parentElement.parentElement;
            elementoId = elemento.querySelector('a').getAttribute('data-id');
        }
    }
    function vaciarCarrito(){
        while(lista.firstChild){
            lista.removeChild(lista.firstChild);
        }
        return false;
    }

    


    document.getElementById('formularioProducto').onsubmit = function(event) {
        event.preventDefault();
        
        // Obtén los valores del formulario
        var nombre = document.getElementById('nombreProducto').value;
        var imagen = document.getElementById('imagenProducto').files[0];
        var precioValor = document.getElementById('precioProducto').value; // Asegúrate de tener un input con id 'precioProducto'
        
        // Crea un nuevo elemento de producto con la estructura deseada
        var producto = document.createElement('div');
        producto.className = 'product';
        
        // Agrega la imagen del producto
        var img = document.createElement('img');
        img.src = URL.createObjectURL(imagen);
        img.alt = nombre;
        producto.appendChild(img);
        
        // Crea el contenedor para el texto del producto
        var productTxt = document.createElement('div');
        productTxt.className = 'product-txt';
        
        // Agrega el nombre del producto como título
        var titulo = document.createElement('h3');
        titulo.innerText = nombre;
        productTxt.appendChild(titulo);
        
        // Agrega un párrafo para la calidad o descripción
        var calidad = document.createElement('p');
        calidad.innerText = 'Calidad premium'; // Modifica este texto según sea necesario
        productTxt.appendChild(calidad);
        
        // Agrega un párrafo para el precio
        var precioParrafo = document.createElement('p');
        precioParrafo.className = 'precio';
        precioParrafo.innerText = '$' + precioValor; // Usa el valor obtenido del formulario
        productTxt.appendChild(precioParrafo);
        
        // Agrega un botón para agregar al carrito
        var botonCarrito = document.createElement('a');
        botonCarrito.href = '#';
        botonCarrito.className = 'agregar-carrito btn-2';
        botonCarrito.setAttribute('data-id', '3'); 
        // Asegúrate de modificar este atributo según sea necesario
        botonCarrito.innerText = 'Agregar al carrito';
        
        productTxt.appendChild(botonCarrito);
        
        
        // Agrega el contenedor de texto al producto
        producto.appendChild(productTxt);
        
        // Agrega el nuevo producto al contenedor 'product-content'
        document.getElementById('product-content').appendChild(producto);
        
        // Limpia el formulario
        document.getElementById('formularioProducto').reset();
    };

   


    
    


