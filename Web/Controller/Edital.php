<?php
    session_start();
	// require_once '../inc/validarAutenticacao.inc.php';
	// require_once '../inc/validarPermissaoEdicao.inc.php';
	require_once '../../Business/BusinessEdital.class.php';
    require_once '../../Model/Edital.class.php';
    
	$action = 'show_cad';
	if (isset($_REQUEST['action']))
        $action = $_REQUEST['action'];
    
	$businessEdital = new BusinessEdital();

	$itens['idEdital'] = isset($_GET['id']) ? $_GET['id'] : $_POST['idEdital'];
	$itens['numero'] = utf8_encode($_POST['numero']);
	$itens['nomePrograma'] = utf8_encode($_POST['nomePrograma']);
	$itens['tipoProponente'] = utf8_encode($_POST['tipoProponente']);
	$itens['bolsaOrientador'] = utf8_encode($_POST['bolsaOrientador']);
	$model = new Edital($itens);

	switch($action)
	{
		case "list":
			$lista = $businessEdital->obterTodos();
			$descricao = 'Lista de Editais';
			include_once '../View/Edital/list_edital.php';
            break;
            
		case "del":
			if (isset($_GET[id]))
			{
				$result = $businessEdital->remover($model);
				$msg = " Deletado com sucesso!";
			}
			include_once '../View/Edital/form_edital.php';
            break;
            
		case "show_cad":
			$descricao = 'Cadastrar';
			$acao = 'cad';
			include_once '../View/Edital/form_edital.php';
			break;

		case "cad":
			$result = false;
			$msg = $business->verificaCampos($_POST);
			if ($msg == false) {
				$result = $businessEdital->adicionar($model);
				$msg = " Informações cadastradas com sucesso!";
			} 
			$descricao = 'Cadastrar';
			$acao = 'cad';
			include_once '../View/Edital/form_edital.php';
			break;

		case "show_edit":
			if (isset($_GET['id'])) {
				$descricao = 'Atualizar';
				$acao = 'edit';
				$model = $businessEdital->obter($_GET['id']);
			}
			$descricao = 'Cadastrar';
			$acao = 'edit';
			include_once '../View/Edital/form_edital.php';
			break;

		case "edit":
			$result = false;
			if ($verificar_campos) {
				$result = $businessEdital->atualizar($model);
				$msg = " Informações atualizadas com sucesso!";
			} 
			$descricao = 'Cadastrar';
			$acao = 'cad';
			include_once '../View/Edital/form_edital.php';
			break;
	}

?>