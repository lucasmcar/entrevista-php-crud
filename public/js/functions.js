function saveUser(){
    

    var msg = document.querySelector("#msg");
    var nome = document.querySelector("#txtUserName").value;
    var email = document.querySelector("#txtUserEmail").value;
    var checkColors = document.querySelectorAll("input[type='checkbox'][name='colors[]']");



    let ckValues = []

    checkColors.forEach((checkbox) => {
        if(checkbox.checked){
            ckValues.push(checkbox.value)
        } else {
            ckValues.push("")
        }
    });

    let data = {
        nome,
        email,
        ckValues
    }
    if(data.nome == ""){
        alert('Campo nome deve ser preenchido!');
    }

    if(data.email == "" && data){
        alert('Campo email deve ser preenchido!');
    }

    

    fetch('../requests/sendUser.php', {
        method :'POST',
        body : JSON.stringify(data),
        headers :{
            "Content-Type" : "application/json; UTF-8"
        }
    })
    .then((resp) => resp.text())
    .then((data)=> {
        msg.removeAttribute('hidden');
        msg.innerHTML = "Usuário cadastrado com sucesso!";
        
        setTimeout(window.location.reload(), 10000)
        
    })
    .catch(error => error);
}


function updateUser()
{
    var msg = document.querySelector("#msg");
    var nome = document.querySelector("#txtUserNameEdit").value;
    var email = document.querySelector("#txtUserEmailEdit").value;
    var id = document.querySelector("input[type='hidden'][name='txtIdUserEdit']").value;
    var checkColors = document.querySelectorAll("input[type='checkbox'][name='colorsEdit[]']");

    let ckValues = []

    checkColors.forEach((checkbox) => {
        if(checkbox.checked){
            ckValues.push(checkbox.value)
        } else {
            ckValues.push("")
        }
    });

    let data = {
        id,
        nome,
        email,
        ckValues
    }

    

    fetch('../requests/updateUser.php', {
        method :'POST',
        body : JSON.stringify(data),
        headers :{
            "Content-Type" : "application/json; UTF-8"
        }
    })
    .then((resp) => resp.text())
    .then((data)=> {
        
        setTimeout(window.location.reload(), 10000)
        
    })
    .catch(error => error);
}