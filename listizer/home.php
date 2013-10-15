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

$query = 'select id, email, nome, status from '.$llTable;

if(isset($_GET['fpc']) && $_GET['fpc'] != 'all')
		$query .= ' where categoria = "'.$_GET['fpc'].'"';

$query = mysql_query($query);

$sql2 = mysql_query('select categoria from '.$llTable.' where categoria is not null group by categoria');
?>

<div class="boxCenter900">
	<div id="controles">
		<div class="box">
			<a href="<?php echo jf_monta_link($_GET, 'p').'&amp;p=exportar';?>" class="botao">Exportar lista</a>
		</div>
		
		<div class="box">
			<form>
				<fieldset>
					<div>
						<label>Filtro por categoria:</label>
						<select class="fpc">
							<?php
							while($dados = mysql_fetch_assoc($sql2)){
								echo '<option '.(isset($_GET['fpc']) && $_GET['fpc'] == $dados['categoria'] ? 'selected' : '').'>'.$dados['categoria'].'</option>';
							}
							?>
							<option value="all" <?php echo !isset($_GET['fpc']) || $_GET['fpc'] == 'all' ? 'selected' : '' ;?>>Todos</option>
						</select>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	
	<table class="table">
		<tr>
			<th  style="width: 300px;">E-mail</th>
			<th>Nome</th>
			<th style="width: 20px;"></th>
			<th style="width: 20px;"></th>
		</tr>
	<?php
	$activate = array('0' => 'checkbox_unchecked.png', '1' => 'checkbox_checked.png');
	while($dados = mysql_fetch_assoc($query)){
		?>
		<tr>
			<td><?php echo $dados['email']; ?></td>
			<td><?php echo $dados['nome']; ?></td>
			<td><a href="<?php echo $llPasta.'acoes.php?ac=activate&amp;id='.$dados['id']?>" class="activate"><img src="imagens/icones/<?php echo $activate[$dados['status']]?>"></a></td>
			<td><a href="<?php echo $llPasta.'acoes.php?ac=del&amp;id='.$dados['id']?>" class="del"><img src="imagens/icones/trash.png"></a></td>
		</tr>
		<?php
	}
	?>
	</table>
</div>

<script type="text/javascript">
	$('.del').click(function(){
		var tr = $(this).closest('tr');
		if(confirm('Você quer mesmo apagar este e-mail')){
			ll_load($(this).attr('href'), function(){
				$(tr).fadeOut(300);
				jfAlert('E-mail apagado com sucesso', 0.5);
			});
		}
		return false;
	});

	$('.activate').click(function(){
		var tr = $(this).closest('tr');
		
		if($(this).find('img').attr('src') == 'imagens/icones/checkbox_checked.png')
			var url = 'checkbox_unchecked';
		else
			var url = 'checkbox_checked';

		plg_load($(this).attr('href')+'&mod='+url, function(){
			$(tr).find('.activate img').attr('src', 'imagens/icones/'+url+'.png');
		});

		return false;
	});

	$('.fpc').change(function(){
		var campo = '';
		$(this).children("option:selected").each(function () {
			campo = $(this).val();
		 });

		document.location.href= '<?php echo jf_monta_link($_GET, 'fpc');?>&fpc='+campo;
	});
</script>
	
