<?php


ob_start();
session_start();

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$action = $postData['action'] ?? 'no-parametrized';
unset($postData['action']);

if (!empty($postData['formSerialize'])) {
    parse_str($postData['formSerialize'], $postData);
}

switch ($action) {
    case 'data-user':
        if (empty($postData['nome'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, digite o seu nome completo!';
            break;
        }
        if (empty($postData['sexo'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Você não selecionou a opção sexo!';
            break;
        }
        if (empty($postData['nascimento'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, digite a sua data de nascimento!';
            break;
        }

        $_SESSION['wizard']['nome'] = $postData['nome'];
        $_SESSION['wizard']['sexo'] = $postData['sexo'];
        $_SESSION['wizard']['nascimento'] = $postData['nascimento'];

        $json['success'] = true;
        break;

    case 'data-about':
        if (empty($postData['nacionalidade'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, digite sua nacionalidade';
            break;
        }
        if (empty($postData['estado_civil'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, selecione o seu estado civil!';
            break;
        }
        if (empty($postData['profissao'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, digite a sua profissão!';
            break;
        }

        $_SESSION['wizard']['nacionalidade'] = $postData['nacionalidade'];
        $_SESSION['wizard']['estado_civil'] = $postData['estado_civil'];
        $_SESSION['wizard']['profissao'] = $postData['profissao'];
        $json['success'] = true;
        break;

    case 'data-documents':
        if (empty($postData['cpf'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o seu CPF!';
            break;
        }

        function validaCPF($cpf)
        {
            // Extrai somente os números
            $cpf = preg_replace('/[^0-9]/is', '', $cpf);
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return false;
            }
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
            return true;
        }

        if (validaCPF($postData['cpf']) == false) {
            $json['error'] = true;
            $json['errorMessage'] = 'CPF inválido, por favor, tente novamente!';
            break;
        }
        if (empty($postData['numero_rg'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o número do seu documento de identificação!';
            break;
        }
        if (empty($postData['expedidor_rg'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o órgão expedidor do seu documento de identificação!<br>Ex.: SSP, SESPDGPC, CCRESS, etc.';
            break;
        }
        if (empty($postData['uf_expedidor'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, selecione o Estado de expedição de seu documento de identificação.';
            break;
        }


        if (empty($postData['expedicao_rg'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, digite a data de expedição do seu documento de identificação!';
            break;
        }

        $_SESSION['wizard']['cpf'] = $postData['cpf'];
        $_SESSION['wizard']['numero_rg'] = $postData['numero_rg'];
        $_SESSION['wizard']['expedidor_rg'] = $postData['expedidor_rg'];
        $_SESSION['wizard']['expedicao_rg'] = $postData['expedicao_rg'];
        $json['success'] = true;
        break;


    case 'data-address':
        if (empty($postData['cep'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o seu CEP!';
            break;
        }
        if (empty($postData['logradouro'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, a rua, avenida, travessa, etc. de sua domicílio!';
            break;
        }
        if (empty($postData['numero'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o número do seu domicílio!';
            break;
        }
        if (empty($postData['bairro'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o seu bairro!';
            break;
        }
        if (empty($postData['cidade'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe a sua cidade!';
            break;
        }
        if (empty($postData['uf'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o seu Estado!';
            break;
        }

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
        if (empty($postData['email'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o seu melhor e-mail!';
            break;
        }
        if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe um e-mail válido!';
            break;
        }

        if (empty($postData['telefone'])) {
            $json['error'] = true;
            $json['errorMessage'] = 'Por favor, informe o seu telefone!';
            break;
        }


        $_SESSION['wizard']['email'] = $postData['email'];
        $_SESSION['wizard']['telefone'] = $postData['telefone'];

        $json['redirect'] = 'http://localhost/form-wizard/prospeccao/main.php';
        $json['finish'] = true;
        break;

    default:
        $json['error'] = true;
        $json['errorMessage'] = 'Ação não parametrizada!';
        break;
}

echo json_encode($json);

ob_end_flush();
