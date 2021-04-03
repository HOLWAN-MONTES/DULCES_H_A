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
    }else if (info2 == 2) {
      alert("No se creo factura")
    } 
  })
})























