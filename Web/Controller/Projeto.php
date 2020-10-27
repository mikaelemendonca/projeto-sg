<?php
    session_start();
	// require_once '../inc/validarAutenticacao.inc.php';
	// require_once '../inc/validarPermissaoEdicao.inc.php';
	require_once '../../Business/BusinessProjeto.class.php';
    require_once '../../Model/Projeto.class.php';
    
	$action = 'show_cad';
	if(isset($_REQUEST[action]))
        $action = $_REQUEST[action];
    
	$business = new BusinessProjeto();

	$itens['idProjeto'] = isset($_GET[id]) ? $_GET[id] : $_POST['idProjeto'];
	$itens['idEdital'] = $_POST['idEdital'];
	$itens['titulo'] = utf8_encode($_POST['titulo']);
    $itens['orientador'] = $_POST['orientador'];
    $itens['coOrientador'] = $_POST['coOrientador'];
    $itens['bolsista'] = utf8_encode($_POST['bolsista']);
    $itens['voluntarioI'] = utf8_encode($_POST['voluntarioI']);
    $itens['voluntarioII'] = utf8_encode($_POST['voluntarioII']);
    $itens['resumo'] = utf8_encode($_POST['resumo']);
    $itens['areaPesquisa'] = $_POST['areaPesquisa'];
    $itens['subArea'] = $_POST['subArea'];
    $itens['cronogramaExec'] = utf8_encode($_POST['cronogramaExec']);
    $itens['publicacoes'] = utf8_encode($_POST['publicacoes']);
    $itens['infoAdd'] = utf8_encode($_POST['infoAdd']);
    $itens['resultados'] = utf8_encode($_POST['resultados']);
    $itens['statusRelatorio'] = utf8_encode($_POST['statusRelatorio']);
    $itens['statusProjeto'] = utf8_encode($_POST['statusProjeto']);
    $model = new Projeto($itens);

	switch($action) {
		case 'list':
			$lista = $business->obterTodos();
			$descricao = 'Lista de Projeto';
			include_once '../View/Projeto/list_projeto.php';
            break;
            
		case 'del':
			if(isset($_GET[id]))
			{
				$projeto = new Projeto($itens);
				$result = $business->remover($projeto);
				$msg = " Deletado com sucesso!";
			}
			include_once '../View/Projeto/form_projeto.php';
            break;
            
		case 'show_cad':
			$descricao = 'Cadastrar';
			$acao = 'cad';
			include_once '../View/Projeto/form_projeto.php';
			break;

		case 'cad':
            $result = false;
            $msg = $business->verificaCampos($_POST);
            if($msg == false) {
				$result = $business->adicionar($model);
				$msg = " Informações cadastradas com sucesso!";
            }
			$descricao = "Cadastrar";
			$acao = "cad";
			include_once '../View/Projeto/form_projeto.php';
			break;

		case 'show_edit':
			if(isset($_GET['id']))
			{
				$descricao = 'Atualizar';
				$acao = 'edit';
				$model = $business->obter($_GET['id']);
			}
			$descricao = 'Cadastrar';
			$acao = 'edit';
			include_once '../View/Projeto/form_projeto.php';
			break;

		case 'edit':
			if($verificar_campos)
			{
				$projeto = new Projeto($itens);
				$result = $business->atualizar($projeto);
				$msg = " Informações atualizadas com sucesso!";
			} else 
			{
				$result = false;
				$msg = " * Número do projeto \n * Nome do Programa \n * Tipo Proponente \n * Tem Bolsa? ";
			}
			$descricao = 'Cadastrar';
			$acao = 'cad';
			include_once '../View/Projeto/form_projeto.php';
			break;
	}

?>