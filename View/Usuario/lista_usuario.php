<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <div>
        <?php include VIEWS . '/Include/menu.php' ?>
        <h1>Lista de Usuários</h1>
        <a href="/aluno/cadastro">Novo Usuário</a>
        <?= $model->getErrors() ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->rows as $usuario): ?>
                    <tr>
                        <td> <?= $aluno->Id ?> </td>
                        <td> <a href="/usuario/cadastro?id=<?= $usuario->Id ?>">
                            <?= $aluno->Nome ?> </a></td>
                        <td> <?= $aluno->Email ?> </td>   
                        <td> <a href="/usuario/delete?id=<? $usuario->Id ?>">Remover</a></td> 
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

  </body>
</html>