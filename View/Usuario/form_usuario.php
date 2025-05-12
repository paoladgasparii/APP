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

            <h1>Cadastro de Usuário</h1>

            <?= $model->getErrors() ?>

            <form method="post" action="/usuario/cadastro" class="p-5">

                <input name="id" type="hidden" value="<?= $model->Id ?>" />

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" value="<?= $model->Nome ?>"
                    class="form-control" name="nome" id="nome">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" value="<?= $model->Email ?>"
                    class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" value="<?= $model->Senha ?>"
                    class="form-control" name="senha" id="senha">
                </div>
            </form>

            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>