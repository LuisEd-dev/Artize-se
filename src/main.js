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
function editar_nome($nome){

    let jumbotron = document.getElementById("jumbotron-perfil")
    jumbotron.innerHTML = ""

    let form = document.createElement("form")
    form.setAttribute("action", "perfil.php")
    form.setAttribute("method", "POST")

    let input = document.createElement("input")
    input.setAttribute("name", "alterar_nome")
    input.setAttribute("type", "text")
    input.setAttribute("class", "form-control offset-3")
    input.setAttribute("style", "width: 50%;")
    input.setAttribute("value", $nome)

    let button = document.createElement("button")
    button.setAttribute("class", "btn btn-primary ")
    button.setAttribute("style", "width: 50%;")
    button.appendChild(document.createTextNode("Alterar Nome do Usuário"))

    form.appendChild(input)
    form.appendChild(button)

    jumbotron.appendChild(form)
}
function editar_img(){

    let jumbotron = document.getElementById("jumbotron-perfil")
    jumbotron.innerHTML = ""

    let form = document.createElement("form")
    form.setAttribute("enctype", "multipart/form-data")
    form.setAttribute("action", "perfil.php")
    form.setAttribute("method", "POST")

    let div = document.createElement("div")
    div.setAttribute("class", "form-group")

    let label = document.createElement("label")
    label.appendChild(document.createTextNode("Editar Imagem de Perfil"))

    let input1 = document.createElement("input")
    input1.setAttribute("type", "hidden")
    input1.setAttribute("name", "MAX_FILE_SIZE")
    input1.setAttribute("value", "99999999")

    let input2 = document.createElement("input")
    input2.setAttribute("type", "file")
    input2.setAttribute("class", "form-control-file offset-4")
    input2.setAttribute("name", "alterar_foto")

    let button = document.createElement("button")
    button.setAttribute("type", "submit")
    button.setAttribute("class", "btn btn-primary")
    button.appendChild(document.createTextNode("Enviar!"))

    div.appendChild(label)
    div.appendChild(input1)
    div.appendChild(input2)

    div.appendChild(button)

    form.appendChild(div)

    jumbotron.appendChild(form)
}
function editar_contato($email, $telefone, $celular, $cidade, $uf, $mensagem){

    let jumbotron = document.getElementById("jumbotron-perfil")
    jumbotron.innerHTML = ""

    let form = document.createElement("form")
    form.setAttribute("action", "perfil.php")
    form.setAttribute("method", "POST")

    let labelEmail = document.createElement('label')
    labelEmail.appendChild(document.createTextNode("Email:"))

    let inputEmail = document.createElement("input")
    inputEmail.setAttribute("name", "alterar_email")
    inputEmail.setAttribute("type", "email")
    inputEmail.setAttribute("class", "form-control offset-3")
    inputEmail.setAttribute("style", "width: 50%;")
    inputEmail.setAttribute("value", $email)

    let labelTelefone = document.createElement('label')
    labelTelefone.appendChild(document.createTextNode("Telefone:"))

    let inputTelefone = document.createElement("input")
    inputTelefone.setAttribute("name", "alterar_telefone")
    inputTelefone.setAttribute("type", "tel")
    inputTelefone.setAttribute("class", "form-control offset-3")
    inputTelefone.setAttribute("style", "width: 50%;")
    inputTelefone.setAttribute("value", $telefone)

    let labelCelular = document.createElement('label')
    labelCelular.appendChild(document.createTextNode("Celular:"))

    let inputCelular = document.createElement("input")
    inputCelular.setAttribute("name", "alterar_celular")
    inputCelular.setAttribute("type", "tel")
    inputCelular.setAttribute("class", "form-control offset-3")
    inputCelular.setAttribute("style", "width: 50%;")
    inputCelular.setAttribute("value", $celular)

    let labelCidade = document.createElement('label')
    labelCidade.appendChild(document.createTextNode("Cidade:"))

    let inputCidade = document.createElement("input")
    inputCidade.setAttribute("name", "alterar_cidade")
    inputCidade.setAttribute("type", "text")
    inputCidade.setAttribute("class", "form-control offset-3")
    inputCidade.setAttribute("style", "width: 50%;")
    inputCidade.setAttribute("value", $cidade)

    let labelUF = document.createElement('label')
    labelUF.appendChild(document.createTextNode("UF:"))

    let inputUF = document.createElement("input")
    inputUF.setAttribute("name", "alterar_uf")
    inputUF.setAttribute("type", "text")
    inputUF.setAttribute("class", "form-control offset-3")
    inputUF.setAttribute("style", "width: 50%;")
    inputUF.setAttribute("value", $uf)

    let labelMensagem = document.createElement('label')
    labelMensagem.appendChild(document.createTextNode("Mensagem:"))

    let inputMensagem = document.createElement("input")
    inputMensagem.setAttribute("name", "alterar_mensagem")
    inputMensagem.setAttribute("type", "text")
    inputMensagem.setAttribute("class", "form-control offset-3")
    inputMensagem.setAttribute("style", "width: 50%;")
    inputMensagem.setAttribute("value", $mensagem)

    let button = document.createElement("button")
    button.setAttribute("class", "btn btn-primary ")
    button.setAttribute("style", "width: 50%;")
    button.appendChild(document.createTextNode("Alterar Dados de Contato"))

    form.appendChild(labelEmail)
    form.appendChild(inputEmail)
    form.appendChild(labelTelefone)
    form.appendChild(inputTelefone)
    form.appendChild(labelCelular)
    form.appendChild(inputCelular)
    form.appendChild(labelCidade)
    form.appendChild(inputCidade)
    form.appendChild(labelUF)
    form.appendChild(inputUF)
    form.appendChild(labelMensagem)
    form.appendChild(inputMensagem)

    form.appendChild(button)

    jumbotron.appendChild(form)
}