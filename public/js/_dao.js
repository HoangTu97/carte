var locations;
$($.ajax({
    url: "https://map-stores.herokuapp.com/graphql",
    type: 'get',
    data: {
        query: 'query{location(lat:5,long:45){id,lat,lng}}'
    },
    crossDomain: true,
    origin: "*",
    dataType: "JSON",
    success: function (res) {
        console.log(res);
        locations = res.data.location;
        initMap();
    }
}));