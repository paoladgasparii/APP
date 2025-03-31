<?php

namespace App\Controller;

use App\Model\Aluno;
use Exception;

/**
 * Classe AlunoController
 * Responsável por controlar as operações relacionadas aos alunos.
 */

final class AlunoController extends Controller
{

    /**
     * Método responsável por listar todos os alunos.
     * Chama a função de busca no modelo e renderiza a lista.
     *
     * @return void
     */

    public static function index() : void 
    {
        parent::isProtected();

        $model = new Aluno();

        try{
            $model->getAllRows();
        }catch(Exception $e)
        {
            $model->setError("Ocorreu um erro ao buscar os alunos:");
            $model->setError($e->getMessage());
        }

        parent::render('Aluno/lista_aluno.php', $model);
    }

    /**
     * Método responsável por cadastrar ou editar um aluno.
     * Verifica se a requisição é do tipo POST para salvar os dados.
     * Caso contrário, verifica se há um ID para edição.
     *
     * @return void
     */
    
    public static function cadastro() : void 
    {
        parent::isProtected();

        $model = new Aluno();

        try
        {
            if(parent::isPost())
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model->RA = $_POST['ra'];
                $model->Curso = $_POST['curso'];
                $model->save();

                parent::redirect("/aluno");
            }else{

                if(isset($_GET['id']))
                {
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }
        } catch(Exception $e) {
            $model->setError($e->getMessage());
        }

        parent::render('Aluno/form_aluno.php', $model);
    }
}
