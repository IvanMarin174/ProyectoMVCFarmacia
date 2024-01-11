
document.addEventListener('DOMContentLoaded', function(){
    const pathname = window.location.pathname;
    const url = pathname.toString();
    if(url.includes('/index')){
        scrollNav()
    }
    eventListeners()
    
    try {
        eventListenersFiltro() 
        nonExistentFunction()
        
      } catch (error) {
        console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
      }      
    muestraAdvertencia('Si deseas crear un Producto que sea Medicamento '+
                        '→Primero crear la Informacion del Medicamento');
})
function scrollNav(){
    
    const enlace  = document.getElementById('category')
    enlace.addEventListener('click', function(e){
        e.preventDefault();        
        const seccion = document.querySelectorAll('.division');        
        seccion[0].scrollIntoView({ behavior: "smooth" });
        
        
       
    })
    
    
   
}
function eventListenersFiltro() {
    const btnFiltro = document.querySelectorAll('.despliege')    
    btnFiltro[0].addEventListener('click',despliege1)
    btnFiltro[1].addEventListener('click',despliege2)
    btnFiltro[2].addEventListener('click',despliege3)
}
function eventListeners(){
    //eventno menu
    const mobilMenu = document.querySelector(".mobil-menu")
    mobilMenu.addEventListener('click',navegacionResponsive)
}
function navegacionResponsive(){    
    const navegacion = document.querySelectorAll('.btnNav')
    const svgLinea = document.querySelectorAll('.svg')        
    for(var cont = 0; cont < navegacion.length; cont++){
        navegacion[cont].classList.toggle('mostrar')
        svgLinea[cont].classList.toggle('mostrar')

    }   
    
}
function despliege1(){
    funcionDespliege(0)
}
function despliege2(){
    funcionDespliege(1)
}
function despliege3(){
    funcionDespliege(2)
}
function funcionDespliege(i){    
    const iconoUp = document.querySelectorAll('.icono-arrowUp')
    const iconoDown = document.querySelectorAll('.icono-arrowDown')
    const contFiltros = document.querySelectorAll('.contenido-filtro')
    iconoUp[i].classList.toggle('mostrar');
    iconoDown[i].classList.toggle('quitar')    
    contFiltros[i].classList.toggle('mostrar')
}

function muestraAdvertencia(mensaje){
    const agregar = document.querySelector('.advertencia')
    //Creas el elemento
    const alerta = document.createElement('P')    
    //Envias el texto
    alerta.textContent = mensaje
    //Agrega al HTML
    agregar.appendChild(alerta)
    //deseparar
    setTimeout(()=>{
        alerta.remove()
    },9000)

}