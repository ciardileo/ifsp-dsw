var menuMembros = document.getElementById("membros")
var btnMembros = document.getElementById("btn-membros")
var active = false

function menu(){
    if (active == false){
        menuMembros.style.display = 'block'
        btnMembros.innerHTML = 'close'

        active = true
    } else{
        menuMembros.style.display = 'none'
        btnMembros.innerHTML = 'group'

        active = false
    }
}