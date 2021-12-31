<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<h1>ITS</h1>
<hr />

<?php if ($db) : ?>

<div class="row">
	<div class="col-md-4">
		<a href="./view/cadastroempresa.php" class="btn btn-primary">
			<div class="row">
				<div class="col-md-4 text-center">
					<i class="fa fa-plus fa-5x"></i>
				</div>
				<div class="col-xs-6 text-center">
					<p>Nova empresa</p>
				</div>
			</div>
		</a>
	</div>

<div class="col-md-4">
		<a href="./view/cadastrocliente.php" class="btn btn-primary">
			<div class="row">
				<div class="col-md-4 text-center">
					<i class="fa fa-plus fa-5x"></i>
				</div>
				<div class="col-xs-6 text-center">
					<p>Novo Cliente</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-md-4">
		<a href="./view/listarclientes.php" class="btn btn-primary">
			<div class="row">
				<div class="col-md-6 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				<div class="col-xs-6 text-center">
					<p>Clientes</p>
				</div>
			</div>
		</a>
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>