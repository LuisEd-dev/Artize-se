function form_login($login){

    let jumbotron = document.getElementById('login-cadastro')
    
    jumbotron.innerHTML = ""

    let h1 = document.createElement('h1')
    h1.setAttribute("class", "display-4")
    h1.appendChild(document.createTextNode("Artize-se"))

    let p = document.createElement('p')
    p.setAttribute("class", "lead text-center")
    p.appendChild(document.createTextNode("Faça Login!"))

    let hr = document.createElement('hr')
    hr.setAttribute("class", "my-5")

    let form = document.createElement('form')
    form.setAttribute("action", ".")
    form.setAttribute("method", "POST")

    let divFormGroupLogin = document.createElement("div")
    divFormGroupLogin.setAttribute("class", "form-group")

    let divColLogin = document.createElement('div')
    divColLogin.setAttribute("class", "col-6 offset-3")

    let labelLogin = document.createElement('label')
    labelLogin.appendChild(document.createTextNode("Login"))

    let inputLogin = document.createElement('input')
    inputLogin.setAttribute("type", "text")
    inputLogin.setAttribute("class", "form-control")
    inputLogin.setAttribute("name", "login")
    if($login != undefined){
        inputLogin.setAttribute("value", $login)
    }
    

    
    let divFormGroupSenha = document.createElement("div")
    divFormGroupSenha.setAttribute("class", "form-group")

    let divColSenha = document.createElement('div')
    divColSenha.setAttribute("class", "col-6 offset-3")

    let labelSenha = document.createElement('label')
    labelSenha.appendChild(document.createTextNode("Senha"))

    let inputSenha = document.createElement('input')
    inputSenha.setAttribute("type", "password")
    inputSenha.setAttribute("class", "form-control")
    inputSenha.setAttribute("name", "senha")



    let divFormGroupEntrar = document.createElement("div")
    divFormGroupEntrar.setAttribute("class", "form-group form-check")

    let inputEntrar = document.createElement('input')
    inputEntrar.setAttribute("type", "checkbox")
    inputEntrar.setAttribute("class", "form-check-input")
    inputEntrar.setAttribute("name", "check")

    let labelEntrar = document.createElement('label')
    labelEntrar.setAttribute("class", "form-check-label")
    labelEntrar.setAttribute("id", "checar")
    labelEntrar.appendChild(document.createTextNode("Manter Sessão"))



    let divButton = document.createElement('div')
    divButton.setAttribute("class", "col-6 offset-3")

    let buttonSubmit = document.createElement('button')
    buttonSubmit.setAttribute("type", "submit")
    buttonSubmit.setAttribute("class", "btn btn-block btn-success")
    buttonSubmit.appendChild(document.createTextNode("Acessar"))



    let opcao = document.createElement('input')
    opcao.setAttribute("type", "hidden")
    opcao.setAttribute("name", "opcao")
    opcao.setAttribute("value", "login")

//

    jumbotron.appendChild(h1)
    jumbotron.appendChild(p)
    jumbotron.appendChild(hr)

    divColLogin.appendChild(labelLogin)
    divColLogin.appendChild(inputLogin)
    divFormGroupLogin.appendChild(divColLogin)
    form.appendChild(divFormGroupLogin)

    divColSenha.appendChild(labelSenha)
    divColSenha.appendChild(inputSenha)
    divFormGroupSenha.appendChild(divColSenha)
    form.appendChild(divFormGroupSenha)

    divFormGroupEntrar.appendChild(inputEntrar)
    divFormGroupEntrar.appendChild(labelEntrar)
    form.appendChild(divFormGroupEntrar)

    form.appendChild(opcao)

    divButton.appendChild(buttonSubmit)
    form.appendChild(divButton)

    jumbotron.appendChild(form)
}

