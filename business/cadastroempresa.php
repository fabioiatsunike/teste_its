<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php 
	 $cnpj = $_POST['cnpj'];
	 $razao = $_POST['razao'];
	 $uf = $_POST['uf'];

	 $db = open_database();

	 if ($db) {
	 	$select = $db->query("SELECT * FROM empresa WHERE cnpj = '$cnpj'");

	 	if($select->num_rows >0)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Já existe uma empresa cadastrada com esse CNPJ');window.location.href='../view/cadastroempresa.php';</script>";
			die();
		}
		else 
		{
			$query = "INSERT INTO empresa (cnpj,razao,uf) VALUES ('$cnpj','$razao','$uf')";
			$insert =$db->query($query);
			if($insert)
			{
				echo"<script language='javascript' type='text/javascript'>alert('Empresa cadastrada com sucesso!');window.location.href='../view/cadastroempresa.php'</script>";			
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa empresa');window.location.href='../view/cadastroempresa.php'</script>";
			}
		}
	 }

?>