<?php
    include "bausteine/Verbindung.php";
    session_start();
    $Session_ID = session_id();
    $Warenkorbanzahl = $Verbindung->query("SELECT COUNT(*) FROM `warenkorb` WHERE `Session_ID` = '" . $Session_ID . "';");
?>

<html>
<head>
 	<link type='text/css' rel='stylesheet' href='css/Trikotshop.css'>
    <title>FurkanDesign - Trikotshop</title>
</head>

<body class='Design'>
    <?php
        include 'bausteine/Navigation.php';
    ?>

    <div id='Banner'>
        <form action='Bestellung.php' method='POST'>
            <p id='BestellNr'>Bestell-Nr.:<br><input type='text' name='ID'></input></p>
            <p id='Passwort'>Passwort:<br><input type='password' name='Passwort'></input></p>
            <button type='submit' id='BestellungAbfragen'>Bestellung abfragen</button>
        </form>
        <a href='Warenkorb.php' id='Warenkorb'>
        <?php
            while($WarenkorbAnzahl = $Warenkorbanzahl->fetch_assoc()) {
                echo "Warenkorb(" . $WarenkorbAnzahl['COUNT(*)'] . ")";
            }
        ?></a>
    </div>

    <div id='Trikotshop'>
        <?php
            include "bausteine/Verbindung.php";
            $result = $Verbindung->query("SELECT *, cast(`Preis` as decimal(10,2)) FROM `Trikotshop`;");
                while ($ausgabe = $result->fetch_assoc()) {
                    echo "<table border='4' width=32%>
                        <tr>
                            <th colspan='2'>" . $ausgabe['Bezeichnung'] . " - " . $ausgabe['Geschlecht'] . " </th>
                        </tr>

                        <tr>
                            <td width='1%'><center><img src='images/Trikotshop/" . $ausgabe['Bildquelle'] . "/1.png' height='250px' width='200px'/></center></td>
                        </tr>
                        <tr>
                            <td width='1%'><center><br>Betrag: " . $ausgabe['Preis'] . " € <br><br>
                            <form action='bausteine/Warenkorbanzahl.php' method='GET'>
                                <select name='Größe'>
                                    <option>GR&OumlßE WÄHLEN!</option>
                                    <option value='S'>S</option>
                                    <option value='M'>M</option>
                                    <option value='L'>L</option>
                                    <option value='XL'>XL</option>
                                </select>
                                <button type='submit' value='" . $ausgabe['ID'] . "' id='Button' name='Bestellung'>IN DEN WARENKORB</button>
                            </form></center></td>
                        </tr>
                    </table>";
                }
        ?>
        <br style='clear: both;'>
    </div>

    <?php
        include 'bausteine/Fußzeile.php';
    ?>
</body>
</html>