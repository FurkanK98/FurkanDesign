<?php
    include "Verbindung.php";
    $Session_ID = session_id();
    $Gesamtpreis = $Verbindung->query("SELECT SUM(`Preis`*`Anzahl`) FROM `Warenkorb`, `Trikotshop` WHERE `Warenkorb`.`Session_ID` = '" . $Session_ID . "' AND `Trikotshop`.`ID` = `Warenkorb`.`Trikotshop_ID`;");

    while($Ausgabe3 = $Gesamtpreis->fetch_assoc()) {
        echo "
        <table border='3' id='Gesamtpreis'>
            <th>Gesamtpreis: " . $Ausgabe3['SUM(`Preis`*`Anzahl`)'] . " €</th>
        </table>";
    }
?>