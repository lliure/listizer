<?php
/**
*
* Listizer - lliure 5.x
*
* @Versão 3.1
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

header("Content-Type: text/html; charset=ISO-8859-1", true);

require_once("../../../etc/bdconf.php");
require_once("../../../includes/jf.funcoes.php");

switch(isset($_GET['ac']) ? $_GET['ac'] : ''){
	case 'newsletter':
		$dados = mysql_fetch_assoc(mysql_query('select * from '.PREFIXO.'listizer where email = "'.$_POST['email'].'" and categoria = "'.$_POST['categoria'].'" limit 1'));
		
		if($_POST['cad'] == 'adicionar'){
			
			if(isset($dados['id']) && $dados['status'] == 0){
				if($erro = jf_update(PREFIXO.'listizer', array('status' => '1'), array('id' => $dados['id']))){
					$retorno = 'cad_erro';
				} else {
					$retorno = 'cad_ok';
				}				
			} elseif(!isset($dados['id'])){
				if($erro = jf_insert(PREFIXO.'listizer', array('email' => $_POST['email'], 'nome' => $_POST['nome'], 'categoria' => $_POST['categoria']))){
					$retorno = 'cad_erro';
				} else {					
					$retorno = 'cad_ok';
				}				
			} else {
				$retorno = 'cadastrado';
			}
			
		} else {			
			if(isset($dados['id'])){
				if($erro = jf_update(PREFIXO.'listizer', array('status' => '0'), array('id' => $dados['id']))) {
					$retorno = 'rev_erro';
				} else {
					$retorno = 'rev_ok';
				}
			} else { 
				$retorno = 'semcad';
			}
		}
		
		header('location: '.$_POST['retorno'].$_POST['retornoGet'].$retorno);	
	break;

	default:
		header('location: ./');
	break;
}
?>
