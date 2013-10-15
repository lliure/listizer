<?php
/**
*
* Listizer - lliure 5.x
*
* @Versão 3
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$llHome = $_ll['app']['home'];
$llPasta = $_ll['app']['pasta'];
$llTable = PREFIXO."listizer";

$botoes = array(
	array('href' => $backReal, 'img' => $plgIcones.'br_prev.png', 'title' => $backNome)
	);

echo app_bar('Listizer', $botoes);


$pagina = 'home';

if(isset($_GET['p']) && file_exists($llPasta.$_GET['p'].'.php'))
	$pagina =  $_GET['p'];

require_once($pagina.'.php');
?>
