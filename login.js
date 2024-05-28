function validation(event){
 if(!user || !pass){
    event.preventDefault();
    console.log("Non hai inserito nulla!");
 }
}
function checkUsername(event){
    if(form.username.value.length==0){
        document.getElementById('user').classList.remove('hidden');
        user = false;
    }else{
        document.getElementById('user').classList.add('hidden');
        user = true;
    }
}

function checkPassword(event){
    if(form.password.value.length==0){
        document.getElementById('pass').classList.remove('hidden');
        pass = false;
    }else{
        document.getElementById('pass').classList.add('hidden');
        pass = true;
    }
}
let user = false;
let pass = false;
const form = document.forms['login_form'];
form.addEventListener('submit',validation);
form.username.addEventListener('blur',checkUsername);
form.password.addEventListener('blur',checkPassword);