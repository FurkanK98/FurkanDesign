const indikatoren = document.getElementsByClassName("indikator");
indikatoren[0].classList.add("aktiv");

const slides = document.getElementsByClassName("slide");
slides[0].classList.add("aktiv");

var aktuellesFoto = 0;
var letzteAktualisierung = new Date();

function umschalten(anzahl) {
    var neuesFoto = aktuellesFoto + anzahl;

    if(neuesFoto < 0) {
        neuesFoto = slides.length -1;
    }

    if(neuesFoto > slides.length -1) {
        neuesFoto = 0;
    }

    Punkt(neuesFoto);
}

function Punkt(neuesFoto) {
    indikatoren[aktuellesFoto].classList.remove("aktiv");
    slides[aktuellesFoto].classList.remove("aktiv");

    indikatoren[neuesFoto].classList.add("aktiv");
    slides[neuesFoto].classList.add("aktiv");

    aktuellesFoto = neuesFoto;
    letzteAktualisierung = new Date();
}


function Automatisch() {
    const vergangeneZeit = new Date() - letzteAktualisierung;

    if(vergangeneZeit >= 3000) {
        umschalten(1);
    }
}

setInterval(Automatisch, 500);

