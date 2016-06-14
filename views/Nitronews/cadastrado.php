<h1>Plugin Nitronews</h1>
<?php if($sucesso) { ?>
<strong>Chave cadastrada: <?= $chave ?></strong>
<?php } else { ?>
<strong>Chave inválida</strong>
<?php } ?>
<a href="<?= Utils::gerarUrl(array( 'nova' => 1)) ?>">Cadastrar novo</a>

