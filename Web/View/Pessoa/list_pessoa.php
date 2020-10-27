<?php include_once "../View/header.php"; ?>

    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Pessoas</h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Perfil</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($lista as $pessoa): ?>
                                <tr>
                                    <td><?= utf8_encode($pessoa->getNome()); ?></td>
                                    <td><?= $pessoa->getCPF(); ?></td>
                                    <td><?= $pessoa->getEmail(); ?></td>
                                    <td><?= $pessoa->getPerfil() == "A" ? "Discente" : "Docente" ?></td>
                                    <?php $perfil = $pessoa->getPerfil() == "A" ? 0 : 1; ?>
                                    <td>
                                        <a href="?perfil=<?= $perfil; ?>&id=<?= $pessoa->getIdPessoa(); ?>&action=show_edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="?perfil=<?= $perfil; ?>&id=<?= $pessoa->getIdPessoa(); ?>&action=del" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>

<?php include_once "../View/footer.php"; ?> 