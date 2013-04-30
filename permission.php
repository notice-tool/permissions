<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GuardDev - Permissions</title>
        <style>
            ::-moz-selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            ::selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            html {
                padding: 30px 10px;
                font-size: 20px;
                line-height: 1.4;
                color: #737373;
                background: #f0f0f0;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            html,
            input {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

            body {
                max-width: 500px;
                _width: 500px;
                padding: 30px 20px 50px;
                border: 1px solid #b3b3b3;
                border-radius: 4px;
                margin: 0 auto;
                box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff;
                background: #fcfcfc;
            }

            h1 {
                margin: 0 10px;
                font-size: 50px;
                text-align: center;
            }

            h1 span {
                color: #bbb;
            }
            span {
                color: #bbb;
            }

            h3 {
                margin: 1.5em 0 0.5em;
            }

            p {
                margin: 1em 0;
            }

            ul {
                padding: 0 0 0 40px;
                margin: 1em 0;
            }

            .container {
                max-width: 380px;
                _width: 380px;
                margin: 0 auto;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h1>Permissions <span></span></h1>
            <p>Status : Alphaphase</p>

            <form action="permission.php">
            <input type="hidden" name="sent" value="yes">
            <a>Datei / Ordner  </a><input type="text" name="file"><br>
            <input type="checkbox" name="permission_b_read" value="4">&nbsp;Besitzer Lesen<br>
            <input type="checkbox" name="permission_b_write" value="2">&nbsp;Besitzer Schreiben<br>
            <input type="checkbox" name="permission_b_export" value="1">&nbsp;Besitzer Ausführen<br>
            <br>
            <input type="checkbox" name="permission_g_read" value="4">&nbsp;Gruppen Lesen<br>
            <input type="checkbox" name="permission_g_write" value="2">&nbsp;Gruppen Schreiben<br>
            <input type="checkbox" name="permission_g_export" value="1">&nbsp;Gruppen Ausführen<br>
            <br>
            <input type="checkbox" name="permission_a_read" value="4">&nbsp;Andere Lesen<br>
            <input type="checkbox" name="permission_a_write" value="2">&nbsp;Andere Schreiben<br>
            <input type="checkbox" name="permission_a_export" value="1">&nbsp;Andere Ausführen<br>
            <input type="submit" value="Rechte ändern">
            </form>
            <?php $sent = $_GET['sent'];			//Weichensteller
            $file = $_GET['file'];			//File or Folder
            $permission_b_read = $_GET['permission_b_read'];	//Inhalt der Checkboxen permission_b
            $permission_b_write = $_GET['permission_b_write'];
            $permission_b_export = $_GET['permission_b_export'];
            $permission_b = $permission_b_read + $permission_b_write + $permission_b_export;

            $permission_g_read = $_GET['permission_g_read'];	//Inhalt der Checkboxen permission_g
            $permission_g_write = $_GET['permission_g_write'];
            $permission_g_export = $_GET['permission_g_export'];
            $permission_g = $permission_g_read + $permission_g_write + $permission_g_export;

            $permission_a_read = $_GET['permission_a_read'];	//Inhalt der Checkboxen permission_a
            $permission_a_write = $_GET['permission_a_write'];
            $permission_a_export = $_GET['permission_a_export'];
            $permission_a = $permission_a_read + $permission_a_write + $permission_a_export;

            $null = "0";
            $permission = $null . $permission_b . $permission_g . $permission_a;

            if ($sent == 'yes') {
                echo 'Angewendeter Code: '.$permission.'';
                chmod("$file", "$permission"); 
             } ?>
            <br>


            <form action="permission.php">
            <input type="hidden" name="test" value="yes">
            <a>Datei / Ordner  </a><input type="text" name="file_test"><br>
            <input type="submit" value="Testen">
            </form>

            <p>Aktueller Rechte Code: <?php
             $sent = $_GET['test'];
             $file_test = $_GET['file_test'];
           if ($sent == 'yes') {	
             echo substr(sprintf('%o', fileperms($file_test)), -4); }
             ?></p>

            <img src="http://www.sourcecode.square7.ch/logo_guarddev.png" width="170" height="102" alt="GuardDev Logo">     
            <p>copyright © 2013 - GuardDev <span>(Jan)</span></p>       
        </div>
    </body>
</html>