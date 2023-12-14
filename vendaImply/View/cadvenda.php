<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./Controller/cadastraVenda.js"></script>

    <script>
      
    //Validações da própria documentação do viaCep - https://viacep.com.br/exemplo/javascript/ - START
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    //Validações da própria documentação do viaCep - https://viacep.com.br/exemplo/javascript/ - END
    </script>
</head>
<body>

  <div class="d-flex justify-content-center mt-2">
    <h4 class="display-7">Cadastro de Vendas</h4>
  </div>
  <form id="formCadastro">
    <div class="form-group">
      <label for="produto">Produto:</label>
      <select multiple class="form-control" name="produto" id="produto" aria-describedby="produto">
        <option value="1">Escada 5 metros aço puro</option>
        <option value="2">Tinta branca acetinada</option>
        <option value="3">Parafuso 12mm para Painel de LED</option>
        <option value="4">Pino de boliche customizado</option>
        <option value="5">EPI completo Marcenaria</option>
      </select>
    </div>
    <div class="form-group">
      <label for="quantidade">Quantidade:</label>
      <input type="number" name="quantidade" class="form-control" id="quantidade" value="1">
    </div>
    <div class="form-group">
      <label for="preco">Preço:</label>
      <input type="number" name="preco" class="form-control" id="preco" placeholder="Casa decimal separado por '.'">
    </div>
    <div class="form-group">
      <label for="fornecedor">Fornecedor:</label>
      <select multiple class="form-control" name="fornecedor" id="fornecedor" aria-describedby="fornecedor">
        <option value="1">Atacadão Santinha</option>
        <option value="2">Funilaria Godoy</option>
        <option value="3">Marcenaria do Joel</option>
        <option value="4">Globo Materiais Eletricos</option>
        <option value="5">Santa Tornearia</option>
      </select>
    </div>
    <div class="form-group">
      <label for="data">Data:</label>
      <input type="date" name="data" class="form-control" id="data">
    </div>
    <div class="form-group">
      <label for="cep">CEP:</label>
      <input type="number" name="cep" class="form-control" id="cep" placeholder="Somente números, sem separador" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);">
    </div>
    <div class="form-group">
      <label for="uf">UF:</label>
      <input type="text" name="uf" class="form-control" id="uf" placeholder="Ex: RS">
    </div>
    <div class="form-group">
      <label for="cidade">Cidade:</label>
      <input type="text" name="cidade" class="form-control" id="cidade">
    </div>
    <div class="form-group">
      <label for="bairro">Bairro:</label>
      <input type="text" name="bairro" class="form-control" id="bairro">
    </div>
    <div class="form-group">
      <label for="rua">Rua:</label>
      <input type="text" name="rua" class="form-control" id="rua">
    </div>
    <div class="form-group">
      <label for="numero">Numero:</label>
      <input type="number" name="numero" class="form-control" id="numero" placeholder="Numero do complemento/casa">
    </div>
    
    <button type="button" name="submit" class="btn btn-outline-success" id="submit">Salvar</button>

  </form>

</body>
</html>