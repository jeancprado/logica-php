<?php
include_once "src/processamento.php";
include_once "src/conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>exercicio12</title>
</head>
<body>

<div class="coluna">

    <h2 class="titulo-coluna">Escada de Motivação</h2>

    <form method="POST" class="form-meta">
        <input
            type="text"
            name="goal"
            placeholder="Digite sua meta (ex: CRESCER)"
            required
        >
        <button type="submit">Gerar</button>
    </form>

    <?php if (!empty($escada)): ?>
        <div class="resultado">
            <?php foreach ($escada as $linha): ?>
                <div class="linha-escada"><?= $linha ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<div class="coluna">

            <h2>Histórico de Metas</h2>

            <div class="tabela-container">
                <?php if (empty($historico)): ?>
                    <p>Nenhuma meta registrada ainda.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Meta</th>
                                <th>Data e Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historico as $item): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['goal']) ?></td>
                                    <td>
                                        <?= date('d/m/Y H:i:s', strtotime($item['date_time'])) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </div>

    </div>
</div>


</body>
</html>