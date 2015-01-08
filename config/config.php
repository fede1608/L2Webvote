<?php

session_start();


$servidor_mysql = "h5.l2-debyan.com";
$usuario_mysql = "";
$pass_mysql = "";
$gameserver_db = "zadmin_debyantest";
$loginserver_db = "zadmin_debyantest";


$con = mysql_connect($servidor_mysql, $usuario_mysql, $pass_mysql) or die(mysql_error());
mysql_select_db($gameserver_db, $con) or die(mysql_error());


$login_session = @$_SESSION['login'];
$pass_session = @$_SESSION['senha'];


$confirmar = mysql_query("SELECT * FROM {$loginserver_db}.accounts WHERE login = '" . $login_session . "' AND password = '" . $pass_session . "'") or die(mysql_error());
$contagem = mysql_num_rows($confirmar);
$dados = mysql_fetch_array($confirmar);

if ($contagem == 1) {
    $_SESSION['logado'] = 1;
}

$config = mysql_query("SELECT valor FROM vote_voto_config WHERE id = 'item_id'");
$c_config = mysql_fetch_array($config);

$item = $c_config['valor'];

$config = mysql_query("SELECT valor FROM vote_voto_config WHERE id = 'quantidade'");
$c_config = mysql_fetch_array($config);

$qtd_item = $c_config['valor'];

$config = mysql_query("SELECT valor FROM vote_voto_config WHERE id = 'seu_id_topgs200'");
$c_config = mysql_fetch_array($config);

$link_voto = 'http://www.topgs200.com/lineage2/voto.php?id=' . $c_config['valor'] . '';

?>