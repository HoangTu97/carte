function search() {
    var input;
    input = document.getElementById("search").value;
    window.alert(input);
    $.ajax({
        url: "https://map-stores.herokuapp.com/graphql",
        type: 'get',
        data: {
            query: 'query{search(value:"' + input + '"){nom,lat,lng}}'
        },
        crossDomain: true,
        origin: "*",
        dataType: "JSON",
        success: function (res) {
        }
    })
}

function getByID(_lat, _long) {
    $.ajax({
        url: "https://map-stores.herokuapp.com/graphql",
        type: 'get',
        data: {
            query: 'query{location(lat:'+ _lat +',long:'+ _long +'){id,address,lat,lng}}'
        },
        crossDomain: true,
        origin: "*",
        dataType: "JSON",
        success: function (res) {
            setAddress(res.data.location[0].address);
            getContact(res.data.location[0].id);
            getHoraire(res.data.location[0].id);
        }
    })
}

function getContact(_id) {
    $.ajax({
        url: "https://map-stores.herokuapp.com/graphql",
        type: 'get',
        data: {
            query: 'query{resto(id:' + _id + '){nom,classement,email}}'
        },
        crossDomain: true,
        origin: "*",
        dataType: "JSON",
        success: function (res) {
            setContact(res.data.resto[0]);
        }
    })
}

function getHoraire(_id) {
    $.ajax({
        url: "https://map-stores.herokuapp.com/graphql",
        type: 'get',
        data: {
            query: 'query{horaire(id:' + _id + '){jour,matin_de,matin_a,apres_midi_de,apres_midi_a}}'
        },
        crossDomain: true,
        origin: "*",
        dataType: "JSON",
        success: function (res) {
            setHoraire(res.data.horaire);   
        }
    })
}