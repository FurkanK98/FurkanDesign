<?php
    include "Verbindung.php";
    $ID = $_POST['ID'];
    $Passwort = $_POST['Passwort'];
    $Gesamtpreis = $Verbindung->query("SELECT SUM(`Preis`*`Anzahl`) FROM `Bestellung`, `Trikotshop`, `Account` WHERE `Bestellung`.`Session_ID` = '" . $ID . "' AND `Account`.`Passwort` = '" . $Passwort . "' AND `Trikotshop`.`ID` = `Bestellung`.`Trikotshop_ID` AND `Account`.`Session_ID` = `Bestellung`.`Session_ID`;");

    while($Ausgabe3 = $Gesamtpreis->fetch_assoc()) {
        echo "
        <table border='3' id='Gesamtpreis'>
            <th>Gesamtpreis: " . $Ausgabe3['SUM(`Preis`*`Anzahl`)'] . " €</th>
        </table>";
    }
?>