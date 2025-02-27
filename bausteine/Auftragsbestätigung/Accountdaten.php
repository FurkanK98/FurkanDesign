<?php
        echo "<form action='bausteine/Auftragsbestätigung/Bestellungsbestätigung.php' method='POST'>
            <table border='3' id='Daten'>
                <tr><th border='3' colspan='2'>Accountdaten:</th></tr>
                <tr><td>Anrede:</td><td><input type='radio' name='anrede' value='Herr'>Herr</input><input type='radio' name='anrede' value='Frau'>Frau</input></td><tr>
                <tr><td>Vorname:</td><td><input type='text' name='vorname' required='required'></input></td><tr>
                <tr><td>Nachname:</td><td><input type='text' name='nachname' required='required'></input></td><tr>
                <tr><td>Adresse:</td><td><input type='text' name='adresse' required='required'></input></td><tr>
                <tr><td>PLZ:</td><td><input type='text' name='plz' minlength='5' maxlength='5' required='required'></input></td><tr>
                <tr><td>Stadt:</td><td><input type='text' name='stadt' required='required'></input></td><tr>
                <tr><td>E-Mail:</td><td><input type='text' name='email' required='required' pattern='((?=.*[@])).*$'></input></td><tr>
                <tr><td>IBAN:</td><td><input type='text' name='zahlungsmittel' required='required' pattern='^DE\d{2}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{2}|DE\d{20}$' title='Eine deutsche IBAN hat 22 Stellen und beginnt mit DE'></input></td></tr> <!--- placeholder='' für die Füllung ---!>
                <tr><td>Passwort:</td><td><input type='password' name='passwort' required='required' pattern='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?=.*[A-Z])(?=.*[a-z]).*$'></input></td></tr> <!--- (?![.\n]) Sonderzeichen---!>
                <td colspan='2' width='100%'><input type='submit' value='KAUFEN'></input></td>
                </form>
            </table>
            "
?>