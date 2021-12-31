<?php
    require_once('../business/getcliente.php');
    $clientes= get_clientes();
?>

<?php require_once '../config.php'; ?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Clientes</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="cadastrocliente.php"><i class="fa fa-plus"></i> Novo Cliente</a>
	    	<a class="btn btn-primary" href="listarclientes.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    	<a class="btn btn-primary" href="<?php echo BASEURL; ?>/index.php" role="button" aria-pressed="true">Voltar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>Empresa</th>
		<th>CPF/CNPJ</th>
		<th width="30%">Nome</th>
		<th>RG</th>
		<th>Data Nasc</th>
		<th>E-mail</th>
		<th>CEP</th>
		<th>Cidade</th>
		<th>UF</th>
		<th>Rua</th>
		<th>Nº</th>
	</tr>
</thead>
<tbody>
<?php if ($clientes) : ?>
<?php foreach ($clientes as $cliente) : ?>
	<tr>
		<td><?php echo $cliente['empresa']; ?></td>
		<td><?php echo $cliente['cpf_cnpj']; ?></td>
		<td><?php echo $cliente['nome']; ?></td>
		<td><?php echo $cliente['rg']; ?></td>
		<td><?php echo $cliente['data_nasc']; ?></td>
		<td><?php echo $cliente['email']; ?></td>
		<td><?php echo $cliente['cep']; ?></td>
		<td><?php echo $cliente['cidade']; ?></td>
		<td><?php echo $cliente['uf']; ?></td>
		<td><?php echo $cliente['rua']; ?></td>
		<td><?php echo $cliente['numero']; ?></td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>