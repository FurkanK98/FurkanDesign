<?php
    include "Verbindung.php";
    $ID = $_POST['ID'];
    $Passwort = $_POST['Passwort'];
    $Accountdaten = $Verbindung->query("SELECT * FROM `Account`, `Bestellung` WHERE `Account`.`Session_ID` = '" . $ID . "' AND `Account`.`Passwort` = '" . $Passwort . "' AND `Account`.`Session_ID` = `Bestellung`.`Session_ID`;");

    while($Ausgabe = $Accountdaten->fetch_assoc()) {
        echo "
        <table border='3' id='Daten'>
        <tr><th border='3' colspan='2'>Accountdaten:</th></tr>
        <tr><td>Kundennummer:</td><td>" . $Ausgabe['Session_ID'] . "</td><tr>
        <tr><td>Vor- und Nachname:</td><td>" . $Ausgabe['Vorname'] . " " . $Ausgabe['Nachname'] . "</td><tr>
        <tr><td>Adresse:</td><td>" . $Ausgabe['Adresse'] . "<br>" . $Ausgabe['PLZ'] . " " . $Ausgabe['Stadt'] . "</td><tr>
        <tr><td>E-Mail:</td><td>" . $Ausgabe['E-Mail'] . "</td><tr>
        <tr><td>Bestelldatum:</td><td>" . $Ausgabe['Bestellt_Am'] . "</td></tr>
        </table>";
    }
?>