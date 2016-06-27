<h1>Listas</h1>
<table border="1">
    <tr>
        <td>#ID</td>
        <td>Assunto</td>
        <td>Status</td>
        <td>Mensagem</td>
    </tr>
    <?php foreach ($envios as $envio) { ?>
        <tr data-id="<?= $envio->id ?>">
            <td><?= $envio->codigo ?></td>
            <td><?= $envio->mensagem->assunto ?></td>
            <td style="text-align: center;">
                <?= $envio->status ?>
                <?php if($envio->status == "Agendado"){ ?>
                    <br>
                    (<?= date("d/m/Y H:i",strtotime($envio->data_de_inicio)) ?>)
                <?php } elseif ($envio->status == "Enviando") {?>
                    <br>
                    (<?= explode(".",$envio->porcentagem_de_conclusao)[0] ?>%)
                    <a href="<?= $actionStatusEnvio ?>?acao=2&id=<?= $envio->id ?>">Pausar</a>
                <?php } elseif ($envio->status == "Suspenso") {?>
                    <br>
                    <a href="<?= $actionStatusEnvio ?>?acao=1&id=<?= $envio->id ?>">Iniciar</a>
                <?php } ?>
            </td>
            <td>
                <a target="_blank" href="<?= $actionVerMensagem ?>?id=<?= $envio->mensagem->id ?>">
                    Ver Mensagem
                </a>
            </td>
        </tr>
    <?php } ?>
</table>