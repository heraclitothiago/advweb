<?php

use CRUD\Create;

ob_start();
session_start();

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$action = $postData['action'] ?? 'no-parametrized';
unset($postData['action']);

if (!empty($postData['formSerialize'])) {
    parse_str($postData['formSerialize'], $postData);
}

require_once __DIR__ . '/config.php';

$read = new \CRUD\Read;


switch ($action) {
    case 'data-user':
        $_SESSION['wizard']['nome'] = $postData['nome'];
        $_SESSION['wizard']['sexo'] = $postData['sexo'];
        $_SESSION['wizard']['nascimento'] = $postData['nascimento'];

        $json['success'] = true;
        break;

    case 'data-about':
        $_SESSION['wizard']['nacionalidade'] = $postData['nacionalidade'];
        $_SESSION['wizard']['estado_civil'] = $postData['estado_civil'];
        $_SESSION['wizard']['profissao'] = $postData['profissao'];

        $json['success'] = true;
        break;

    case 'data-documents':
        $_SESSION['wizard']['cpf'] = $postData[''];
        $_SESSION['wizard']['numero_rg'] = $postData[''];
        $_SESSION['wizard']['expedidor_rg'] = $postData[''];
        $_SESSION['wizard']['expedicao_rg'] = $postData[''];

        $json['success'] = true;
        break;

    case 'data-address':
        $_SESSION['wizard']['cep'] = $postData['cep'];
        $_SESSION['wizard']['logradouro'] = $postData['logradouro'];
        $_SESSION['wizard']['numero'] = $postData['numero'];
        $_SESSION['wizard']['complemento'] = $postData['complemento'];
        $_SESSION['wizard']['bairro'] = $postData['bairro'];
        $_SESSION['wizard']['cidade'] = $postData['cidade'];
        $_SESSION['wizard']['uf'] = $postData['uf'];

        $json['success'] = true;
        break;

    case 'data-contact':

        $clienteCreate = [
            'nome' => $_SESSION['wizard']['nome'],
            'nascimento' => $_SESSION['wizard']['nascimento'],
            'sexo' => $_SESSION['wizard']['sexo'],
            'nacionalidade' => $_SESSION['wizard']['nacionalidade'],
            'estado_civil' => $_SESSION['wizard']['estado_civil'],
            'profissao' => $_SESSION['wizard']['profissao'],
            'cpf' => $_SESSION['wizard']['cpf'],
            'email' => $postData['email']
        ];

        $enderecoCreate = [
            'cep' => $_SESSION['wizard']['cep'],
            'logradouro' => $_SESSION['wizard']['logradouro'],
            'numero' => $_SESSION['wizard']['numero'],
            'complemento' => $_SESSION['wizard']['complemento'],
            'bairro' => $_SESSION['wizard']['bairro'],
            'cidade' => $_SESSION['wizard']['cidade'],
            'uf' => $_SESSION['wizard']['uf']
        ];

        $rgCreate = [
            'numero_rg' => $_SESSION['wizard']['numero_rg'],
            'expedidor_rg' => $_SESSION['wizard']['expedidor_rg'],
            'expedicao_rg' => $_SESSION['wizard']['expedicao_rg']
        ];

        $contatosCreate = [
            'telefone' => $postData['telefone']
        ];

        $create = new \CRUD\Create;
        $create->create('cliente', $clienteCreate);
        $create->create('contatos', $contatosCreate);
        $create->create('endereco', $enderecoCreate);
        $create->create('rg', $rgCreate);

        $json['redirect'] = 'https://localhost/play/form-wizard/main.php';
        $json['finish'] = true;
        break;

    default:
        $json['error'] = true;
        $json['errorMessage'] = 'Ação não parametrizada!';
        break;
}

echo json_encode($json);

ob_end_flush();
