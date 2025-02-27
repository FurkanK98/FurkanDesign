<?php
    include "Verbindung.php";
    $ID = $_POST['ID'];
    $Passwort = $_POST['Passwort'];
    $Bestellübersicht = $Verbindung->query("SELECT * FROM `Account`,`Trikotshop`,`Bestellung` WHERE `Account`.`Session_ID` = '" . $ID . "' AND `Account`.`Passwort` = '" . $Passwort . "' AND `Bestellung`.`Session_ID` = `Account`.`Session_ID` AND `Trikotshop`.`ID` = `Bestellung`.`Trikotshop_ID`;");

    while($Ausgabe2 = $Bestellübersicht->fetch_assoc()) {
        echo "
        <table border='3' id='Bestellübersicht'>
            <tr>
                <td><img src='images/Trikotshop/" . $Ausgabe2['Bildquelle'] . "/1.png' height='150px' width='120px'/></td>
                <td width='300'><b>Bezeichnung:</b><br>". $Ausgabe2['Bezeichnung'] . " - " . $Ausgabe2['Geschlecht'] . "</td>
                <td><b>Stückzahl:</b><br>" . $Ausgabe2['Anzahl'] . "</td>
                <td><b>Größe:</b><br>" . $Ausgabe2['Größe'] . "</td>
                <td><b>Preis pro Stück:</b><br>" . $Ausgabe2['Preis'] . " €</td>
            </tr>
        </table>";
    }
?>