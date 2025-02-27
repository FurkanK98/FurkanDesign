<?php
    include "Verbindung.php";
    $Session_ID = session_id();

    $Bestellübersicht = $Verbindung->query("SELECT * FROM `Trikotshop`,`Warenkorb` WHERE `Warenkorb`.`Session_ID` = '" . $Session_ID . "' AND `Trikotshop`.`ID` = `Warenkorb`.`Trikotshop_ID`;");

    while($Ausgabe2 = $Bestellübersicht->fetch_assoc()) {
        echo "
        <table border='3' id='Bestellübersicht'>
            <form action='bausteine/Warenkorb/Änderungen.php' method='POST'>
                <tr>
                    <td><img src='images/Trikotshop/" . $Ausgabe2['Bildquelle'] . "/1.png' height='150px' width='120px'/></td>
                    <td width='300'><b>Bezeichnung:</b><br>". $Ausgabe2['Bezeichnung'] . " - " . $Ausgabe2['Geschlecht'] . "</td>
                    <td>
                    <b>Stückzahl:</b><br>" . $Ausgabe2['Anzahl'] . " <br><br>
                    <b>Ändern zu:</b><br>
                        <select name='Anzahl'>
                             <option value='1'>1</option>
                             <option value='2'>2</option>
                             <option value='3'>3</option>
                             <option value='4'>4</option>
                             <option value='5'>5</option></center>
                         </select>
                    </td>
                    <td>
                    <b>Größe:</b><br>" . $Ausgabe2['Größe'] . "<br><br>
                    <b>Ändern zu:</b><br>
                        <select name='Größe'>
                             <option value='S'>S</option>
                             <option value='M'>M</option>
                             <option value='L'>L</option>
                             <option value='XL'>XL</option></center>
                         </select>
                     </td>
                    <td><b>Preis pro Stück:</b><br>" . $Ausgabe2['Preis'] . " €</td>
                    <td width='10'>
                        <button type='submit' value='" . $Ausgabe2['Größe'] . "' id='Button' name='Speichern'>&#9998;</button>
                        <input type='hidden' value='" . $Ausgabe2['Trikotshop_ID'] . "' name='Speichern2'/>
                        <button type='submit' value='" . $Ausgabe2['Größe'] . "' id='Button' name='Löschen'>&#10006;</button>
                        <input type='hidden' value='" . $Ausgabe2['Trikotshop_ID'] . "' name='Löschen2'/>
                    </td>
                </tr>
            </form>
        </table>";
    }
?>