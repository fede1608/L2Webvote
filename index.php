<?php include "config/config.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Negakih - Sistema de Votaciones</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="../favicon.gif" rel="shortcut icon"/>
    <script type="text/javascript" src="../scripts/block.js"></script>
    <noscript>Esta pagina necesita javascript para poder ejecutarse correctamente!</noscript>
    <style type="text/css">
        <!--
        a {
            color: #fff;
            text-decoration: none;
            border: none;
        }

        a:hover {
            color: #ff0000;
            text-decoration: underline;
            border: none;
        }

        -->
    </style>
</head>
<body>
<div id="basic" class="myform">
    <form action="check.php" method="post">
        <div class="title">
            <h1>Sistema de Votaciones</h1>
        </div>
        <label for="login">Usuario:</label>
        <input type="text" name="login" id="login" maxlength="16"/>
        <label for="senha">Contrase&ntilde;a:</label>
        <input type="password" name="password" id="password" maxlength="16"/>
        <input type="submit" name="submit" value="Conectarse"/>

        <div class="spacer"></div>
        <td>
            <div align="center">
                <b>PD:</b> Debes loguear con tu cuenta del servidor, no con la del foro.<br>Asegurese de que dicha
                cuenta este desconecta.<br><br>

                <p><font color="#0099FF" size="2">Votos Totales:
                        <?php
                        $totaldevotos = mysql_query("SELECT * FROM vote_totalvoto") or die(mysql_error());
                        $contagem_votos = mysql_fetch_array($totaldevotos);
                        echo $contagem_votos['votos'];
                        ?>
                    </font></p>

                <p>&nbsp;</p>

                <p><font color="#0099FF" size="2">http://negakih.com</font></p>
            </div>
        </td>
    </form>
</div>

</table><br>
<br>
</body>
</html>