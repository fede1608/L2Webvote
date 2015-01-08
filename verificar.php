<?php
ini_set("display_errors", "OFF");
ini_set("allow_url_fopen", 1);
ini_set("allow_url_include", 1);
include "config/config.php";

if ($contagem != 1) {
    header("Location: index.php");
} else {
    $dataatual = date("d/m/Y"); //Dia: M&ecirc;s: Ano:
    ?>


    <?php

    //inicia busca de login
    //********************************************************************************
    $sql_login = mysql_query("SELECT * FROM vote_loginvotos WHERE login='$_SESSION[login]'");
    $c_login = mysql_num_rows($sql_login);
    //********************************************************************************
    //inicia busca de ip
    //********************************************************************************
    $sql_ip = mysql_query("SELECT * FROM vote_ipvotos WHERE ip='$_SERVER[REMOTE_ADDR]'");
    $c_ip = mysql_num_rows($sql_ip);
    //********************************************************************************


    if (($c_ip == 0) && ($c_login == 0)) {


        $charid = $_POST['char_Id'];

        $a = mysql_query("SELECT valor FROM vote_voto_config WHERE id = 'seu_id_topgs200'") or die (mysql_error());
        $c_a = mysql_fetch_array($a);


        //**********************************************************************************
        $ipUsuario = $_SERVER['REMOTE_ADDR'];
        $arrIpUsuario = explode('.', $ipUsuario);
        $arrIpUsuario[3] = 'xxx';
        $ipUsuario = implode('.', $arrIpUsuario);


        $site = file_get_contents('http://www.top100arena.com/in.asp?id=' . $c_a['valor'] . '');
        $pattern = '/[0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}[.][x]{3}/i';
        preg_match_all($ipUsuario, $site, $arrResultado);
        $resultado = $arrResultado[0];

        if (array_search($ipUsuario, $resultado) === false) {
            echo "<script>alert('Usted no ha votado correctamente, intentelo otra vez');</script>";

            echo "<script>window.location='javascript:history.go(-1)';</script>";

        } else {
            //inicio do registro de lieberaÃ§Ã£o de acesso ao site******************************

            mysql_query("REPLACE INTO `vote_ipvotos` (`ip`, `datadovoto`) VALUES ('$_SERVER[REMOTE_ADDR]', '$dataatual')") or die(mysql_error());
            mysql_query("REPLACE INTO `vote_loginvotos` (`login`, `datadovoto`) VALUES ('$_SESSION[login]', '$dataatual')") or die(mysql_error());

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


            $h = mysql_query("SELECT * FROM items WHERE owner_id = '" . $charid . "' AND item_id = '" . $item . "' AND loc = 'INVENTORY'") or die (mysql_error());

            $num_h = mysql_num_rows($h);

            if ($num_h > 0) {

                $c_h = mysql_fetch_array($h);

                mysql_query("UPDATE items SET count = (count + '" . $qtd_item . "') WHERE object_id = '" . $c_h['object_id'] . "'") or die (mysql_error());

                echo "<script>alert('Gracias por votar a Debyan!!');</script>";
                echo "<script>window.location='javascript:history.go(-1)';</script>";
            } else {

                function random2($nNumeros)
                {
                    $aRand = array();
                    for ($i = 1; $i <= 1; $i++) {
                        $aRand[$i] = $rand = rand(1, 9);

                        while (count($aRand) < $nNumeros)
                            if (!in_array($rand, $aRand))
                                $aRand[] = $rand;
                            else
                                $rand = rand(1, 9);
                    }

                    return $aRand;
                }

                function random($x)
                {
                    $return .= '5';
                    foreach (random2($x) as $num) {
                        $return .= $num;
                    }
                    return $return;
                }


                $random = random(8);

                mysql_query("INSERT INTO items (owner_id, object_id, item_id, count, enchant_level, loc) VALUES ('" . $charid . "', '" . $random . "', '" . $item . "', '" . $qtd_item . "', 0, 'INVENTORY')") or die (mysql_error());


                echo "<script>alert('Gracias por votar, revise vuestro inventario!');</script>";
                echo "<script>window.location='javascript:history.go(-1)';</script>";


            }
        }
    } else {
        echo "<script>alert('Usted no puede hacer eso!!');</script>";
        echo "<script>window.location='javascript:history.go(-2)';</script>";
    }
    ?>
<?php
}
?>