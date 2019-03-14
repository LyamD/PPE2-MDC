
// Calcul du tarif selon le nombre de personne
function tarifCalcul(Form, clear) {

    if (clear) {
        document.getElementById('resultat-tarif').innerHTML = "";
        return 0;
    }

    var prixAnnee = 50;
    var adulte = Form.nbAdulte.value;
    var enfant12 = Form.nbEnfant12.value;
    var enfant16 = Form.nbEnfant16.value;
    var enfant18 = Form.nbEnfant18.value;

    function reduction(reduc) {
       return prixAnnee * reduc;
    }

    var resultat =  (adulte * reduction(1)) + 
                    (enfant12 * reduction(0.70)) + 
                    (enfant16 * reduction(0.80)) + 
                    (enfant18 * reduction(0.90));

    window.document.getElementById('resultat-tarif').innerHTML =  resultat + " €";
}


// Google Map
var map;
function initMap() {
    var Nimes = {
        lat: 43.836699,
        lng: 4.360054
    }
    map = new google.maps.Map(document.getElementById('map'), {
        center: Nimes,
        zoom: 7
    });
    var marker = new google.maps.Marker({
        position: Nimes,
        map: map
    })
}


 /*var pentagramme = {
    lat: 52.479761,
    lng: 62.185661
 }*/
