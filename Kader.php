<?php
    include 'bausteine/Verbindung.php';
    $Torwart = $Verbindung->query("SELECT * FROM `Spieler` WHERE `Spieler`.Position = 'Torwart';");
    $Verteidigung = $Verbindung->query("SELECT * FROM `Spieler` WHERE `Spieler`.Position = 'Verteidiger';");
    $Mittelfeld = $Verbindung->query("SELECT * FROM `Spieler` WHERE `Spieler`.Position = 'Mittelfeld';");
    $Sturm = $Verbindung->query("SELECT * FROM `Spieler` WHERE `Spieler`.Position = 'Sturm';");
?>

<html>
<head>
 	<link type='text/css' rel='stylesheet' href='css/Kader.css'>
	<title>FurkanDesign - Kader</title>
</head>

<body class='Design'>
    <?php
        include 'bausteine/Navigation.php';
    ?>

    <div id='Textfeld'>
        GALATASARAY SK - 2022/23:
    </div>

    <center><table border='4' width=60% id='Überschrift'>
        <th colspan='5'>Torwart</th>
    </table>

    <div id='Spalte_Torwart'>
        <?php
            while($ausgabe = $Torwart->fetch_assoc()) {
            echo "
            <table border='4' width=25% id='Kader_Torwart'>
                <tr>
                    <tr><th>" . $ausgabe['Nummer'] . " - " . $ausgabe['Name'] . " " . $ausgabe['Nationalität'] . "</th></tr>
                    <tr><td><img height='150' width='120' src='Images/Spieler/" . $ausgabe['Name'] .".png'></td></tr>
                    <tr><td>Im Verein seit: " . $ausgabe['Vertrag_Seit'] . "</td></tr>
                    <tr><td>Vertrag bis: " . $ausgabe['Vertrag_Bis'] . "</td></tr>
                </tr>
            </table>";
            }
        ?>
        <br style='clear:both;'>
    </div>

    <table border='4' width=60% id='Überschrift'>
        <th colspan='5'>Verteidigung</th>
    </table>

    <div id='Spalte_Verteidigung'>
        <?php
            while($ausgabe2 = $Verteidigung->fetch_assoc()) {
            echo "
            <table border='4' width=25% id='Kader_Verteidigung'>
                <tr>
                    <tr><th>" . $ausgabe2['Nummer'] . " - " . $ausgabe2['Name'] . " " . $ausgabe2['Nationalität'] . "</th></tr>
                    <tr><td><img height='150' width='120' src='Images/Spieler/" . $ausgabe2['Name'] .".png'></td></tr>
                    <tr><td>Im Verein seit: " . $ausgabe2['Vertrag_Seit'] . "</td></tr>
                    <tr><td>Vertrag bis: " . $ausgabe2['Vertrag_Bis'] . "</td></tr>
                </tr>
            </table>";
            }
        ?>
        <br style='clear:both;'>
    </div>

    <table border='4' width=60% id='Überschrift'>
        <th colspan='5'>Mittelfeld</th>
    </table>

    <div id='Spalte_Mittelfeld'>
        <?php
            while($ausgabe3 = $Mittelfeld->fetch_assoc()) {
            echo "
            <table border='4' width=25% id='Kader_Mittelfeld'>
                <tr>
                    <tr><th>" . $ausgabe3['Nummer'] . " - " . $ausgabe3['Name'] . " " . $ausgabe3['Nationalität'] . "</th></tr>
                    <tr><td><img height='150' width='120' src='Images/Spieler/" . $ausgabe3['Name'] .".png'></td></tr>
                    <tr><td>Im Verein seit: " . $ausgabe3['Vertrag_Seit'] . "</td></tr>
                    <tr><td>Vertrag bis: " . $ausgabe3['Vertrag_Bis'] . "</td></tr>
                </tr>
            </table>";
            }
        ?>
        <br style='clear:both;'>
    </div>

    <table border='4' width=60% id='Überschrift'>
        <th colspan='5'>Sturm</th>
    </table>

    <div id='Spalte_Sturm'>
        <?php
            while($ausgabe4 = $Sturm->fetch_assoc()) {
            echo "
            <table border='4' width=25% id='Kader_Sturm'>
                <tr>
                    <tr><th>" . $ausgabe4['Nummer'] . " - " . $ausgabe4['Name'] . " " . $ausgabe4['Nationalität'] . "</th></tr>
                    <tr><td><img height='150' width='120' src='Images/Spieler/" . $ausgabe4['Name'] .".png'></td></tr>
                    <tr><td>Im Verein seit: " . $ausgabe4['Vertrag_Seit'] . "</td></tr>
                    <tr><td>Vertrag bis: " . $ausgabe4['Vertrag_Bis'] . "</td></tr>
                </tr>
            </table>";
            }
        ?>
        <br style='clear:both;'>
    </div></center>

    <?php
        include 'bausteine/Fußzeile.php';
    ?>
</body>
</html>