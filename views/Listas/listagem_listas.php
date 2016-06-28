<style>
    table#listas {
        width: 500px;
        border: 1px solid gray;
    }
    table#listas thead {
        background-color: lightgray;
    }
    table#listas td {
        border: 1px solid gray;
    }
</style>
<h1>Listas</h1>
<table id="listas" class="listas" data-url="<?= $actionCriarLista ?>">
    <thead>
        <td>Lista</td>
        <td>Status</td>
    </thead>
    <?php foreach ($listas as $lista) { ?>
        <tr>
            <td><?= $lista->nome ?></td>
            <td style="text-align: center;">
                <button type="button" data-id="<?= $lista->id ?>" class="<?= $lista->ativo ? "desativar-lista" : "ativar-lista" ?>">
                    <?= $lista->ativo ? "Desativar" : "Ativar" ?>
                </button>
            </td>
        </tr>
    <?php } ?>
</table>