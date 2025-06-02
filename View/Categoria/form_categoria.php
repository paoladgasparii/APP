<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>

  <body>

        <div>
            <?php include VIEWS . '/Include/menu.php' ?>

            <h1>Cadastro de Categorias</h1>

            <?= $model->getErrors() ?>

            <form method="post" action="/categoria/cadastro" class="p-5">

                <input name="id" type="hidden" value="<?= $model->Id ?>" />

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" value="<?= $model->Descricao ?>"
                    class="form-control" name="descricao" id="descricao">
                </div>
            </form>

            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>