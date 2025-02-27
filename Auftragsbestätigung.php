<?php
    include "bausteine/Verbindung.php";
    session_start();
    $Session_ID = session_id();

    $Warenkorb = $Verbindung->query("SELECT * FROM `Warenkorb` WHERE Warenkorb.`Session_ID` = '" . $Session_ID . "';");
?>

<html>
    <head>
        <link type='text/css' rel='stylesheet' href='css/Auftragsbestätigung.css'>
        <title>FurkanDesign - Warenkorb-Übersicht</title>
    </head>

    <body class='Design'>
        <?php
            include 'bausteine/Navigation.php';
        ?>

        <div id='Warenkorb-Container'>
            <?php
                if(empty($Warenkorb)) {
                    echo "Ihr Warenkorb ist leer!";
                } else {
                    echo "<table id='Überschrift' border='3'><th>Warenkorb-Übersicht</th></table>";
                    include 'bausteine/Auftragsbestätigung/Accountdaten.php';
                    include 'bausteine/Auftragsbestätigung/Bestellübersicht.php';
                    include 'bausteine/Auftragsbestätigung/Gesamtpreis.php';
                }
            ?>
            <br style='clear:both;'>
        </div>

        <?php
            include 'bausteine/Fußzeile.php';
        ?>
    </body>
</html>