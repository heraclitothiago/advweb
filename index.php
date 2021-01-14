<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulário de Prospecção</title>
</head>

<body>
    <div class="container">
        <div class="error alert alert-danger" style="display: none;"></div>
        <!-- Nome completo, sexo, data de nascimento -->
        <div class="data-user form-steep">
            <form action="" method="post" class="form-wizard" autocomplete="off" data-action="data-user">
                <div class="mb-3">
                    <label for="nome">Digite seu nome completo</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="mb-3">
                    <label for="sexo">Qual o seu sexo?</label>
                    <select class="form-select" id="sexo" name="sexo">
                        <option selected>Selecione uma opção</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="genderless">Prefiro não informar...</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nascimento">Qual a sua data de nascimento?</label>
                    <input type="date" class="form-control" name="nascimento" id="nascimento">
                </div>
                <button class="btn btn-success" data-step="data-about">&raquo; Avançar</button>
            </form>
        </div>

        <!-- Nacionalidade, Estado Civil, profissão -->
        <div class="data-about form-steep" style="display: none;">
            <form action="" method="post" class="form-wizard" autocomplete="off" data-action="data-about">
                <div class="mb-3">
                    <label for="nacionalidade">Qual a sua nacionalidade?</label>
                    <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" value="brasileiro">
                </div>
                <div class="mb-3">
                    <label for="estado_civil">Qual o seu estado civil?</label>
                    <select class="form-select" id="estado_civil" name="estado_civil">
                        <option selected>Selecione uma opção</option>
                        <option value="solteiro">Solteiro(a)</option>
                        <option value="casado">Casado(a)</option>
                        <option value="uniao">Em união estável</option>
                        <option value="separado">Separado(a)</option>
                        <option value="divorciado">Divorciado(a)</option>
                        <option value="viuvo">Viúvo(a)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="profissao">Qual a sua profissão?</label>
                    <input type="text" class="form-control" name="profissao" id="profissao">
                </div>

                <div class="row justify-content-between">
                    <div class="col-4">
                        <a class="btn btn-warning" data-step="data-user">Voltar</a>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success" data-step="data-documents">Avançar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Documentos Pessoais -->
        <div class="data-documents form-steep" style="display: none;">
            <form action="" method="post" class="form-wizard" autocomplete="off" data-action="data-documents">
                <h1>Agora vamos coletar algumas informações referentes aos seus documentos pessoais</h1>
                <p>Não se preocupe, todos os seus dados não são compartilhados com ninguém</p>
                <div class="mb-3">
                    <label for="cpf">Digite seu CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf">
                </div>
                <div class="row">
                    <div class="col">
                        <label for="numero_rg">Digite seu número de RG</label>
                        <input type="text" class="form-control" name="numero_rg" id="numero_rg">
                    </div>
                    <div class="col">
                        <label for="expedidor_rg">Qual o órgão expedidor?</label>
                        <input type="text" class="form-control" name="expedidor_rg" id="expedidor_rg">
                    </div>
                    <div class="col">
                        <label for="expedicao_rg">Data de Expedição</label>
                        <input type="date" class="form-control" name="expedicao_rg" id="expedicao_rg">
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-4">
                        <button class="btn btn-warning" data-step="data-about">Voltar</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success" data-step="data-address">Avançar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Endereço -->
        <div class="data-address form-steep" style="display: none;">
            <form action="" method="post" class="form-wizard" autocomplete="off" data-action="data-address">
                <label for="cep">Digite o seu CEP</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="cep" id="cep">
                    <button class="btn btn-outline-warning" type="button" id="button-addon1">Pesquisar</button>
                </div>
                <div class="find-address">
                    <div class="mb-3">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control" name="numero" id="numero">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="mb-3">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" name="complemento" id="complemento">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro">
                    </div>
                    <div class="mb-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade">
                    </div>
                    <div class="mb-3">
                        <label for="uf">Estado</label>
                        <input type="text" class="form-control" name="uf" id="uf">
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-4">
                        <button class="btn btn-warning" data-step="data-documents">Voltar</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success" data-step="data-contact">Avançar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Dados de Contato -->
        <div class="data-contact form-steep" style="display: none;">
            <form action="" method="post" class="form-wizard" autocomplete="off" data-action="data-contact">
                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr colspan="3">
                            <td>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control no-border" name="email" id="email" placeholder="exemplo@email.com">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mb-3 row">
                                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control no-border" name="telefone[]" id="telefone" placeholder="(00) 00000-0000">
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align: middle;">
                                <ion-icon name="add-circle-outline"></ion-icon>
                            </td>
                            <td style="vertical-align: middle;">
                                <ion-icon name="remove-circle-outline"></ion-icon>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row justify-content-between">
                    <div class="col-4">
                        <button class="btn btn-warning" data-step="data-address">Voltar</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success">Finalizar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!-- Jquery -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>