<?php

session_start();

//LOCAL QUE VOCЪ PRECISA ALTERAR
$servidor_mysql = "xxx.xxx.xxx.xxx";
$usuario_mysql  = "xxxxxxxxxxx";
$senha_mysql    = "xxxxxxxxx";
$basedados_accounts = "xxxxxxxxxxx";
/*/ ALTERAЧеES SOMENTE ATЩ AQUI/*/



$con = mysql_connect($servidor_mysql, $usuario_mysql, $senha_mysql) or die(mysql_error());
mysql_select_db($basedados_accounts, $con) or die(mysql_error());


$login_session = @$_SESSION['login'];
$senha_session = @$_SESSION['senha'];


$confirmar = mysql_query("SELECT * FROM accounts WHERE login = '".$login_session."' AND password = '".$senha_session."'") or die(mysql_error());
$contagem = mysql_num_rows($confirmar);
$dados = mysql_fetch_array($confirmar);

if($contagem == 1){
	$_SESSION['logado'] = 1;
}

$config = mysql_query("SELECT valor FROM voto_config WHERE id = 'item_id'");
$c_config = mysql_fetch_array($config);

$item = $c_config['valor'];

$config = mysql_query("SELECT valor FROM voto_config WHERE id = 'quantidade'");
$c_config = mysql_fetch_array($config);

$qtd_item = $c_config['valor'];

$config = mysql_query("SELECT valor FROM voto_config WHERE id = 'seu_id_topgs200'");
$c_config = mysql_fetch_array($config);

$link_voto = 'http://www.topgs200.com/lineage2/voto.php?id='.$c_config['valor'].''; 

?>