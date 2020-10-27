<?php
    session_start();
	// require_once "../inc/validarAutenticacao.inc.php";
	// require_once "../inc/validarPermissaoEdicao.inc.php";
	require_once "../../Business/BusinessPessoa.class.php";
	require_once "../../Business/BusinessDiscente.class.php";
	require_once "../../Business/BusinessDocente.class.php";
    require_once "../../Model/Pessoa.class.php";
    require_once "../../Model/Discente.class.php";
    require_once "../../Model/Docente.class.php";
    
	$itens['idPessoa'] = isset($_GET['id']) ? $_GET['id'] : $_POST['idPessoa'];
	$itens['nome'] = utf8_encode($_POST['nome']);
	$itens['cpf'] = $_POST['cdCPF'];
	$itens['rg'] = $_POST['cdRG'];
	$itens['email'] = $_POST['email'];
	$itens['celular'] = $_POST['celular'];
	$itens['cidade'] = utf8_encode($_POST['cidade']);
	$itens['estado'] = utf8_encode($_POST['estado']);
	$itens['cdCEP'] = $_POST['cdCEP'];
	$itens['login'] = $_POST['login'];
	$itens['senha'] = $_POST['senha'];
	$itens['perfil'] = $_POST['perfil'];
	$itens['matricula'] = $_POST['matricula'];
	$itens['campus'] = utf8_encode($_POST['campus']);
	$itens['curso'] = utf8_encode($_POST['curso']);
	$itens['cvLattes'] = $_POST['cvLattes'];
	$itens['matriculaSIAPE'] = utf8_encode($_POST['matriculaSIAPE']);
	$itens['campusSetor'] = utf8_encode($_POST['campusSetor']);
	$itens['cargo'] = utf8_encode($_POST['cargo']);

	$action = "show_cad";
	if (isset($_REQUEST[action])) {
		$action = $_REQUEST[action];
	}
	
	if (isset($_GET['perfil'])) {
		$itens['perfil'] = $_GET['perfil'] == "0" ? "A" : "P";
	}

	switch ($itens['perfil']) {
		case "A":
			$fileList = "../View/Pessoa/list_discente.php";
			$business = new BusinessDiscente();
			$model = new Discente($itens);
			break;
		case "P":
			$fileList = "../View/Pessoa/list_docente.php";
			$business = new BusinessDocente();
			$model = new Docente($itens);
			break;
		default:
			$fileList = "../View/Pessoa/list_pessoa.php";
			$business = new BusinessPessoa();
			$model = new Pessoa($itens);
	}
	
	switch($action)
	{
		case "list":
			$lista = $business->obterTodos();
			// var_dump($lista);
			include_once $fileList;
            break;
            
		case "del":
			if (isset($_GET['id']) && isset($_GET['perfil'])) {
				$model = $business->obter($_GET['id']);
				if ($model) {
					$res = $business->remover($model);
					if ($res) {
						$msg = " Deletado com sucesso!";
					}
				}
			}
			$model = new Pessoa($itens);
			$descricao = "Cadastrar";
			include_once "../View/Pessoa/form_pessoa.php";
            break;
            
		case "show_cad":
			$descricao = "Cadastrar";
			$acao = "cad";
			include_once "../View/Pessoa/form_pessoa.php";
			break;

        case "cad":
            $result = false;
			$msg = $business->verificaCampos($_POST);
            if ($msg == false) {
				$itens['senha'] = password_hash($itens['senha'], PASSWORD_DEFAULT);
                $result = $business->adicionar($model);
				$msg = " Informações cadastradas com sucesso!";
            }
			$descricao = "Cadastrar";
			$acao = "cad";
			include_once "../View/Pessoa/form_pessoa.php";
			break;

		case "show_edit":
			if (isset($_GET['id'])) {
				$descricao = "Atualizar";
				$acao = "edit";
				$model = $business->obter($_GET['id']);
			}
			$acao = "edit";
			include_once "../View/Pessoa/form_pessoa.php";
			break;

		case "edit":
			$result = false;
			$msg = $business->verificaCampos($_POST);
			if (!$msg) {
				$result = $business->atualizar($model);
				$msg = " Informações atualizadas com sucesso!";
			}
			$descricao = "Cadastrar";
			$acao = "cad";
			include_once "../View/Pessoa/form_pessoa.php";
			break;

		case "show_login":
			include_once "../View/Pessoa/login.php";
		break;

		case "logar":
			$result = $business->logar($model);
			var_dump($result); die;
			break;
	}

?>