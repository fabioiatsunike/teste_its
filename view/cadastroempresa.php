<?php require_once '../config.php'; ?>

<?php include(HEADER_TEMPLATE); ?>
<h1>Cadastro Empresa</h1>
<hr />
<form method="post" action="../business/cadastroempresa.php">
  <div class="form-group">
    <label for="cnpj">CNPJ</label>
    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ"> 
  </div>
  <div class="form-group">
    <label for="razao">Razão Social</label>
    <input type="text" class="form-control" id="razao" name="razao" placeholder="Razão Social">
  </div>
  <div class="form-group">
    <label for="uf">UF</label>
    <select class="form-control" id="uf" name="uf">
      <option>AC</option>
      <option>AL</option>
      <option>AM</option>
      <option>AP</option>
      <option>BA</option>
      <option>CE</option>
      <option>DF</option>
      <option>ES</option>
      <option>GO</option>
      <option>MA</option>
      <option>MG</option>
      <option>MS</option>
      <option>MT</option>
      <option>PA</option>
      <option>PB</option>
      <option>PE</option>
      <option>PI</option>
      <option>PR</option>
      <option>RJ</option>
      <option>RN</option>
      <option>RO</option>
      <option>RR</option>
      <option>RS</option>
      <option>SC</option>
      <option>SE</option>
      <option>SP</option>
      <option>TO</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <a a class="btn btn-primary" href="<?php echo BASEURL; ?>/index.php" role="button" aria-pressed="true">Voltar</a>
</form>	
<?php include(FOOTER_TEMPLATE); ?>