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
