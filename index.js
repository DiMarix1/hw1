function onClick(event){
    const elemento =event.currentTarget.parentNode.querySelector('.hidden');
    // elemento = primo elemento con classe hidden all'interno del div che contiene l'elemento
    // 'a' che ha generato l'evento
    elemento.classList.remove('hidden');
    console.log("rimosso");
}

function remove(event){
    event.currentTarget.parentNode.parentNode.classList.add('hidden');
}

function showLogin(){

    const elem = document.querySelector('#loginPage');
    if(elem.classList.contains('hidden')){
        elem.classList.remove('hidden');
    }else{
        elem.classList.add('hidden');
    }
}

// codice relativo al cambio delle immagini relative al programma fedeltà
const imgUrls =[
    "media/connoiss.png",
    "media/ambasci.png",
    "media/expert.png"
];
let index=0;

function changeImg() {
    const container = document.querySelector('#dinamico');
    const img = container.querySelector('img');
    img.src=imgUrls[index];
    index++;
    if(index>= imgUrls.length)
        index=0;
}
// per invocare ogni 5 secondi la funzione che cambia immagine
setInterval(changeImg,5000);

// 

function accesso(event){
    console.log("Ho inviato")
    event.preventDefault();
    console.log("Sono dentro la funzione");
    const username = currentTarget.querySelector('#mail');
    const passw = currentTarget.querySelector('#password');

    console.log("Hai inserito "+ username + passw +" come dati");
}


const buttons = document.querySelectorAll('.onClick');
// mi restituisce una lista, per ogni elemento creo un listener sul click del link "scopri di più"
for(let button of buttons)
    button.addEventListener('click',onClick);

const closes = document.querySelectorAll('.close');
for(let close of closes)
    close.addEventListener('click', remove);

// per la comparsa della pagina di login

const account = document.getElementById('accountLogin');
    account.addEventListener('click',showLogin);

    // per creare un listener sull'inserimento delle informazioni di login
const formUser = document.querySelector("#userData");
formUser.addEventListener('submit', accesso);
console.log("listener creato sul submit di login");

