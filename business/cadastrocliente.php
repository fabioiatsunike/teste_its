<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php 
	 $cpf_cnpj = $_POST['cpf_cnpj'];
	 $empresa = $_POST['empresa'];
	 $nome = $_POST['nome'];
	 $cnpj_num = $_POST['cnpj_num'];
	 $cpf_num = $_POST['cpf_num'];
	 $data_nasc = $_POST['data'];
	 $telefone = $_POST['telefone'];
	 $email = $_POST['email'];
	 $cep = $_POST['cep'];
	 $cidade = $_POST['cidade'];
	 $uf = $_POST['uf'];
	 $rua = $_POST['rua'];
	 $numero = $_POST['numero'];

	 if ($cpf_cnpj == 'cnpj') {
	 	$cpf_cnpj_num = $cnpj_num;
	 }else{
	 	$cpf_cnpj_num = $cpf_num;
	 }

	 $db = open_database();

	 if ($db) {
	 	$select = $db->query("SELECT * FROM cliente WHERE cpf_cnpj = '$cpf_cnpj_num'");

	 	if($select->num_rows >0)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Esse cliente já está cadastrado!');window.location.href='../view/cadastrocliente.php';</script>";
			die();
		}
		else 
		{
			$query = "INSERT INTO cliente (cpf_cnpj, empresa, nome,data_nasc, email, cep, cidade, uf, rua, numero) VALUES ('$cpf_cnpj_num','$empresa','$nome','$data_nasc','$email','$cep','$cidade','$uf','$rua','$numero')";
			$insert =$db->query($query);
			if($insert)
			{
				echo"<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='../view/cadastrocliente.php'</script>";
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse cliente');window.location.href='../view/cadastrocliente.php'</script>";
			}
		}
	 }
?>
