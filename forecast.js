function invoca(event){
    event.preventDefault();
    let city = encodeURIComponent(document.getElementById('city').value);
    // console.log(city);
    // console.log("localhost/web/index/forecast.php?city="+city);
    fetch("forecast.php?city="+city).then(onResponse).then(getKey);
}

function onResponse(response){
    return response.json();
}

function getKey(json){
    if(json['Code']=="ServiceUnavailable"){
        alert("Service Unavailable");
        return;
    }else{
    console.log(json['Code']);
    data=json[0].Key;
    console.log(data);
    fetch("forecast.php?key="+data).then(onResponse).then(getForecast);
}
}

function getForecast(json){
    let previsione = json.DailyForecasts[0].Day.IconPhrase;
    console.log(previsione);
    let div = document.getElementById('mostra');
    div.innerHTML='';
    let prev = document.createElement('span');
    prev.innerHTML = previsione;
    div.appendChild(prev);
    div.classList.remove('hidden');

}



const form1 = document.forms['forecast_form'];
form1.addEventListener('submit', invoca);
console.log("listener creato sul submit di forecast");