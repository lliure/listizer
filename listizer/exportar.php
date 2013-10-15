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

$query = 'select id, email, nome from '.$llTable.' where status = "1"';

if(isset($_GET['fpc']) && $_GET['fpc'] != 'all')
		$query .= ' and categoria = "'.$_GET['fpc'].'"';

$query = mysql_query($query);

?>

<div class="boxCenter900 exportar">
	<textarea  onclick="this.select()"><?php
		while($dados = mysql_fetch_assoc($query)){
			echo $dados['email']."\n";
		}
		?></textarea>
</div>
