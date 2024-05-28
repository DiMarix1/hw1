function valid_name(event){
    if(!form.nome.value.length>0){
        nome = false;
        event.currentTarget.parentNode.parentNode.querySelector('.error').classList.add('show');
    } else{
        nome = true;
        event.currentTarget.parentNode.parentNode.querySelector('.error').classList.remove('show');
    }
}

function valid_surname(event){
    if(!form.cognome.value.length>0){
        cognome = false;
        event.currentTarget.parentNode.parentNode.querySelector('.error').classList.add('show');
    } else{
        cognome = true;
        event.currentTarget.parentNode.parentNode.querySelector('.error').classList.remove('show');
    }
}

function valid_email(event){
    if(!form.email.value.length>0){
        email = false;
        event.currentTarget.parentNode.parentNode.querySelector('.error').classList.add('show');
    } else{
        email = true;
        event.currentTarget.parentNode.parentNode.querySelector('.error').classList.remove('show');
    }
}

function valid_username(event){
    let link = "checkUsername.php?q="+encodeURIComponent(form.username.value);
    fetch(link).then(onResponse).then(onJSON);
}

function onResponse(response){
    return response.json();
}

function onJSON(json){
    if(!json.ok){
        // document.forms['signup'].preventDefault();
        username = false;
        document.getElementById('username').parentNode.parentNode.querySelector('.error').classList.add('show');
    }else{
        username = true;
        document.getElementById('username').parentNode.parentNode.querySelector('.error').classList.remove('show');
    }

}

function valid_password(event){
    if(form.password.value.length<8){
        document.getElementById('short').classList.add('show');
        password = false;
    }else{
        document.getElementById('short').classList.remove('show');
        let specialChar = /[A-Za-z0-9!@#$%^&*(),.?":{}|<>]/;
        if(!specialChar.test(form.password.value)){
            document.getElementById('char').classList.add('show');
            password = false;
        }else{
            document.getElementById('char').classList.remove('show');
            password = true;
        }
    }
}

function match_password(event){
    if(form.password.value==form.password2.value){
        document.getElementById('pass2').classList.remove('show');
        password2 = true;
    }else{
        document.getElementById('pass2').classList.add('show');
        password2 = false;
    }
}



function valid_form(event){
    if(!(nome && cognome && email && username && password && password2)){
        event.preventDefault();
        console.log("Non va bene qualcosa");
    }
}


let nome = false;
let cognome =false;
let email = false;
let username =false;
let password = false;
let password2 = false;

const form = document.forms['signup'];
form.addEventListener('submit',valid_form);
form.nome.addEventListener('blur',valid_name);
form.cognome.addEventListener('blur',valid_surname);
form.email.addEventListener('blur',valid_email);
form.username.addEventListener('blur',valid_username);
form.password.addEventListener('blur',valid_password);
form.password2.addEventListener('blur',match_password);