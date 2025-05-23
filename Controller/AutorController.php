<?php

namespace App\Controller;

use App\Model\Autor;
use Exception;

/**
 * Classe AutorController
 * Responsável por controlar as operações relacionadas aos autores.
 */

final class AutorController extends Controller
{

    /**
     * Método responsável por listar todos os autores.
     * Chama a função de busca no modelo e renderiza a lista.
     *
     * @return void
     */

    public static function index(): void
    {
        parent::isProtected();

        $model = new Autor();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Ocorreu um erro ao buscar o autor:");
            $model->setError($e->getMessage());
        }

        parent::render('Autor/lista_autor.php', $model);
    }

    /**
     * Método responsável por cadastrar ou editar um autor.
     * Verifica se a requisição é do tipo POST para salvar os dados.
     * Caso contrário, verifica se há um ID para edição.
     *
     * @return void
     */

    public static function cadastro(): void
    {
        parent::isProtected();

        $model = new Aluno();

        try {
            if (parent::isPost()) {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model->Data_Nasc = $_POST['data_nasc'];
                $model->CPF = $_POST['cpf'];
                $model->save();

                parent::redirect("/autor");
            } else {

                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('Autor/form_autor.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();

        $model = new Autor();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/autor");
        } catch (Exception $e) {
            $model->setError("Ocorreu um erro ao excluir o autor:");
            $model->setError($e->getMessage());
        }

        parent::render('Autor/lista_autor.php', $model);
    }
} // Fom da classe
