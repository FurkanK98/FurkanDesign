<?php
    include 'bausteine/Verbindung.php';
    $Spieltage = $Verbindung->query("SELECT * FROM `Spieltag` ORDER BY Datum ASC;");
?>

<html>
<head>
 	<link type='text/css' rel='stylesheet' href='css/Spieltag.css'>
    <title>FurkanDesign - Spieltag</title>
</head>

<body class='Design'>
    <?php
        include 'bausteine/Navigation.php';
    ?>

    <div id='Textfeld'>Alle Spieltage auf einem Blick!</div>

    <table border='2' width=60% id='Spieltag'>
        <tr><th colspan='7'>Spieltage</th></tr>
        <?php
            while($ausgabe = $Spieltage->fetch_assoc()) {
                echo "<tr>
                <td>" . $ausgabe['Wettbewerb_Name'] . "</td>
                <td>" . $ausgabe['Spieltag'] . ". Spieltag</td>
                <td>" . $ausgabe['Datum'] ." Uhr</td>
                <td><img src='images/Vereine/" . $ausgabe['Heim'] . ".png' height='40px' width='40px' id='Heim'/></td>
                <td>" . $ausgabe['Ergebnis'] . "</td>
                <td><img src='images/Vereine/" . $ausgabe['Auswärts'] . ".png' height='40px' width='40px id='Auswärts'/></td>
                <td><br>";

                if($ausgabe['Ergebnis'] != 'Geplant') {
                    echo "<form action='Spieltag/Matchday.php' method='GET'><button type='submit' value='" . $ausgabe['Spieltag'] . "' id='HighlightsButton' name='Spieltag'>Highlights ansehen!</button></form>";
                } else {
                    echo "<div><i>Keine Highlights verfügbar!</i></div>";
                }
                "
                </td>
                </tr>";
            }
        ?>
    </table>

    <?php
        include 'bausteine/Fußzeile.php';
    ?>
</body>
</html>