// consts
const combo = document.getElementById("combo")
const tbody = document.querySelector("tbody")
const pValor = document.getElementById("valor")
const pCategoria = document.getElementById("categoria")

var dados = []

// carrega o json
document.addEventListener("DOMContentLoaded", () => {
    let request = new XMLHttpRequest()

    request.onreadystatechange = () => {
        if (request.status == 200 && request.readyState == 4){
            dados = JSON.parse(request.responseText)
            carregaSelect()
        }
    }

    request.open("GET", "http://localhost/leo/ex1/data.json", true)
    request.send()

})

// carrega o combobox
function carregaSelect(){
    dados.forEach((row, index) => {
        let option = document.createElement("option")
        option.innerHTML = `<option value=${index}>${row.nome}</option>`
        combo.appendChild(option)
    })
}

function mostrarProduto(){
    console.log(combo);
    let index = combo.selectedOptions[0]
    console.log(index)
    pValor.innerText = `Valor: R${dados[index].valor}`
    pCategoria.innerText = dados[index].categoria
}


function adicionarProduto(id){
    let index = combo.value 
    let row = document.createElement("tr")
    row.innerHTML = `
        <td>${dados[index].nome}</td>
    `
}