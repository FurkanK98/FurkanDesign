<?php
    include "Verbindung.php";

    session_start();
    $Session_ID = session_id();

    $InDenWarenkorb = $Verbindung->query("
    INSERT INTO `warenkorb`(`Session_ID`, `Trikotshop_ID`, `Größe`, `Anzahl`)
    VALUES ('" . $Session_ID . "', " . $_GET['Bestellung'] . ", '" . $_GET['Größe'] . "', 1);
    ");

    echo "
    <script type='text/javascript'>
        window.location = '../Trikotshop.php'
    </script>";
?>