<?php
include "config/config.php";

if ($contagem != 1 || !(strpos($_SERVER['HTTP_REFERER'], 'panel.php') !== false)) {
    header("Location: index.php");
} else {

    $a = mysql_query("SELECT * FROM characters WHERE account_name = '" . $login_session . "' AND online = 0") or die (mysql_error());




    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="js/vs.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <title>[HSR] Herederos Sin Reinos - Sistema de Votaciones</title>
        <style type="text/css">
            <!--
            .Estilo1 {
                color: #4f4f4f
            }

            -->
        </style>
    </head>
    <body>
    <table width="250" border="0" align="center" class="table_round">
        <center>
            <tr>
                <td class="none">
                    <p>
                        <strong><span class="Estilo1">Muchas gr&aacute;cias por tu voto </span></strong>

                    <div class="noerrorh1"><span class="left">Ya casi terminas  <b><?php echo $_SESSION['login']; ?></b></span>
                    </div>
                    <p>

                    <div class="cleaner_with_lowheight"></div>
                    <div id="info"></div>

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


                    if (($c_ip == 0) && ($c_login == 0)) {

                    ?><strong>Elije el Personaje en el cual deseas recibir el reward </strong>

                    <p>

                        <?php
                        //************************************************************************************
                        mysql_query("UPDATE totalvoto SET votos = (votos+1)") or die(mysql_error());

                        //fim de to do o registro*************************************************************


                        function voteLinks() {

                        ?>

                    <div id="VoteLinks" align="center">

                        <?php

                        $lista_top = mysql_query("SELECT * FROM lista_top") or die (mysql_error());


                        while ($lista_links = mysql_fetch_array($lista_top)) {

                            ?>
                            <a href="<?php echo $lista_links['link_voto']; ?>" target="_blank"></a>

                        <?php
                        }
                        ?>
                    </div>

                <?php
                }
                ?>
                    <?php
                    echo voteLinks();

                    ?>
                    <form id="form1" name="form1" method="post" action="verificar.php">
                        <p>
                            <label>
                                <select name="char_Id" id="char_Id">
                                    <?php
                                    while ($c_a = mysql_fetch_array($a)) {
                                        ?>
                                        <option
                                            value="<?php echo $c_a['charId']; ?>"><?php echo $c_a['char_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </label>
                        </p>
                        <p><font size="2" color="#FF9900">
                                <label></label>
                                <input type="submit" name="button" id="button" value="Recibir"/>
                            </font></p>
                    </form>
        </center>
        <p>
            <?php


            } else {
                ?>
                <strong>Status:</strong> Usted ya ha votado, intentelo de nuevo m&aacute;s tarde.
            <?php } ?>
            </li>
            </div>
        </p>

        <p><a href="salir.php">Cerrar</a></p></td>
        </tr>
    </table>
    <div class="noerrorh1"></div>
    </body>
    </html>
<?php
}
?>