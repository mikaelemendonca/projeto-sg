<?php include_once "../View/header.php"; ?>

    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Editais</h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nome do Programa</th>
                                    <th>Tipo Proponente</th>
                                    <th>Tem Bolsa?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($lista as $edital): ?>
                                <tr>
                                    <td><?= $edital->getNumero(); ?></td>
                                    <td><?= $edital->getNomePrograma(); ?></td>
                                    <td><?= $edital->getTipoProponente(); ?></td>
                                    <td><?= $edital->getBolsaOrientador(); ?></td>
                                    <td>
                                        <a href="Edital.php?id=<?php echo $edital->getIdEdital(); ?>&action=show_edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="Edital.php?id=<?php echo $edital->getIdEdital(); ?>&action=del" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></a>
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