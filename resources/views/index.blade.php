<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Site Carte</title>

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/main.css') !!}" />

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container-top row">
            <div class="logo-top col-lg-1">
            </div>
            <div class="brand-top col-lg-2">
                <span class="brand-top-span">Site de Carte</span>
            </div>
            <div class="menu-top col-lg-7">
                <div class="search">
                    <input type="text" name="search" id="search" placeholder="adress of restaurant">
                    <!-- <button class="btn-search" type="submit">Search</button> -->
                    <button type="submit" onclick="search()" class="btn btn-default btn-search btn-sm">
                        <img src="{!! asset('./fonts/glyphicons_free/glyphicons/png/glyphicons-28-search.png') !!}" alt="search-btn-img" />
                    </button>
                </div>
            </div>
            <div class="user col-lg-2">
                <span class="user-span">Username</span>

                <div class="dropdown dropdown-user">
                    <button class="btn btn-dropdown" type="button" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{!! asset('./fonts/glyphicons_free/glyphicons/png/glyphicons-517-menu-hamburger.png') !!}" alt="dropdown-menu-user-btn-img" />
                    </button>
                    <div class="dropdown-menu" id="dropdown-menu-user" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Sign out</a>

                    </div>
                </div>
            </div>

        </div>
        <div class="container-main row">
            <div class="content-info col-lg-3">
                <div class="content-info-header">
                    <span class="header-span">Votre Choix</span>
                </div>
                <div class="content-info-main">
                    <h4 class="content-info-nom" id="details_name">Fuxia Mercière</h4>
                    <span class="content-info-category" id="details_category">Restaurant</span>
                    <br />
                    <br />
                    <!-- <p class="content-info-telephone" id="details_telephone">pas encore</p> -->
                    <p class="content-info-email" id="details_email">lyon.merciere@fuxia.fr</p>
                    <p class="content-info-adresse" id="details_address">61 Avenue Roger Salengro, 69100 Villeurbanne</p>
                    <ul class="content-info-horaires-list">
                        <li class="content-info-horaires-item horaire-2">Lundi <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>
                        <li class="content-info-horaires-item horaire-3">Mardi <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>
                        <li class="content-info-horaires-item horaire-4">Mercredi <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>
                        <li class="content-info-horaires-item horaire-5">Jeudi <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>   
                        <li class="content-info-horaires-item horaire-6">Vendredi <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>
                        <li class="content-info-horaires-item horaire-7">Samedi <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>
                        <li class="content-info-horaires-item horaire-8">Dimanche <br/>
                            Matin : 10h - 15h <br/>
                            Apres-Midi : 18h - 22h
                        </li>
                    </ul>
                    <!-- <span>Images</span>
                    <ul class="content-info-img-list">
                        <li class="content-info-img-item"><img src="./img/Exemple Carrefour Market/CARREFOUR_WSP244918_0.jpg" alt="carrefour-market-img-1"></li>
                        <li class="content-info-img-item"><img src="./img/Exemple Carrefour Market/carrefour_crf_market_promo20170303_103044_fotor.jpg" alt="carrefour-market-img-2"></li>
                        <li class="content-info-img-item"><button class="content-info-img-btn">Plus Images</button></li>
                    </ul> -->
                </div>
            </div>
            <div class="content-map col-lg-9">
                <div id="map"></div>                
            </div>
        </div>
    </div>

    <footer>

    </footer>
    
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdv4WkV-PnTU--mqdn414zU0Ci8t1XMSE&callback=initMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>       
        
    <script src="{!! asset('js/_dao.js') !!}"></script>
    <script src="{!! asset('js/_details.js') !!}"></script>
    <script src="{!! asset('js/_search.js') !!}"></script>
    <script src="{!! asset('js/_initmap.js') !!}"></script>
</body>

</html>