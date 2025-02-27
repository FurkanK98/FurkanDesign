<?php
    include "Verbindung.php";

    session_start();
    $Session_ID = session_id();

    $Gesamtpreis = $Verbindung->query("SELECT SUM(`Preis`*`Anzahl`) FROM `Warenkorb`, `Trikotshop` WHERE `Warenkorb`.`Session_ID` = '" . $Session_ID . "' AND `Trikotshop`.`ID` = `Warenkorb`.`Trikotshop_ID`;");
    while ($Ausgabe = $Gesamtpreis->fetch_assoc()) {
    }
    $Bestellübersicht = $Verbindung->query("SELECT * FROM `Warenkorb` WHERE `Session_ID` = '" . $Session_ID . "';");
    while ($Ausgabe2 = $Bestellübersicht->fetch_assoc()) {
    }

    $AccountAnlegen = $Verbindung->query("
    INSERT INTO `account`(`Session_ID`, `Anrede`, `Vorname`, `Nachname`, `Adresse`, `PLZ`, `Stadt`, `E-Mail`, `Zahlungsmittel`, `Passwort`)
    VALUES ('" . $Session_ID . "' , '" . $_POST['anrede'] . "', '" . $_POST['vorname'] . "', '" . $_POST['nachname'] . "', '" . $_POST['adresse'] . "', '" . $_POST['plz'] . "', '" . $_POST['stadt'] . "', '" . $_POST['email'] . "', '" . $_POST['zahlungsmittel'] . "', '" . $_POST['passwort'] . "')
    ");

    $BestellungAnlegen = $Verbindung->query("
    INSERT INTO Bestellung (`Session_ID`, `Trikotshop_ID`, `Größe`, `Anzahl`, `Kaufpreis`)
    SELECT `Warenkorb`.`Session_ID`, `Warenkorb`.`Trikotshop_ID`, `Warenkorb`.`Größe`, `Warenkorb`.`Anzahl`, (`Warenkorb`.`Anzahl`*`Trikotshop`.`Preis`)
    FROM `Warenkorb`, `Trikotshop`
    WHERE `Warenkorb`.`Session_ID` = '" . $Session_ID . "' AND `Warenkorb`.`Trikotshop_ID` = `Trikotshop`.`ID`;
    ");

    $WarenkorbLeeren = $Verbindung->query("
    DELETE FROM `Warenkorb` WHERE `Session_ID` = '" . $Session_ID . "';
    ");

    $Bestellungsbestätigung = $Verbindung->query("SELECT * FROM `Account`, `Bestellung` WHERE `E-Mail` = '" . $_POST['email'] . "' AND `Passwort` = '" . $_POST['passwort'] . "' GROUP BY `Bestellt_Am` DESC;");
    while ($Ausgabe3 = $Bestellungsbestätigung->fetch_assoc()) {
    echo "
    <script type='text/javascript'>
        alert('Ihre Bestellung war erfolgreich, " . $_POST['vorname'] . " " . $_POST['nachname'] . ". Ihr Bestell-Nr. lautet: " . $Ausgabe3['Session_ID'] . "!');
        window.location = '../../Startseite.php'
    </script>";
    }

    session_regenerate_id();
?>