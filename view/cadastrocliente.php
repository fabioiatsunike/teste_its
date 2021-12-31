<?php require_once '../config.php'; ?>
<?php require_once '../business/getempresa.php'; ?>
<?php require_once DBAPI; ?>
<?php
    require_once('../business/getempresa.php');
    $empresas = get_empresas();
?>

<?php include(HEADER_TEMPLATE); ?>
<h1>Cadastro Cliente</h1>
<hr />
<form method="post" action="../business/cadastrocliente.php">
  <div class="form-row">
      <label for="empresa">Empresa</label>

        <select class="form-control" id="empresa" name="empresa" required>
          
          <?php 
            foreach ($empresas as $empresa) {
              echo "<option value='".$empresa['cnpj']."'>".$empresa['cnpj']." - ".$empresa['razao']."</option>"; 
            }
          ?>
        </select>
  </div>
  
  <div class="form-check cpf_cnpj">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="cpf_cnpj" id="cpf" value="cpf">
      <label class="form-check-label" for="cpf">Pessoa Física</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="cpf_cnpj" id="cnpj" value="cnpj">
      <label class="form-check-label" for="cnpj">Pessoa Jurídica</label>
    </div>
  </div>

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome"  name="nome" placeholder="Digite seu nome">
  </div>

 <div class="form-group pessoa-juridica" style="display: none;">
    <label for="cnpj_num">CNPJ</label>
    <input type="text" class="form-control" id="cnpj_num"  name="cnpj_num" placeholder="Digite seu nome">
  </div>

  <div class="form-group pessoa-fisica" style="display: none;">
    <label for="cpf_num">CPF</label>
    <input type="text" class="form-control" id="cpf_num"  name="cpf_num" placeholder="Digite seu nome">
  </div>

  <div class="form-row pessoa-fisica" style="display: none;"s>
    <div class="col-md-2 mb-3">
      <label for="data">Data Nascimento</label>
      <input type="date" class="form-control" id="data"  name="data" placeholder="00/00/0000">
    </div>
  </div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" id="telefone"  name="telefone" placeholder="(99) 99999-9999 ">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Endereço de email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
  </div>

  <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" id="cep" placeholder="CEP" name="cep" onfocusout="busca_endereco()" required>
      <div class="invalid-feedback">
        Por favor, informe um CEP válido.
    </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
      <div class="invalid-feedback">
        Por favor, informe uma cidade válida.
      </div>
    </div>
    <div class="col-md-1 mb-3">
      <label for="uf">UF</label>
        <select class="form-control" id="uf" name="uf" required>
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
  </div>

  <div class="form-row">
    <div class="col-md-5 mb-3">
      <label for="rua">Endereço</label>
    <input type="text" class="form-control" id="rua"  name="rua">
    </div>
    <div class="col-md-1 mb-3">
      <label for="numero">Número</label>
      <input type="text" class="form-control" id="numero"  name="numero">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <a a class="btn btn-primary" href="<?php echo BASEURL; ?>/index.php" role="button" aria-pressed="true">Voltar</a>
</form>	

<script>
    function cpf_cnpj_select(event) {
        if (event.target.id === 'cpf') {
           $("div.pessoa-juridica").hide()
           $("div.pessoa-fisica").show()
        }else{
          $("div.pessoa-juridica").show()
           $("div.pessoa-fisica").hide()
        }
    }
    document.querySelectorAll("input[name='cpf_cnpj']").forEach((input) => {
        input.addEventListener('change', cpf_cnpj_select);
    });
    
    async function busca_endereco(){
      $cep = $("#cep").val();
      console.log({$cep});
      let url = 'https://viacep.com.br/ws/'+$cep+'/json/';
      let obj = await (await fetch(url)).json();

      $("#cidade").val(obj['localidade']);
      $("#uf").val(obj['uf']);
      $("#rua").val(obj['logradouro']);
      $("#numero").focus();
    }    
</script>


<?php include(FOOTER_TEMPLATE); ?>