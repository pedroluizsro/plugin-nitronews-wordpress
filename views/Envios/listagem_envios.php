<h1>Listas</h1>
<table border="1">
    <tr>
        <td>#ID</td>
        <td>Assunto</td>
        <td>Status</td>
    </tr>
    <?php foreach ($envios as $envio) { ?>
        <tr data-id="<?= $envio->id ?>">
            <td><?= $envio->codigo ?></td>
            <td><?= $envio->mensagem->assunto ?></td>
            <td>
                <?= $envio->status ?>
                <?php if($envio->status == "Agendado"){ ?>
                    <br>
                    (<?= date("d/m/Y H:i",strtotime($envio->data_de_inicio)) ?>)
                <?php } elseif ($envio->status == "Enviando") {?>
                    <br>
                    (<?= explode(".",$envio->porcentagem_de_conclusao)[0] ?>%)
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>