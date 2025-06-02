<?php

namespace App\Controller;

use App\Model\Categoria;
use Exception;

/**
 * Classe CategoriaController
 * Responsável por controlar as operações relacionadas aos autores.
 */

final class CategoriaController extends Controller
{

    /**
     * Método responsável por listar todas as categorias.
     * Chama a função de busca no modelo e renderiza a lista.
     *
     * @return void
     */

    public static function index(): void
    {
        parent::isProtected();

        $model = new Categoria();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Ocorreu um erro ao buscar a categoria:");
            $model->setError($e->getMessage());
        }

        parent::render('Autor/lista_categoria.php', $model);
    }

    /**
     * Método responsável por cadastrar ou editar uma categoria.
     * Verifica se a requisição é do tipo POST para salvar os dados.
     * Caso contrário, verifica se há um ID para edição.
     *
     * @return void
     */

    public static function cadastro(): void
    {
        parent::isProtected();

        $model = new Categoria();

        try {
            if (parent::isPost()) {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Descricao = $_POST['descricao'];

                $model->save();

                parent::redirect("/categoria");
            } else {

                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('Categoria/form_categoria.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();

        $model = new Autor();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/categoria");
        } catch (Exception $e) {
            $model->setError("Ocorreu um erro ao excluir a categoria:");
            $model->setError($e->getMessage());
        }

        parent::render('Categoria/lista_categoria.php', $model);
    }
} // Fim da classe
