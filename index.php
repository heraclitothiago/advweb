<!doctype html>
<html lang="pt-br">

<head>
    <title>Pré-Briefing - Adicionar Cliente e Processos</title>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<div class="container cliente">
    <form method="post" action="result.php">
        <div class="form-group row" id="divName">
            <label for="name" class="col-sm-3 col-form-label">Nome</label>
            <div class="col-sm-9">
                <input type="text" class="form-control  form-control-sm" name="name" id="name">
            </div>
        </div>
        <div class="dados">
            <div class="form-group row">
                <label for="nome_caso" class="col-sm-3 col-form-label">Nome da Ação</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="nome_caso" id="nome_caso">
                </div>
            </div>
            <div class="form-group row">
                <label for="sessao_tabela_oab" class="col-sm-3 col-form-label">Tabela OAB</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="sessao_tabela_oab"
                           id="sessao_tabela_oab">
                </div>
            </div>
            <div class="form-group row">
                <label for="valor_minimo" class="col-sm-3 col-form-label">Valor Mínimo</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="valor_minimo" id="valor_minimo"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="entrada" class="col-sm-3 col-form-label">Entrada de Honorários</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="entrada" id="entrada">
                </div>
            </div>
            <div class="form-group row">
                <label for="numero_recorrencias" class="col-sm-3 col-form-label">Quantidade de Recorrências</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="numero_recorrencias"
                           id="numero_recorrencias">
                </div>
            </div>
            <div class="form-group row">
                <label for="valor_recorrencias" class="col-sm-3 col-form-label">Valor Recorrências</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="valor_recorrencias"
                           id="valor_recorrencias">
                </div>
            </div>
            <div class="form-group row">
                <label for="porcentagem_honorarios" class="col-sm-3 col-form-label">Porcentagem Honorários</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  form-control-sm" name="porcentagem_honorarios"
                           id="porcentagem_honorarios" value="0.3"
                    >
                </div>
            </div>
        </div>
        <div class="container"></div>

        <div class="checkbox-list">
            <button type="button" id="check" class="btn btn-light btn-sm">Marcar Tudo</button>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="procuracao" id="procuracao" checked>
                <label class="form-check-label" for="procuracao">Procuração</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="contrato" id="contrato" checked>
                <label class="form-check-label" for="contrato">Contrato de Honorários Advocatícios</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="hipossuficiencia" id="hipossuficiencia">
                <label class="form-check-label" for="hipossuficiencia">Declaração de Hipossuficiência</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="lgpd" id="lgpd" checked>
                <label class="form-check-label" for="lgpd">Termo Consentimento LGPD</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="procuracao_previdenciaria"
                       id="procuracao_previdenciaria">
                <label class="form-check-label" for="procuracao_previdenciaria">Termo Representação
                    Previdenciária</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="pedido-seguro-dpvat"
                       id="pedido-seguro-dpvat">
                <label class="form-check-label" for="procuracao_previdenciaria">Formulário DPVAT</label>
            </div>
        </div>
<input type="text" name="resultadoGeral" id="resultadoGeral">
        <div class="btn-group">
            <a href="#adicionar_servico" id="adicionar_servico" class="btn btn-secondary">Adiconar Serviço</a>
            <a href="#remove_servico" id="remove_servico" class="btn btn-danger">Remover Serviço</a>
            <button type="submit" class="btn btn-success">ENVIAR</button>
        </div>

    </form>
</div>

<table class="table table-sm table-bordered">
    <caption></caption>
    <thead>
    <tr>
        <th style="text-align: center; width: 3%;">#</th>
        <th>Nome da Ação</th>
        <th>Ref. Serviço OAB</th>
        <th>Valor Mínimo</th>
        <th>Entrada</th>
        <th>Recorrências</th>
        <th>Valor Recorrências</th>
        <th>Porcentagem Honorarios</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
</body>

</html>
