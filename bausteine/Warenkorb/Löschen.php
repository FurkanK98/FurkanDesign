<?php
    include "Verbindung.php";

    session_start();
    $Session_ID = session_id();

    $Löschen = $Verbindung->query("
    DELETE FROM `warenkorb`
    WHERE `Größe` = '" . $_POST['Löschen'] . "' AND `Trikotshop_ID` = " . $_POST['Löschen2'] . ";
    ");

    echo "
    <script type='text/javascript'>
        window.location = '../../Warenkorb.php'
    </script>";
?>