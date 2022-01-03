<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php 
	 $cpf_cnpj = $_POST['cpf_cnpj'];
	 $empresa = $_POST['empresa'];
	 $nome = $_POST['nome'];
	 $cnpj_num = $_POST['cnpj_num'];
	 $cpf_num = $_POST['cpf_num'];
	 $rg = $_POST['rg'];
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
	 	$select = $db->query("SELECT * FROM empresa WHERE cnpj = '$empresa'");

	 	if($select->num_rows >0){
			$found = array();
    		while ($row = $select->fetch_assoc()) {
      			array_push($found, $row);
      		}
      		$uf_empresa = $found[0]['uf'];
      		echo $uf_empresa;
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('A empresa selecionada não está cadastrada!');window.location.href='../view/cadastrocliente.php';</script>";
			die();
		}	
   	 }

   	 if($uf_empresa == 'PR'){

		$ano_atual = date('Y');
		$mes_atual = date('m');
		$dia_atual = date('d');

		$ano = date('Y', strtotime($data_nasc));
		$mes = date('m', strtotime($data_nasc));
		$dia = date('d', strtotime($data_nasc));

	 	if($mes_atual >= $mes){
	 		if($dia_atual >= $dia){
	 	 		$aux = 0;
	 	 	}
	 	}else{
	 		$aux = 1;
	 	}
  	 	
  	 	$idade_cliente = $ano_atual - $ano - $aux;

  	 	if($idade_cliente < 18){
  	 		echo"<script language='javascript' type='text/javascript'>alert('Clientes cadastrados para essa empresa devem ter no mínimo 18 anos!');window.location.href='../view/cadastrocliente.php';</script>";
			die();
  	 	}  	 	
   	 }

	 if ($db) {
	 	$select = $db->query("SELECT * FROM cliente WHERE cpf_cnpj = '$cpf_cnpj_num'");

	 	if($select->num_rows >0)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Esse cliente já está cadastrado!');window.location.href='../view/cadastrocliente.php';</script>";
			die();
		}
		else 
		{
			$query = "INSERT INTO cliente (cpf_cnpj, empresa, nome, rg, data_nasc, email, cep, cidade, uf, rua, numero) VALUES ('$cpf_cnpj_num','$empresa','$nome','$rg','$data_nasc','$email','$cep','$cidade','$uf','$rua','$numero')";
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
