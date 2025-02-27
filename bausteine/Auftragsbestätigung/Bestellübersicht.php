<?php
    include "Verbindung.php";
    $Session_ID = session_id();

    $Bestellübersicht = $Verbindung->query("SELECT * FROM `Trikotshop`,`Warenkorb` WHERE `Warenkorb`.`Session_ID` = '" . $Session_ID . "' AND `Trikotshop`.`ID` = `Warenkorb`.`Trikotshop_ID`;");

    while($Ausgabe2 = $Bestellübersicht->fetch_assoc()) {
        echo "
        <table border='3' id='Bestellübersicht'>
            <form action='bausteine/Auftragsbestätigung/Änderungen.php' method='POST'>
                <tr>
                    <td><img src='images/Trikotshop/" . $Ausgabe2['Bildquelle'] . "/1.png' height='150px' width='120px'/></td>
                    <td width='300'><b>Bezeichnung:</b><br>". $Ausgabe2['Bezeichnung'] . " - " . $Ausgabe2['Geschlecht'] . "</td>
                    <td><b>Stückzahl:</b><br>" . $Ausgabe2['Anzahl'] . "</td>
                    <td><b>Größe:</b><br>". $Ausgabe2['Größe'] . "</td>
                    <td><b>Preis pro Stück:</b><br>" . $Ausgabe2['Preis'] . " €</td>
                </tr>
            </form>
        </table>";
    }
?>