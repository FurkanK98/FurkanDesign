<?php
    include 'bausteine/Verbindung.php';
    $GeplanterSpieltag = $Verbindung->query("SELECT * FROM `Spieltag` WHERE Ergebnis = 'Geplant' LIMIT 1;");
    $BeendeterSpieltag = $Verbindung->query("SELECT * FROM `Spieltag` WHERE NOT Ergebnis = 'Geplant' ORDER BY Spieltag DESC LIMIT 1;");
    session_start();
?>

<html>
<head>
 	<link type='text/css' rel='stylesheet' href='css/Startseite.css'>
	<link type='text/css' rel='stylesheet' href='css/Slideshow.css'>
	<title>FurkanDesign - Hauptseite</title>
</head>

<body class='Design'>
    <?php
        include 'bausteine/Navigation.php';
	?>

	<div id='Textfeld'>Herzlich Willkommen bei FurkanDesign!</div>

    <div class='slideshow'>
	<div class='slide'>
	<img src='../images/Startseite-SlideI.jpg' class='slide-bild'>
	</div>
	<div class='slide'>
	<img src='../images/Startseite-SlideII.jpg' class='slide-bild'>
	</div>
	<div class='slide'>
	<img src='../images/Startseite-SlideIII.jpg' class='slide-bild'>
	</div>

	<a class='pfeil pfeil-links' onclick='umschalten(-1)'><span>&#10094;</span></a>
	<a class='pfeil pfeil-rechts' onclick='umschalten(1)'><span>&#10095;</span></a>

	<ol class='indikatorenliste'>
	<li class='indikator' onclick='Punkt(0)'>&#8226;</li>
	<li class='indikator' onclick='Punkt(1)'>&#8226;</li>
	<li class='indikator' onclick='Punkt(2)'>&#8226;</li>
	</ol>
	</div>

    <div id='GeplanterSpieltag'>
    <?php
       while($ausgabe = $GeplanterSpieltag->fetch_assoc()) {
       echo $ausgabe['Wettbewerb_Name'] . " - " . $ausgabe['Spieltag'] . ". Spieltag<br>"  . $ausgabe['Datum'] . " Uhr<br><br>
       <table width=100%>
            <tr>
                <td width='10' id='td-heimlogo'><img src='images/Vereine/" . $ausgabe['Heim'] . ".png' height='80px' width='80px' id='Heim'/></td>
                <td width='10' id='td-offenesergebnis'><span id='Bindestrich'>&#9866</span></td>
                <td width='10' id='td-auswärtslogo'><img src='images/Vereine/" . $ausgabe['Auswärts'] . ".png' height='80px' width='80px id='Auswärts'/></td>
            </tr>
       </table>
       <br>";
       }
    ?>
    </div>

    <div id='BeendeterSpieltag'>
    <?php
        while($ausgabe2 = $BeendeterSpieltag->fetch_assoc()) {
        echo $ausgabe2['Wettbewerb_Name'] . " - " . $ausgabe2['Spieltag'] . ". Spieltag<br>"  . $ausgabe2['Datum'] . " Uhr<br><br>
        <table width=100%>
            <tr>
                <td width='10' id='td-heimlogo'><img src='images/Vereine/" . $ausgabe2['Heim'] . ".png' height='80px' width='80px' id='Heim'/></td>
                <td width='0' id='td-endergebnis'>" . $ausgabe2['Ergebnis'] . "</td>
                <td width='10' id='td-auswärtslogo'><img src='images/Vereine/" . $ausgabe2['Auswärts'] . ".png' height='80px' width='80px id='Auswärts'/></td>
            </tr>
        </table>
       <br><br>
       <form action='Spieltag/Matchday.php' method='GET'><button type='submit' value='" . $ausgabe2['Spieltag'] . "' id='HighlightsButton' name='Spieltag'>Highlights ansehen!</button></form>";
       }
    ?>
    </div>

    <?php
      include 'bausteine/Fußzeile.php';
    ?>
	
	<script src="/javascript/Slideshow.js"></script>
</body>
</html>