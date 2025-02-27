<html>
<head>
    <link type='text/css' rel='stylesheet' href='../css/Fußzeile.css'>
</head>

<body>
    <footer id="fußzeile">
        <p>Copyright &copy 2022 - Furkan Kayadelen |
        <button onclick='Anzeigen();' id='Footer-Button'>Ihre Session-ID: </button>
        <a id='Session_ID'></a>

        <script>
        function Anzeigen() {
            var Session_ID=new XMLHttpRequest();
            Session_ID.open('GET', '/bausteine/Session_ID.php', true);

            Session_ID.onreadystatechange = function() {
                if (Session_ID.readyState == 4 && Session_ID.status == 200) {
                    document.getElementById('Session_ID').innerHTML=Session_ID.responseText;
                }
            }

            Session_ID.send();
        }
        </script></p>
    </footer>
</body>
</html>