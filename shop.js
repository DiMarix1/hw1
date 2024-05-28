function add(event){
    event.preventDefault();
    // console.log(event.currentTarget.parentNode.id);
    const prod_id =encodeURIComponent(event.currentTarget.parentNode.id);
    const prod_qnt = encodeURIComponent(1);
    let link = "add_cart.php?q="+prod_id+"&qnt="+prod_qnt;
    console.log(link);
    fetch(link).then(onResponse).then(onJSON);
    
}

function onResponse(response){
    return response.json();
}

function onJSON(json){
    console.log(json);
    if(json.ok){
        console.log(json.id);
        let elemento = document.createElement("span");
        elemento.innerHTML = "Aggiunto";
        elemento.classList.add('scs');
        document.getElementById(json.id).appendChild(elemento);
        console.log(document.getElementById(json.id));
    }
        // alert('Aggiunto');

    else
        alert("Dovresti fare l'accesso!");
}


const buttons = document.querySelectorAll('.add');
for(const button of buttons){
    // aggiunge l'eventListener sul click del pulsante aggiungi
    button.addEventListener('click',add);
    console.log("Creato");
}