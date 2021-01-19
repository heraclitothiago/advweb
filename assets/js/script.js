$(function() {
    //Máscaras
    $('#cpf').mask('000.000.000-00', { reverse: false });
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 00000-0000');


    function step(button) {
        $('.form-step:visible').fadeOut(200, function() {
            $('.' + button.data('step')).fadeIn(200);
        });
    }

    $('html').on('submit', 'form.form-wizard', function(event) {
        event.preventDefault();

        var form = $(this);
        var formAction = form.data('action');
        var formSerialize = form.serialize();
        var formButton = form.find('button');

        $.post('controller.php', { action: formAction, formSerialize }, function(data) {

            if (data.error === true) {
                $('.error').html(data.errorMessage).fadeIn();
            } else {
                $('.error').html('').fadeOut();
            }

            if (data.success === true) {
                step(formButton);
            }

            if (data.finish === true) {
                window.location.href = data.redirect;
            }

        }, 'json');
    });

    $('html').on('click', 'a[data-step]', function(event) {
        event.preventDefault();
        step($(this));
    });

    /**
     * Busca CEP
     */
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro").val("...");
                $("#complemento").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouro").val(dados.logradouro);
                        $("#complemento").val(dados.complemento);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
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
    });

});