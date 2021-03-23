/* const ContentInicioSesion = document.getElementById('inicioSesion')
const ContentRegistrate = document.getElementById('registrar')

const StarSesion = document.getElementById('btn-iniciar-sesion')
 */


const boton = document.getElementById("boton")
const catalogo = document.getElementById("contenedor2")
const texto = document.getElementById("texto")
  
  
boton.addEventListener("click", (e) => {
  e.preventDefault()
  catalogo.style.visibility= "visible"
  texto.style.visibility="hidden"
})

























