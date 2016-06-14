<h1>Listas</h1>
<table border="1">
    <thead>
        <td>Lista</td>
        <td>Ativa</td>
        <td>Ações</td>
    </thead>
    <?php foreach ($listas as $lista) { ?>
        <tr>
            <td><?= $lista->nome ?></td>
            <td data-id="<?= $lista->id ?>" class="<?= $lista->ativo ? "desativar-lista" : "ativar-lista" ?>"><?= $lista->ativo ? "Y" : "N" ?></td>
            <td></td>
        </tr>
    <?php } ?>
</table>