<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);

require_once("../../../etc/bdconf.php");
require_once("../../../includes/jf.funcoes.php");

switch(isset($_GET['ac']) ? $_GET['ac'] : ''){
	case 'newsletter':
		$dados = mysql_fetch_assoc(mysql_query('select * from '.PREFIXO.'listizer where email = "'.$_POST['email'].'" and categoria = "'.$_POST['categoria'].'" limit 1'));
		
		if($_POST['cad'] == 'adicionar'){
			
			if(isset($dados['id']) && $dados['status'] == 0){
				if(jf_update(PREFIXO.'listizer', array('status' => '1'), array('id' => $dados['id']))){
					$retorno = 'cad_ok';
				} else {
					$retorno = 'cad_erro';
				}				
			} elseif(!isset($dados['id'])){
				if(jf_insert(PREFIXO.'listizer', array('email' => $_POST['email'], 'nome' => $_POST['nome'], 'categoria' => $_POST['categoria']))){
					$retorno = 'cad_ok';
				} else {
					$retorno = 'cad_erro';
				}				
			} else {
				$retorno = 'cadastrado';
			}
			
		} else {			
			if(isset($dados['id'])){
				if(jf_update(PREFIXO.'listizer', array('status' => '0'), array('id' => $dados['id']))) {
					$retorno = 'rev_ok';
				} else {
					$retorno = 'rev_erro';
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
