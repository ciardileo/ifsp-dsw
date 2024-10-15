
// variáveis que controlam os posts
var max = 0
var min = 0
var total = 0

// containers 
const divMin = document.getElementById("minimize")
const divPosts = document.getElementById("posts")

// variável que controla se um post excedeu o limite ou não
var limit = false

// paragrafo do contador de caracteres
const caracterCount = document.getElementById("count")

// função de criar post-it
function createPostIt(e) {
    // pega o texto do input
    const texto = document.getElementById("texto")
    const textoOriginal = texto.value.trim()

    // pega o input da cor
    const cor = document.getElementById("color")
    const valorCor = cor.value

    console.log(textoOriginal.length)

    if (textoOriginal.length != 0) {
        if (limit) {
            window.alert("Você excedeu o limite de caracteres")
        } else {
            // atualiza o controle
            total += 1
            max += 1

            console.log("Novo post-it: " + textoOriginal)

            // cria os elementos
            const newPost = document.createElement("div")
            newPost.classList.add("post")

            // define a cor do post-it
            newPost.style.backgroundColor = valorCor

            const text = document.createElement("p")
            text.classList.add("text")
            text.innerHTML = texto.value

            const previewText = document.createElement("p")
            previewText.classList.add("preview")

            let textoCortado = ""
            for (let i = 0; i < textoOriginal.length; i++) {
                textoCortado += textoOriginal[i]
                if (i >= 10) {
                    break
                }
            }

            previewText.innerHTML = textoCortado + (textoOriginal.length > 10 ? "..." : "")

            const now = new Date()
            const dataFormatada = now.toLocaleDateString() + '<br>' + now.toLocaleTimeString()

            const metadata = document.createElement("p")
            metadata.classList.add("metadata")
            metadata.innerHTML = "Criado em: " + dataFormatada

            // div dos botões
            const divBtn = document.createElement("div")
            divBtn.classList.add("btn-div")

            // botão de fechar
            const btnFechar = document.createElement("button")
            btnFechar.innerHTML = "X"
            btnFechar.addEventListener('click', fechar)

            // botão de minimizar 
            const btnMinimizar = document.createElement("button")
            btnMinimizar.innerHTML = "-"
            btnMinimizar.addEventListener('click', minimizar)

            // adiciona os elementos
            divBtn.appendChild(btnFechar)
            divBtn.appendChild(btnMinimizar)
            newPost.appendChild(divBtn)

            newPost.appendChild(text)
            newPost.appendChild(previewText)
            newPost.appendChild(metadata)

            posts.appendChild(newPost)

            arrastarPostit(newPost)

            // limpa a caixa de texto
            texto.value = ""

            // atualiza as informações
            updateInfo()
            limite()
        }
    } else {
        window.alert("O post-it não pode estar vazio")
    }
}

// função do drag-n-drop
function arrastarPostit(postit) {
    let offsetX, offsetY, mouseMoveHandler, mouseUpHandler

    postit.style.position = 'absolute' // Define o post-it como "absolute" para poder mover

    postit.addEventListener('mousedown', function (e) {
        offsetX = e.clientX - postit.getBoundingClientRect().left
        offsetY = e.clientY - postit.getBoundingClientRect().top

        mouseMoveHandler = function (e) {
            postit.style.left = (e.clientX - offsetX) + 'px'
            postit.style.top = (e.clientY - offsetY) + 'px'
        }

        document.addEventListener('mousemove', mouseMoveHandler)

        mouseUpHandler = function () {
            document.removeEventListener('mousemove', mouseMoveHandler)
            document.removeEventListener('mouseup', mouseUpHandler)
        }

        document.addEventListener('mouseup', mouseUpHandler)
    })
}

function updateInfo() {
    criados = document.getElementById("criados")
    abertos = document.getElementById("abertos")
    fechados = document.getElementById("fechados")

    criados.innerText = "Criados: " + total
    abertos.innerText = "Abertos: " + max
    fechados.innerText = "Fechados: " + min
}

function fechar(e) {
    escolha = window.confirm("Você realmente deseja deletar este post-it?")

    if (escolha) {
        var btn = e.target

        // remove o post e atualiza o controle
        btn.parentNode.parentNode.remove()
        total -= 1
        max -= 1

        // atualiza as informações
        updateInfo()
    }

}

function minimizar(e) {
    var btn = e.target
    var post = btn.parentNode.parentNode

    min += 1
    max -= 1

    divPosts.removeChild(post)

    post.classList.remove('post')
    post.classList.add('min-post')

    post.style.position = 'static'
    post.style.left = null
    post.style.top = null

    divMin.appendChild(post)

    post.addEventListener('click', maximizar)

    updateInfo()
}

function maximizar(e) {
    var post = e.target

    divMin.removeChild(post)

    post.classList.remove('min-post')
    post.classList.add('post')

    post.style.position = 'absolute'

    divPosts.appendChild(post)

    post.removeEventListener('click', maximizar)

    arrastarPostit(post)

    max += 1
    min -= 1
    updateInfo()
}

function limite() {
    console.log("1")
    const texto = document.getElementById("texto")
    const textoOriginal = texto.value.trim()

    if (textoOriginal.length > 150) {
        limit = true
        caracterCount.style.color = "red"
    } else {
        limit = false
        caracterCount.style.color = "black"
    }

    caracterCount.innerText = textoOriginal.length + "/150 caracteres"
}