$(document).ready(function () {
  $('#submit').click(function () {

      //resgata os valores do formulario
      var produto = $('#produto').val();
      var quantidade = $('#quantidade').val();
      var preco = $('#preco').val();
      var fornecedor = $('#fornecedor').val();
      var data = $('#data').val();
      var cep = $('#cep').val();
      var uf = $('#uf').val();
      var cidade = $('#cidade').val();
      var bairro = $('#bairro').val();
      var rua = $('#rua').val();
      var numero = $('#numero').val();

      //valida se todos os campos foram preenchidos, se não, não inicia o cadastro
      if (!produto || !quantidade || !preco || !fornecedor || !data || !cep || !uf || !cidade || !bairro || !rua || !numero) {
          alert('Por favor, preencha todos os campos do formulário.');
          return;
      }

      //monta o objeto
      var dadosFormulario = {
          produto: produto,
          quantidade: quantidade,
          preco: preco,
          fornecedor: fornecedor,
          data: data,
          cep: cep,
          uf: uf,
          cidade: cidade,
          bairro: bairro,
          rua: rua,
          numero: numero
      };

      //envia o objeto para o controller
      $.ajax({
          type: 'POST',
          url: './Controller/insereVenda.php',
          data: dadosFormulario,
          success: function (response) {
              
              console.log('Resposta do servidor:', response); 
              alert("Cadastro efetuado com sucesso!");
              //window.location.href = "http://localhost/vendaImply";
              
          },
          error: function (error) {
              console.error('Erro ao enviar dados:', error);
          }
      });
  });
});