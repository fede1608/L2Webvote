<?php
include "config/config.php";

if ($contagem != 1) {
    header("Location: index.php");
} else {
    $a = mysql_query("SELECT * FROM characters WHERE account_name = '" . $login_session . "' AND online = 0") or die (mysql_error());
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <style type="text/css">
            <!--
            .Estilo1 {
                color: #009900
            }

            -->
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <title>Negakih - Sistema de Votaciones</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>
        <link href="../favicon.gif" rel="shortcut icon"/>
        <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="js/vs.js"></script>
        <script type="text/javascript" src="../scripts/block.js"></script>
        <noscript>Esta pagina necesita javascript para poder ejecutarse correctamente!</noscript>
        <style type="text/css">
            <!--
            body {
                width: 600px;
            }

            -->
        </style>
    </head>
    <script language="JavaScript" type="text/javascript">
        //<![CDATA[



            function inhabilitar() {
                alert("Debes votar en todos los banners, no puedes saltearte los pasos")
                return false
            }

        document.oncontextmenu = inhabilitar
        //]]>
    </script>
    <body>
    <div class="noerrorh1">
        <span class="left">Bienvenido! Os habeis conectado con la cuenta: <b>"<?php echo $_SESSION['login']; ?>
                "</b></span>
        <span class="right"><span id="sai">Desconectar</span></span>
    </div>
    <div class="cleaner_with_lowheight"></div>
    <div id="sair">
        <form method="post" action="salir.php" onsubmit="return checkform (this)">
            <input type="submit" name="logout" value="Salir"/>
        </form>
        <div class="cleaner_with_lowheight"></div>
    </div>
    <div id="valor"></div>
    <div class="noerrorh">
        <div id="info">
            <p align="left"><b>Tutorial:</b></p>

            <p align="left">
                <b>1.-</b> Antes de comenzar a votar, asegurese de tener tanto su personaje como la cuenta utilizada en
                este panel desconectada.<br>
                <br>
                <b>2.-</b> Vote en cada uno de los banners pinchando en su imagen. Os redireccionaran hacia su web en
                donde tendreis que votar y cuando voteis en uno, se desbloqueara el siguiente vote. Algunos requieren un
                codigo para evitar posibles bots y otros no. Por cada cinco votaciones realizadas con exito, obtendreis
                una medalla!<br>
                <br>
                <b>3.-</b> Una vez que hayais votado en todos los enlaces disponibles, pulsar sobre el enlace de "<b>Confirmar
                    Votaciones</b>" y os aparecera una ventana en donde tendreis que indicarnos el personaje al que se
                le entregara la medalla. Os recordamos de nuevo que dicho personaje ha de estar desconectado, asi como
                su cuenta.<br>
                <br>
                <b>4.-</b> Una vez indicado el personaje, pulsamos sobre el boton de "<b>Recibir Recompensa</b>" y
                listo!<br>
                <br>
                <b>5.-</b> <b>NOTA:</b> Votaciones por IP/cuenta cada 24 horas!<br><br>
            </p>
        </div>
        <ul id="dados">
            <?php
            $dataatual = date("d/m/Y"); //Dia: M&ecirc;s: Ano:

            mysql_query("DELETE FROM ipvotos WHERE datadovoto < '" . $dataatual . "'")or die (mysql_error());
            mysql_query("DELETE FROM loginvotos WHERE datadovoto < '" . $dataatual . "'")or die (mysql_error());

            //inicia busca de ip
            //********************************************************************************
            $sql_ip = mysql_query("SELECT * FROM ipvotos WHERE ip='$_SERVER[REMOTE_ADDR]'");
            $c_ip = mysql_num_rows($sql_ip);
            //********************************************************************************

            //inicia busca de login
            //********************************************************************************
            $sql_login = mysql_query("SELECT * FROM loginvotos WHERE login='$_SESSION[login]'");
            $c_login = mysql_num_rows($sql_login);
            //********************************************************************************

            if (($c_ip == 0) && ($c_login == 0))
            {
                ?>
                <li>
                    <?php
                    function voteLinks()
                    {
                        ?>
                        <div id="VoteLinks" align="center">
                            <?php
                            $lista_top = mysql_query("SELECT * FROM lista_top") or die (mysql_error());
                            while ($lista_links = mysql_fetch_array($lista_top)) {
                                ?>
                                <a href="<?php echo $lista_links['link_voto']; ?>" target="_blank">
                                    <img src="<?php echo $lista_links['link_botao']; ?>" alt="prize"/> </a>
                            <?php
                            }
                            ?>
                            <a href="entregar.php" >
                                <img src="img/confirmar_votaciones.png" alt="prize"/> </a>
                        </div>
                    <?php
                    }

                    ?>
                <li>
                    <div class="clear">
                        <?php
                        echo voteLinks();
                        ?>
                    </div>
                </li>
                </li>

                <li></li>
            <?php
            }else{
            ?>
            <span class="branco"><b>INFORMACION:</b> Ya has votado! Votaciones por IP/cuenta cada 24 horas!<br>
                <?php
                }
                ?>
				</span>
        </ul>
    </div>
    <!--<div class="cleaner_with_lowheight"></div>
    <div class="noerrorh1">
        <div class="Estilo1" id="credit">http://negakih.com</div>
    </div>-->
    </body>
    </html>
<?php
}
?>