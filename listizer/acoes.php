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

header("Content-Type: text/html; charset=ISO-8859-1", true);
require_once("../../etc/bdconf.php");
require_once("../../includes/jf.funcoes.php");

switch(isset($_GET['ac']) ? $_GET['ac'] : ''){

case 'del':
	jf_delete(PREFIXO.'listizer', array('id' => $_GET['id']));
break;


case 'activate':
	$activate = array('checkbox_unchecked' => '0', 'checkbox_checked' => '1');
	jf_update(PREFIXO.'listizer', array('status' => $activate[$_GET['mod']]), array('id' => $_GET['id']));
break;

}
?>
