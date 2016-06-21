<h1>Listas</h1>
<table border="1" id="listas" data-url="<?= $actionCriarLista ?>">
    <thead>
        <td>Lista</td>
        <td>Ativa</td>
        <td>Ações</td>
    </thead>
    <?php foreach ($listas as $lista) { ?>
        <tr>
            <td><?= $lista->nome ?></td>
            <td>
                <button type="button" data-id="<?= $lista->id ?>" class="<?= $lista->ativo ? "desativar-lista" : "ativar-lista" ?>">
                    <?= $lista->ativo ? "Y" : "N" ?>
                </button>
            </td>
            <td></td>
        </tr>
    <?php } ?>
</table>