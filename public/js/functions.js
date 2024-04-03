function saveUser(){
    

    var msg = document.querySelector("#msg");
    var nome = document.querySelector("#txtUserName").value;
    var email = document.querySelector("#txtUserEmail").value;
    var checkColors = document.querySelectorAll("input[type='checkbox'][name='colors[]']:checked");


    let data = {
        nome,
        email,
        checkColors
    }
    if(data.nome == ""){
        alert('Campo nome deve ser preenchido!');
    }

    if(data.email == "" && data){
        alert('Campo email deve ser preenchido!');
    }

    checkColors.forEach((checkbox) =>{
      if(checkbox.checked){
        data[checkbox.name] = data[checkbox.name] || [];
        data[checkbox.name].push(checkbox.value);
      }
        
    });

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
    var checkColors = document.querySelectorAll("input[type='checkbox'][name='colorsEdit[]']:checked");


    let data = {
        nome,
        email,
        id,
        checkColors
    }

    checkColors.forEach((checkbox) =>{
        data[checkbox.name] = data[checkbox.name] || [];
        data[checkbox.name].push(checkbox.value);
    });

    fetch('../requests/updateUser.php', {
        method :'PUT',
        body : JSON.stringify(data),
        headers :{
            "Content-Type" : "application/json; UTF-8"
        }
    })
    .then((resp) => resp.text())
    .then((data)=> {
        msg.removeAttribute('hidden');
        msg.innerHTML = "Usuário alterado com sucesso!";
        
        setTimeout(window.location.reload(), 10000)
        
    })
    .catch(error => error);
}




/*let btnSave = document.getElementById("btnSave");
const form = document.querySelector('form');

btnSave.addEventListener('submit', (e) =>{  
    e.preventDefault();
    const formData = new FormData();

    formData.append('userName', document.getElementById("txtUserName").value);
    formData.append('userEmail', document.getElementById("txtUserEmail").value);

    console.log(formData);


});*/

function searchValue(value){

    fetch('../requests/getUser.php?userName='+value, {
        method :'GET',

    })
    .then((resp) => resp.json())
    .then((data)=> {

    })
    .catch(error => console.log(error));

}