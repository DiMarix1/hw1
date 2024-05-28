function inserimento(event){
    event.preventDefault();
    const prod_name = encodeURIComponent(form.name.value);
    const prod_price = encodeURIComponent(form.cost.value);
    const prod_qnt = encodeURIComponent(form.quantita.value);
    const prod_img = encodeURIComponent(form.link.value);
    const link = "add_prod.php?q="+prod_name+"&cost="+prod_price+"&qnt="+prod_qnt+"&link="+prod_img;
    console.log(link);
    fetch(link).then(onResponse).then(onJson);
}

function onResponse(response){
    // console.log(response.json());
    return response.json();
}

function onJson(json){
    const elemento =document.getElementById('element');
    console.log(json);
    if(json.ok){
        console.log(json.ok);
        console.log("tutto ok");
        elemento.classList.toggle('hidden');
        
    }else{
        console.log("Errore");
        elemento.innerHTML = "Errore inserimento prodotto";
    }
}

const form = document.forms['inserimento'];
form.addEventListener('submit', inserimento);