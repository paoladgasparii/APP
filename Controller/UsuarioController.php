<?php

namespace App\Controller;

use App\Model\Usuario;
use Exception;

/**
 * Classe UsuarioController
 * Responsável por controlar as operações relacionadas aos usuários.
 */

final class UsuarioController extends Controller
{

    /**
     * Método responsável por listar todos os alunos.
     * Chama a função de busca no modelo e renderiza a lista.
     *
     * @return void
     */

    public static function index(): void
    {
        parent::isProtected();

        $model = new Usuario();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Ocorreu um erro ao buscar os usuários:");
            $model->setError($e->getMessage());
        }

        parent::render('Usuario/lista_usuario.php', $model);
    }

    /**
     * Método responsável por cadastrar ou editar um usuário.
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
                $model->Email = $_POST['email'];
                $model->Senha = $_POST['senha'];
                $model->save();

                parent::redirect("/usuario");
            } else {

                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('Usuario/form_usuario.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();

        $model = new Usuario();

        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/usuario");
        } catch (Exception $e) {
            $model->setError("Ocorreu um erro ao excluir o usuário:");
            $model->setError($e->getMessage());
        }

        parent::render('Usuario/lista_usuario.php', $model);
    }
} // Fom da classe
