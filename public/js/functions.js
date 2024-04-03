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
        data[checkbox.name] = data[checkbox.name] || [];
        data[checkbox.name].push(checkbox.value);
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

document.querySelector("input[type='checkbox'][name='colors[]']").addEventListener("click", function() {
    // Obter todos os checkboxes
    let checkboxes = document.querySelectorAll("input[type='checkbox'");
    let values = [];
  
    // Iterar sobre os checkboxes e adicionar os valores marcados ao array values
    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        values.push(checkbox.value);
      }
    });
  
    // Enviar os valores marcados para o servidor
    sendColors(values);
  });
  

  function sendColors(values) {
    fetch('../requests/getUser.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ values: values }),
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('Checkbox values successfully sent to the server:', data);
    })
    .catch(error => {
      console.error('There was an error sending the checkbox values:', error);
    });
  }

function updateUser()
{
    var msg = document.querySelector("#msg");
    var nome = document.querySelector("#txtUserNameEdit").value;
    var email = document.querySelector("#txtUserEmailEdit").value;
    var checkColors = document.querySelectorAll("input[type='checkbox'][name='colors[]']:checked");


    let data = {
        nome,
        email,
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