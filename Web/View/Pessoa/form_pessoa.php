
<?php include_once "../View/header.php"; ?>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> <?= $descricao ?></h3>

            <?php $esconde = $model->getPerfil() ? "" : "esconde";  ?>

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

            <form method="POST" action="../Controller/Pessoa.php" class="form-horizontal style-form">
                <div class="row mt">
                    <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pessoais</h4>
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nome" id="nome" value="<?= !empty($model) ? utf8_encode($model->getNome()) : "" ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cdCPF" class="col-sm-2 col-sm-2 control-label">CPF</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cdCPF" id="cdCPF" value="<?= !empty($model) ? $model->getCPF() : "" ?>" class="form-control">
                                </div>
                                <label for="cdRG" class="col-sm-2 col-sm-2 control-label">RG</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cdRG" id="cdRG" value="<?= !empty($model) ? $model->getRG() : "" ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular" class="col-sm-2 col-sm-2 control-label">Celular</label>
                                <div class="col-sm-4">
                                    <input type="text" name="celular" id="celular" value="<?= !empty($model) ? $model->getCelular() : "" ?>" class="form-control">
                                </div>
                                <label for="email" class="col-sm-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="text" name="email" id="email" value="<?= !empty($model) ? $model->getEmail() : "" ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="col-sm-2 col-sm-2 control-label">Estado</label>
                                <div class="col-sm-4">
                                    <select name="estado" id="estado" class="form-control">
                                        <option>Selecione Estado</option>
                                    </select>
                                </div>
                                <label for="cidade" class="col-sm-2 col-sm-2 control-label">Cidade</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cidade" id="cidade" value="<?= !empty($model) ? utf8_encode($model->getCidade()) : "" ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bairro" class="col-sm-2 col-sm-2 control-label">Bairro</label>
                                <div class="col-sm-4">
                                    <input type="text" name="bairro" id="bairro" value="<?= !empty($model) ? utf8_encode($model->getBairro()) : "" ?>" class="form-control">
                                </div>
                                <label for="cdCEP" class="col-sm-2 col-sm-2 control-label">CEP</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cdCEP" id="cdCEP" value="<?= !empty($model) ? $model->getCEP() : "" ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="endereco" class="col-sm-2 col-sm-2 control-label">Endereço</label>
                                <div class="col-sm-10">
                                    <input type="text" name="endereco" id="endereco" value="<?= !empty($model) ? utf8_encode($model->getEndereco()) : "" ?>" class="form-control">
                                </div>
                            </div>
                                                 
                        </div>
                    </div>     	
                </div>

          	    <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Login</h4>
                            <div class="form-group">
                                <label for="login" class="col-sm-1 col-sm-1 control-label">Login</label>
                                <div class="col-sm-3">
                                    <input type="text" name="login" id="login" value="<?= !empty($model) ? $model->getLogin() : "" ?>" class="form-control">
                                </div>
                                <label for="senha" class="col-sm-1 col-sm-1 control-label">Senha</label>
                                <div class="col-sm-3">
                                    <input type="password" name="senha" id="senha"  class="form-control">
                                </div>
                                <label for="confSenha" class="col-sm-1 col-sm-1 control-label">Confirmar Senha</label>
                                <div class="col-sm-3">
                                    <input type="password" name="confSenha" id="confSenha" class="form-control">
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

          	    <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Específicos</h4>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <input type="radio" name="perfil" id="discente" <?= (empty($model) || $model->getPerfil() == "A") ? "checked" : "" ?> value="A" onclick="$('#div-discente').show();$('#div-docente').hide();" >
                                </div>
                                <label for="discente" class="col-sm-1 col-sm-1 control-label"> Discente</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="perfil" id="docente" <?= !empty($model) && $model->getPerfil() == "P" ? "checked" : "" ?> value="P" onclick="$('#div-discente').hide();$('#div-docente').show();" >
                                </div>
                                <label for="docente" class="col-sm-1 col-sm-1 control-label"> Docente</label>
                            </div>
                            <div class=<?= $model->getPerfil() == "P" ? "esconde" : $esconde ?> id="div-discente">
                                <div class="form-group">
                                    <label for="matricula" class="col-sm-1 col-sm-1 control-label">Matricula</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="matricula" id="matricula" value="<?= !empty($model) && $model->getPerfil() == "A" ? $model->getMatricula() : "" ?>" class="form-control">
                                    </div>
                                    <label for="campus" class="col-sm-1 col-sm-1 control-label">Campus</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="campus" id="campus" value="<?= !empty($model) && $model->getPerfil() == "A" ? utf8_encode($model->getCampus()) : "" ?>" class="form-control">
                                    </div>
                                    <label for="curso" class="col-sm-1 col-sm-1 control-label">Curso</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="curso" id="curso" value="<?= !empty($model) && $model->getPerfil() == "A" ? utf8_encode($model->getCurso()) : "" ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cvLattes" class="col-sm-2 col-sm-2 control-label">Link do Curriculo Lattes</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cvLattes" id="cvLattes" value="<?= !empty($model) && $model->getPerfil() == "A" ? $model->getCvLattes() : "" ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class=<?= $model->getPerfil() == "A" ? "esconde" : $esconde ?> id="div-docente">
                                <div class="form-group">
                                    <label for="matriculaSIAPE" class="col-sm-1 col-sm-1 control-label">Matricula SIAPE</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="matriculaSIAPE" id="matriculaSIAPE" value="<?= !empty($model) && $model->getPerfil() == "P" ? $model->getMatriculaSIAPE() : "" ?>" class="form-control">
                                    </div>
                                    <label for="campusSetor" class="col-sm-1 col-sm-1 control-label">Campus / Setor</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="campusSetor" id="campusSetor" value="<?= !empty($model) && $model->getPerfil() == "P" ? utf8_encode($model->getCampusSetor()) : "" ?>" class="form-control">
                                    </div>
                                    <label for="cargo" class="col-sm-1 col-sm-1 control-label">Cargo</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="cargo" id="cargo" value="<?= !empty($model) && $model->getPerfil() == "P" ? utf8_encode($model->getCargo()) : "" ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <button type="submit" name="action" value="<?= $acao ?>" class="btn btn-theme03">
                                        <i class="fa fa-check"></i> Salvar
                                    </button>
                                    <button type="submit" name="action" value="list" class="btn btn-theme">
                                        <i class="fa fa-search"></i> Consultar
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