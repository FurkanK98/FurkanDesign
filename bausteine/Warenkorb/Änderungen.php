<?php
    include "Verbindung.php";

    session_start();
    $Session_ID = session_id();

    $Speichern = $Verbindung->query("
    UPDATE `warenkorb`
    SET `Session_ID` = '" . $Session_ID . "', `Trikotshop_ID` = " . $_POST['Speichern2'] . ", `Größe` = '" . $_POST['Größe'] . "', `Anzahl` = " . $_POST['Anzahl'] . "
    WHERE `Session_ID` = '" . $Session_ID . "' AND `Größe` = '" . $_POST['Speichern'] . "' AND `Trikotshop_ID` = " . $_POST['Speichern2'] . ";
    ");

    $Löschen = $Verbindung->query("
    DELETE FROM `warenkorb`
    WHERE `Größe` = '" . $_POST['Löschen'] . "' AND `Trikotshop_ID` = " . $_POST['Löschen2'] . ";
    ");

    echo "
    <script type='text/javascript'>
        window.location = '../../Warenkorb.php'
    </script>";
?>