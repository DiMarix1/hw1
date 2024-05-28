function getSongs(event){
    event.preventDefault();
    let city = document.getElementById('city').value;
    // console.log("Ho trovato il valore "+city);
    switch(city){
        case "Brasilia":
            city=1;
            break;
        case "El Salvador":
                city=2;
                break;
        case "Hanoi":
            city=3;
            break;
        case "Bogotà":
            city=4;
            break;
        }

    let link = "spotify.php?q="+city;
    fetch(link).then(onResponse).then(onJSON);
}

function onResponse(response){
    return response.json();
}

function onJSON(json){
    
    const show = document.getElementById('show');
    
    show.innerHTML = "";
    const listName = json.name;
    let title = document.createElement('h4');
    title.innerHTML=listName;
   
    show.appendChild(title);
    for(let i=0;i<10;i++){
        let element = json.tracks.items
        let trackName = element[i].track.name;
        let artistName = element[i].track.artists[0].name;
        let trackLink = element[i].track.external_urls.spotify;

        const card = document.createElement('div');
        card.innerHTML = trackName + " di "+ artistName;
        const card_link = document.createElement('a');
        card_link.href = trackLink;
        card_link.innerHTML = "Ascolta";
        card.appendChild(card_link);
        show.appendChild(card);
        show.classList.remove('hidden');
    }
}

const form2 = document.forms['forecast'];

form2.addEventListener('submit', getSongs);