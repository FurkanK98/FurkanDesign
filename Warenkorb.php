<?php
    include "bausteine/Verbindung.php";
    session_start();
    $Session_ID = session_id();

    $Warenkorb = $Verbindung->query("SELECT * FROM `Warenkorb` WHERE Warenkorb.`Session_ID` = '" . $Session_ID . "' LIMIT 1;");
?>

<html>
    <head>
        <link type='text/css' rel='stylesheet' href='css/Warenkorb.css'>
        <title>FurkanDesign - Warenkorb</title>
    </head>

    <body class='Design'>
        <?php
            include 'bausteine/Navigation.php';
        ?>

        <div id='Warenkorb-Container'>
            <?php
                while($IDCheck = $Warenkorb->fetch_assoc()) {
                    if($Session_ID != $IDCheck['Session_ID']) {
                        echo "Ihr Warenkorb ist leer!";
                    } else {
                        echo "<table id='Überschrift' border='3'><th>Warenkorb-Übersicht</th></table>";
                        include 'bausteine/Warenkorb/Bestellübersicht.php';
                        include 'bausteine/Warenkorb/Gesamtpreis.php';
                        ?>
                        <button onclick="window.location.href='Auftragsbestätigung.php'">WEITER!</button>
                   <?php
                    }
                }
            ?>
            <br style='clear:both;'>
        </div>

        <?php
            include 'bausteine/Fußzeile.php';
        ?>
    </body>
</html>