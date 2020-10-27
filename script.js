$(document).ready(function () {
    $("#adicionar_servico").click(function () {
        var nomeAcao = $("#nome_caso").val(),
            sessaoTabelaOab = $("#sessao_tabela_oab").val(),
            minOab = $("#valor_minimo").val(),
            entrada = $("#entrada").val(),
            rec = $("#numero_recorrencias").val(),
            recVal = $("#valor_recorrencias").val(),
            fee = $("#porcentagem_honorarios").val();


        var modal = '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
            '    <div class="modal-dialog">\n' +
            '        <div class="modal-content">\n' +
            '            <div class="modal-header">\n' +
            '                <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>\n' +
            '                <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
            '                    <span aria-hidden="true">&times;</span>\n' +
            '                </button>\n' +
            '            </div>\n' +
            '            <div class="modal-body">\n' +
            '                Por favor, preencha todos os campos do formulário.\n' +
            '            </div>\n' +
            '            <div class="modal-footer">\n' +
            '                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>';

        if (nomeAcao && sessaoTabelaOab && minOab && entrada && rec && recVal !== "") {

            var clientName = $("#name").val();
            $(".table caption").text(clientName == '' ? '' : "Processos de " + clientName);

            var markup = "<tr>" +
                "<td style='text-align: center'>" +
                "<input type='checkbox' name='record'>" +
                "</td><td>"
                + nomeAcao + "</td><td>"
                + sessaoTabelaOab + "</td><td>"
                + minOab + "</td><td>"
                + entrada + "</td><td>"
                + rec + "</td><td>"
                + recVal + "</td><td>"
                + fee + "</td>" +
                "</tr>";
            //Adiciona uma linha na tabela
            $(".table tbody").append(markup);          

            $("#divName").css("display", "none");
            $("#nome_caso").val("");
            $("#sessao_tabela_oab").val("");
            $("#valor_minimo").val("");
            $("#entrada").val("");
            $("#numero_recorrencias").val("");
            $("#valor_recorrencias").val("");
        } else {
            $(modal).modal();
        }


        //deleta linhas da tabela
        $("#remove_servico").click(function () {
            $("table tbody").find('input[name="record"]').each(function () {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });

    });

    //Função para marcar e desmarcar checkboxs
    $('body').on('click', '#check', function () {
        if ($(this).hasClass('allChecked')) {
            $('input[type="checkbox"]', '.checkbox-list').prop('checked', false);
            $("#check").text("Marcar Tudo");
        } else {
            $('input[type="checkbox"]', '.checkbox-list').prop('checked', true);
            $("#check").text("Desmarcar Tudo");
        }
        $(this).toggleClass('allChecked');
    })
});
