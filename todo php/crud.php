<?php
    include_once "conexao.php";

    //listar no banco de dados
    if (isset($_POST['list'])) {
        $tarefa = filter_input(INPUT_POST, 'list', FILTER_SANITIZE_STRING);
        $prioridade = filter_input(INPUT_POST, 'priority', FILTER_SANITIZE_STRING);
        $query = "INSERT INTO tarefas (tasks, priority) VALUES (:tasks, :priority)";
        $stm = $conexao->prepare($query);
        $stm->bindParam('tasks', $tarefa);
        $stm->bindParam('priority', $prioridade);
        $stm->execute();

        header('Location: http://localhost/estagio/index.php');
    }

    //deletar no banco de dados
    if (isset($_GET['delete'])) {
      $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
      $query = "DELETE FROM tarefas WHERE id=:id";
      $stm = $conexao->prepare($query);
      $stm->bindParam('id', $id);
      $stm->execute();

      header('Location: http://localhost/estagio/index.php');
    }

    if (isset($_GET['done'])) {
        $id = filter_input(INPUT_GET, 'done', FILTER_SANITIZE_NUMBER_INT);
        $query = "UPDATE tarefas SET done=1 WHERE id=:id";
        $stm = $conexao->prepare($query);
        $stm->bindParam('id', $id);
        $stm->execute();
        
        header('Location: http://localhost/estagio/index.php');
    }

    if (isset($_GET['undone'])) {
        $id = filter_input(INPUT_GET, 'undone', FILTER_SANITIZE_NUMBER_INT);
        $query = "UPDATE tarefas SET done=0 WHERE id=:id";
        $stm = $conexao->prepare($query);
        $stm->bindParam('id', $id);
        $stm->execute();
        
        header('Location: http://localhost/estagio/index.php');
    }