
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

            <form method="POST" action="../Controller/Projeto.php" class="form-horizontal style-form">
                <div class="row mt">
                    <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Projeto</h4>
                            <input type="hidden" name="idProjeto" value="<?= !empty($model) ? $model->getIdProjeto() : "" ?>" class="form-control" >
                            <div class="form-group">
                                <label for="idEdital" class="col-sm-2 col-sm-2 control-label">Número do Edital</label>
                                <div class="col-sm-4">
                                    <input type="text" name="idEdital" id="idEdital" class="form-control">
                                </div>
                                <label for="titulo" class="col-sm-2 col-sm-2 control-label">Título</label>
                                <div class="col-sm-4">
                                    <input type="text" name="titulo" id="titulo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="orientador" class="col-sm-2 col-sm-2 control-label">Orientador</label>
                                <div class="col-sm-4">
                                    <input type="text" name="orientador" id="orientador" class="form-control">
                                </div>
                                <label for="coOrientador" class="col-sm-2 col-sm-2 control-label">Co-Orientador</label>
                                <div class="col-sm-4">
                                    <input type="text" name="coOrientador" id="coOrientador" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bolsista" class="col-sm-2 col-sm-2 control-label">Bolsista</label>
                                <div class="col-sm-4">
                                    <input type="text" name="bolsista" id="bolsista" class="form-control">
                                </div>
                                <label class="col-sm-2 col-sm-2 control-label">Voluntário</label>
                                <div for="voluntario" class="col-sm-4">
                                    <div class="switch switch-square" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" id="voluntario" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="voluntarioI" class="col-sm-2 col-sm-2 control-label">Voluntário I</label>
                                <div class="col-sm-4">
                                    <input type="text" name="voluntarioI" id="voluntarioI" class="form-control">
                                </div>
                                <label for="voluntarioII" class="col-sm-2 col-sm-2 control-label">Voluntário II</label>
                                <div class="col-sm-4">
                                    <input type="text" name="voluntarioII" id="voluntarioII" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="resumo" class="col-sm-2 col-sm-2 control-label">Resumo</label>
                                <div class="col-sm-10">
                                    <textarea name="resumo" id="resumo" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="areaPesquisa" class="col-sm-2 col-sm-2 control-label">Área de Pesquisa</label>
                                <div class="col-sm-4">
                                    <select name="areaPesquisa" id="areaPesquisa" class="form-control">
                                        <option>Selecione Área de Pesquisa</option>
                                    </select>
                                </div>
                                <label for="subareaPesquisa" class="col-sm-2 col-sm-2 control-label">Subárea de Pesquisa</label>
                                <div class="col-sm-4">
                                    <select name="subareaPesquisa" id="subareaPesquisa" class="form-control">
                                        <option>Subárea de Pesquisa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cronograma" class="col-sm-2 col-sm-2 control-label">Cronograma de Execução</label>
                                <div class="col-sm-10">
                                    <textarea name="cronograma" id="cronograma" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publicacoes" class="col-sm-2 col-sm-2 control-label">Publicações</label>
                                <div class="col-sm-10">
                                    <textarea name="publicacoes" id="publicacoes" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="infoAdicionais" class="col-sm-2 col-sm-2 control-label">Informações Adicionais</label>
                                <div class="col-sm-10">
                                    <textarea name="infoAdicionais" id="infoAdicionais" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="resultados" class="col-sm-2 col-sm-2 control-label">Resultados Obtidos</label>
                                <div class="col-sm-10">
                                    <textarea name="resultados" id="resultados" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Entrega do Relatório</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="statusRelatorio" id="final" value="P">
                                    <label for="final" class="control-label"> Final</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="radio" name="statusRelatorio" id="parcial" value="A">
                                    <label for="parcial" class="control-label"> Parcial</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="statusRelatorio" id="pendente" value="A">
                                    <label for="pendente" class="control-label"> Pendente</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="statusProjeto" id="vigente" value="A">
                                    <label for="vigente" class="control-label"> Vigente</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="statusProjeto" id="concluido" value="A">
                                    <label for="concluido" class="control-label"> Concluído</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <button type="submit" name="action" value="<?= $acao ?>" class="btn btn-theme03">
                                        <i class="fa fa-check"></i>Salvar
                                    </button>
                                    <button type="submit" name="action" value="list" class="btn btn-theme">
                                        <i class="fa fa-search"></i>Consultar
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