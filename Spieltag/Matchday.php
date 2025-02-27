<?php
    include '../bausteine/Verbindung.php';
    $GewählterSpieltag = $_GET['Spieltag'];
    $Spieltag = $Verbindung->query("SELECT * FROM `Spieltag` WHERE Spieltag = " . $GewählterSpieltag . ";");
?>

<html>
<head>
 	<link type='text/css' rel='stylesheet' href='../css/Highlights.css'>
	<title>FurkanDesign - <?php echo $GewählterSpieltag . ". Spieltag" ?></title>
</head>

<body class='Design'>
    <div id='Textfeld'>
        <?php
            while($ausgabe = $Spieltag->fetch_assoc()) {
            echo "<input type='button' value='Zurück zur vorherigen Seite!' onClick='javascript:history.back()' id='ZurückButton'>

            <table width=120% height=8.6%>
            <tr>
                <td width='50' id='td-heimlogo'><img src='../images/Vereine/" . $ausgabe['Heim'] . ".png' height='50px' width='50px' id='Heim'/><td>
                <td width='250' id='td-heim'>" . $ausgabe['Heim'] . "</td>
                <td width='50' id='td-ergebnis'>" . $ausgabe['Ergebnis'] . "</td>
                <td width='250' id='td-auswärts'>" . $ausgabe['Auswärts'] ."</td>
                <td width='50' id='td-auswärtslogo'><img src='../images/Vereine/" . $ausgabe['Auswärts'] . ".png' height='50px' width='50px' id='Auswärts'/></td>
            </tr>
            </table>

            <center><iframe width='650' height='400' src='" . $ausgabe['Stream'] ."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></center>
            <h3>" . $ausgabe['Spieltag'] . ". Spieltag - " . $ausgabe['Wettbewerb_Name'] . " - " . $ausgabe['Datum'] . " Uhr</h3>";
            }
        ?>
    </div>

    <?php
        include '../bausteine/Fußzeile.php';
    ?>
</body>
</html>