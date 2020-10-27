<?php include_once "../View/header.php"; ?>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> <?= $descricao ?></h3>
            
            <?php if ($result): ?>
                <script>swal("", "<?= $msg ?>", "success");</script>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><i class="fa fa-check"></i></strong> <?= $msg ?>
                </div>
            <?php elseif (isset($result) && !$result): ?>
                <script>swal("Campos Obrigatórios!", "Preencha os campos obrigatórios", "error");</script>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Preencha todos os Campos Obrigatórios!</strong> <br /> <?= implode("<br />", $msg) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="../Controller/Edital.php" class="form-horizontal style-form">
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Editais</h4>
                            <h5 class="mb">* Campos para consulta </h5>
                            <input type="hidden" name="idEdital" value="<?= !empty($model) ? $model->getIdEdital() : "" ?>" class="form-control" >
                            <div class="form-group">
                                <label for="numero" class="col-sm-2 col-sm-2 control-label">* Número do Edital</label>
                                <div class="col-sm-4">
                                    <input type="text" name="numero" id="numero" value="<?= !empty($model) ? $model->getNumero() : "" ?>" class="form-control" >
                                </div>
                                <label for="nomePrograma" class="col-sm-2 col-sm-2 control-label">* Nome do Programa</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nomePrograma" id="nomePrograma" value="<?= !empty($model) ? utf8_encode($model->getNomePrograma()) : "" ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipoProponente" class="col-sm-2 col-sm-2 control-label">* Tipo Proponente</label> 
                                <div class="col-sm-4">
                                    <select name="tipoProponente" id="tipoProponente" class="form-control" >
                                        <option value="">Selecione Tipo Proponente</option>
                                        <option value="1" <?= !empty($model) && $model->getTipoProponente() == "1" ? "selected" : "" ?> >Docente</option>
                                        <option value="2" <?= !empty($model) && $model->getTipoProponente() == "2" ? "selected" : "" ?> >Técnico Administrativo</option>
                                        <option value="3" <?= !empty($model) && $model->getTipoProponente() == "3" ? "selected" : "" ?> >Docente e Técnico Administrativo</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-sm-2 control-label">* Tem Bolsa? </label>
                                <div class="col-sm-1">
                                    <input type="radio" name="bolsaOrientador" id="sim" value="S" <?= !empty($model) && $model->getBolsaOrientador() == "S" ? "checked" : "" ?> >
                                    <label for="sim" class="control-label"> Sim</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="radio" name="bolsaOrientador" id="nao" value="N" <?= !empty($model) && $model->getBolsaOrientador() == "N" ? "checked" : "" ?> >
                                    <label for="nao" class="control-label"> Não</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <button type="submit" name="action" value="<?= $acao ?>" class="btn btn-theme03" onclick="valida_formEdital()">
                                        <i class="fa fa-check"></i> Salvar
                                    </button>
                                    <button type="submit" name="action" value="list" class="btn btn-theme">
                                        <i class="fa fa-search"></i> Consultar
                                    </button>
                                    <button type="reset" class="btn btn-default">
                                        <i class="fa fa-refresh"></i> Limpar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </form>
		</section>
    </section>

<?php include_once "../View/footer.php"; ?>