function form_cadastro(){
    let jumbotron = document.getElementById('login-cadastro')

    jumbotron.innerHTML = ""

    let h1 = document.createElement('h1')
    h1.setAttribute("class", "display-4")
    h1.appendChild(document.createTextNode("Artize-se"))

    let p = document.createElement('p')
    p.setAttribute("class", "lead text-center")
    p.appendChild(document.createTextNode("Faça Cadastro!"))

    let hr = document.createElement('hr')
    hr.setAttribute("class", "my-5")

    let form = document.createElement('form')
    form.setAttribute("action", ".")
    form.setAttribute("method", "POST")



    let divFormGroupEmail = document.createElement("div")
    divFormGroupEmail.setAttribute("class", "form-group")

    let divColEmail = document.createElement('div')
    divColEmail.setAttribute("class", "col-6 offset-3")

    let labelEmail = document.createElement('label')
    labelEmail.appendChild(document.createTextNode("Email"))

    let inputEmail = document.createElement('input')
    inputEmail.setAttribute("type", "email")
    inputEmail.setAttribute("class", "form-control")
    inputEmail.setAttribute("name", "email")



    let divFormGroupNome = document.createElement("div")
    divFormGroupNome.setAttribute("class", "form-group")

    let divColNome = document.createElement('div')
    divColNome.setAttribute("class", "col-6 offset-3")

    let labelNome = document.createElement('label')
    labelNome.appendChild(document.createTextNode("Nome"))

    let inputNome = document.createElement('input')
    inputNome.setAttribute("type", "text")
    inputNome.setAttribute("class", "form-control")
    inputNome.setAttribute("name", "nome")



    let divFormGroupLogin = document.createElement("div")
    divFormGroupLogin.setAttribute("class", "form-group")

    let divColLogin = document.createElement('div')
    divColLogin.setAttribute("class", "col-6 offset-3")

    let labelLogin = document.createElement('label')
    labelLogin.appendChild(document.createTextNode("Login"))

    let inputLogin = document.createElement('input')
    inputLogin.setAttribute("type", "text")
    inputLogin.setAttribute("class", "form-control")
    inputLogin.setAttribute("name", "login")


    
    let divFormGroupSenha = document.createElement("div")
    divFormGroupSenha.setAttribute("class", "form-group")

    let divColSenha = document.createElement('div')
    divColSenha.setAttribute("class", "col-6 offset-3")

    let labelSenha = document.createElement('label')
    labelSenha.appendChild(document.createTextNode("Senha"))

    let inputSenha = document.createElement('input')
    inputSenha.setAttribute("type", "password")
    inputSenha.setAttribute("class", "form-control")
    inputSenha.setAttribute("name", "senha")



    let divButton = document.createElement('div')
    divButton.setAttribute("class", "col-6 offset-3")

    let buttonSubmit = document.createElement('button')
    buttonSubmit.setAttribute("type", "submit")
    buttonSubmit.setAttribute("class", "btn btn-block btn-success")
    buttonSubmit.appendChild(document.createTextNode("Cadastrar"))
    


    let opcao = document.createElement('input')
    opcao.setAttribute("type", "hidden")
    opcao.setAttribute("name", "opcao")
    opcao.setAttribute("value", "confirmar")
    

    
    let divFormGroupCategoria = document.createElement('div')
    divFormGroupCategoria.setAttribute("class", "form-group")
    
    let divColCategoria = document.createElement('div')
    divColCategoria.setAttribute("class", "col-6 offset-3")

    let labelCategoria = document.createElement('label')
    labelCategoria.appendChild(document.createTextNode("Categorias"))

    let selectCategoria = document.createElement('select')
    selectCategoria.setAttribute("class", "form-control")
    selectCategoria.setAttribute("name", "categoria")

    opcoes = ["Músico(a)", "Dançarino(a)", "Pintor(a)", "Escultor(a)", "Ator(a)", "Escritor(a)", "Cineasta", "Fotografo(a)", "Quadrinista", "Artista digital"]
    n = 1
    for(opcaoCategoria in opcoes){
        let option = document.createElement('option')
        option.setAttribute("value", n)
        n++
        option.appendChild(document.createTextNode(opcoes[opcaoCategoria]))
       
        selectCategoria.appendChild(option)
    }

//

    jumbotron.appendChild(h1)
    jumbotron.appendChild(p)
    jumbotron.appendChild(hr)

    divColNome.appendChild(labelNome)
    divColNome.appendChild(inputNome)
    divFormGroupNome.appendChild(divColNome)
    form.appendChild(divFormGroupNome)

    divColLogin.appendChild(labelLogin)
    divColLogin.appendChild(inputLogin)
    divFormGroupLogin.appendChild(divColLogin)
    form.appendChild(divFormGroupLogin)

    divColEmail.appendChild(labelEmail)
    divColEmail.appendChild(inputEmail)
    divFormGroupEmail.appendChild(divColEmail)
    form.appendChild(divFormGroupEmail)

    divColSenha.appendChild(labelSenha)
    divColSenha.appendChild(inputSenha)
    divFormGroupSenha.appendChild(divColSenha)
    form.appendChild(divFormGroupSenha)

    form.appendChild(opcao)

    divColCategoria.appendChild(labelCategoria)
    divColCategoria.appendChild(selectCategoria)
    divFormGroupCategoria.appendChild(divColCategoria)
    form.appendChild(divFormGroupCategoria)

    divButton.appendChild(buttonSubmit)
    form.appendChild(divButton)

    jumbotron.appendChild(form)
}