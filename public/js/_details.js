function setAddress(_address) {
    document.getElementById("details_address").innerHTML = _address;
}

function setContact(_details) {
    document.getElementById("details_name").innerHTML = _details.nom;
    document.getElementById("details_email").innerHTML = _details.email;
}

function setHoraire(_horaire) {
    if (_horaire.length == 0) {
        $('.content-info-horaires-list').css('display', 'none')
        
        console.log("Array None Of Elements");
    }
}