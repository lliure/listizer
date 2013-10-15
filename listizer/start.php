<?php
/**
*
* Listizer - lliure 4.7
*
* @Versão 2.0.0
* @Desenvolvedor Jeison Frasson <contato@grapestudio.com.br>
* @Entre em contato com o desenvolvedor <contato@grapestudio.com.br> http://www.grapestudio.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$llHome = "?plugin=listizer";
$llPasta = "plugins/listizer/";
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
