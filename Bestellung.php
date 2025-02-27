<?php
    error_reporting(-1);
    ini_set('display_errors', 1);
    include "bausteine/Verbindung.php";
    $ID = $_POST['ID'];
    $Passwort = $_POST['Passwort'];
    $Bestellung = $Verbindung->query("SELECT * FROM `Account` WHERE `Account`.`Session_ID` = '" . $ID . "' AND `Account`.`Passwort` = '" . $Passwort . "';");
?>

<html>
    <head>
        <link type='text/css' rel='stylesheet' href='css/Bestellung.css'>
        <title>FurkanDesign - Bestellung</title>
    </head>

    <body class='Design'>
        <?php
            include 'bausteine/Navigation.php';
        ?>

        <div id='Bestellung-Container'>
            <?php
                while($ID_Check = $Bestellung->fetch_assoc()) {
                    if($ID == $ID_Check['Session_ID'] && $Passwort == $ID_Check['Passwort']) {
                        echo "<table id='Überschrift' border='3'><th>Bestellübersicht: #" . $ID . "</th></table>";
                        include 'bausteine/Bestellung/Accountdaten.php';
                        include 'bausteine/Bestellung/Bestellübersicht.php';
                        include 'bausteine/Bestellung/Gesamtpreis.php';
                    } else {
                        echo "Die von Ihnen eingegebene Bestellnummer existiert nicht!";
                    }
                }
            ?>
        </div>

        <?php
            include 'bausteine/Fußzeile.php';
        ?>
    </body>
</html>