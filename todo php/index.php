<?php
include_once("crud.php");

//Pegando os valores do banco de dados
$query = "SELECT * FROM tarefas";
$lista = $conexao->query($query)->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <div class="register-list">
            <h1 class="title">LISTA DE TAREFAS</h1>
            <form method="POST" onsubmit="return validaForm(this)">
                <input type="text" id="input" name="list" placeholder="digite sua tarefa..." />
                <select id="select" name="priority">
                    <option value="">SELECIONE</option>
                    <option value="Baixa">BAIXA</option>
                    <option value="Media">MEDIA</option>
                    <option value="Alta">ALTA</option>
                </select>
                <input id="enviar" type="submit" value="LISTAR" />
            </form>
        </div>
        <?php if($lista):  ?>
        <div class="list">
            <table>
                <thead>
                    <tr >
                        <th class="cor-th">TAREFA</th>
                        <th class="cor-th">PRIORIDADE</th>
                        <th class="cor-th"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $item) : ?>
                    <?php if($item['priority'] == 'Alta'): ?>
                    <tr>
                        <td class="cor-alta" <?= $item['done']?'id="table-td-concluido"':''?>>
                            <?= $item['tasks']  ?>
                        </td>
                        <td class="cor-alta" <?= $item['done']?'id="table-td-concluido"':''?>>
                            <?= $item['priority'] ?>
                        </td>
                        <td class="cor-alta">
                            <?php if (!$item['done']): ?>
                            <a class="cor-alta" href="?done=<?= $item['id'] ?>">
                                <i class="fa-solid fa-check cor-alta"></i>
                            </a>
                            <?php else: ?>
                            <a class="cor-alta" href="?undone=<?= $item['id'] ?>">
                                <i class="fa-solid fa-check cor-alta"></i>
                            </a>
                            <?php endif; ?>
                            <a class="cor-alta" href="?delete=<?= $item['id'] ?>"><i
                                    class="fa-solid fa-trash-can cor-alta "></i></a>
                        </td>
                    </tr>
                    <?php elseif($item['priority'] == 'Media'): ?>
                        <tr>
                            <td class="cor-media" <?= $item['done']?'id="table-td-concluido"':''?>>
                                <?= $item['tasks']  ?>
                            </td>
                            <td class="cor-media" <?= $item['done']?'id="table-td-concluido"':''?>>
                                <?= $item['priority'] ?>
                            </td>
                            <td class="cor-media">
                                <?php if (!$item['done']): ?>
                                <a class="cor-media" href="?done=<?= $item['id'] ?>">
                                    <i class="fa-solid fa-check cor-media"></i>
                                </a>
                                <?php else: ?>
                                <a class="cor-media" href="?undone=<?= $item['id'] ?>">
                                    <i class="fa-solid fa-check cor-media"></i>
                                </a>
                                <?php endif; ?>
                                <a class="cor-media" href="?delete=<?= $item['id'] ?>"><i
                                        class="fa-solid fa-trash-can cor-media "></i></a>
                            </td>
                        </tr>
                        <?php else: ?>
                            <tr>
                            <td class="cor-baixa" <?= $item['done']?'id="table-td-concluido"':''?>>
                                <?= $item['tasks']  ?>
                            </td>
                            <td class="cor-baixa" <?= $item['done']?'id="table-td-concluido"':''?>>
                                <?= $item['priority'] ?>
                            </td>
                            <td class="cor-baixa">
                                <?php if (!$item['done']): ?>
                                <a class="cor-baixa" href="?done=<?= $item['id'] ?>">
                                    <i class="fa-solid fa-check cor-baixa"></i>
                                </a>
                                <?php else: ?>
                                <a class="cor-baixa" href="?undone=<?= $item['id'] ?>">
                                    <i class="fa-solid fa-check cor-baixa"></i>
                                </a>
                                <?php endif; ?>
                                <a class="cor-baixa" href="?delete=<?= $item['id'] ?>"><i
                                        class="fa-solid fa-trash-can cor-baixa "></i></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <input type="button" value="IMPRIMIR" class="btn-imprimir" onClick="window.print()" />
        <?php endif; ?>
    </main>
</body>
<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/ebe487a6b2.js" crossorigin="anonymous"></script>

</html>