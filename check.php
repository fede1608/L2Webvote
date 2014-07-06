<?php

ini_set("display_errors", "OFF");
include "config/config.php";

$login_c = $_POST['login'];
$senha_c = $_POST['password'];
$base_c = $basedados_accounts;


$con = mysql_connect($servidor_mysql, $usuario_mysql, $senha_mysql) or die(mysql_error());
mysql_select_db($basedados_accounts, $con) or die(mysql_error());

$confirmar = mysql_query("SELECT * FROM accounts WHERE login = '" . $login_c . "' AND password = '" . base64_encode(pack('H*', sha1($senha_c))) . "'", $con) or die(mysql_error());
$contagem = mysql_num_rows($confirmar);
$c = mysql_fetch_array($confirmar);


if ($contagem > 0) {
    $_SESSION['login'] = $c['login'];
    $_SESSION['senha'] = $c['password'];
    $_SESSION['base']['valor'] = $base_c[1];
    echo "<script>window.location='panel.php';</script>";
} else {
    echo "
	  <script language=\"javascript\">
		window.alert('Los Datos ingresados no son correctos!');
		window.location='index.php';
	</script>";
}


?>