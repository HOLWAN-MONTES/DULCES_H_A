/* const ContentInicioSesion = document.getElementById('inicioSesion')
const ContentRegistrate = document.getElementById('registrar')

const StarSesion = document.getElementById('btn-iniciar-sesion')
 */


/* const boton = document.getElementById("boton")
const catalogo = document.getElementById("contenedor2")
const texto = document.getElementById("texto")
  
  
boton.addEventListener("click", (e) => {
  e.preventDefault()
  catalogo.style.visibility= "visible"
  texto.style.visibility="hidden"
})
 */

const mostrarTabla = document.getElementById('btn-hacerfactura');
const hacerCompra = document.getElementById('hacerCompra');
const tabla = document.getElementById('tabla');
const factura = document.getElementById("factura")
const btn_factura = document.getElementById("btn-hacerfactura")


/* direccion */
const ContentDireccion = document.getElementById('direccion');
const crearDireccion = document.getElementById('crearDireccion')








/* crear factura */
mostrarTabla.addEventListener("click", (e) => {
  e.preventDefault()
  const datos = new FormData(factura)

  fetch("../php/crearfact.php", {
    method:"POST",
    body: datos
  }).then(res => res.text()).then(info => {
    console.log(info)
    if (info == 1) {
      tabla.style.display = "none"
      mostrarTabla.style.display = "none";
      ContentDireccion.style.display="block"
    }else if (info == 3) {
      alert("No se creo factura")
    } 
  })
})


/* crear la direccion */

crearDireccion.addEventListener("click", (o) => {
  o.preventDefault()
  const datos2 = new FormData(form_direccion)

  fetch("../php/actualizarDireccion.php", {
    method:"POST",
    body: datos2
  }).then(res2 => res2.text()).then(info2 => {
    console.log(info2)
    if (info2 == 1) {
      ContentDireccion.style.display = "none" 
      tabla.style.display = "block";
      window.location="  ../php/compras.php" 
    }else if (info2 == 2) {
      alert("No se hizo lo que usted quizo")
    } 
  })
})


/* comprar un producto */
/* const boton_todos_los_productos = document.getElementById('boton_todos_los_productos');
const form_todos_productos = document.getElementById('form_todos_productos'); */


/* /* hacer las compras 
boton_todos_los_productos.addEventListener("click", (e) => {
  e.preventDefault()
  const datos3 = new FormData(factura)

  fetch("../php/facturacion.php", {
    method:"POST",
    body: datos3
  }).then(res3 => res3.text()).then(info3 => {
    console.log(info3)
    if (info3 == 1) {   
        alert('SU COMPRA DEL PRODUCTO FUE SACTISFACTORIA')
    }else if (info3 == 2) {
      alert("ELIJA UN PRODUCTO PARA PODER HACER LA COMPRA")
    }else if (info3 == 3) {
      alert("ELIJA UN PRODUCTO PARA PODER HACER LA COMPRA")
    }  
  })
}) */




















