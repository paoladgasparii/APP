<?php

    namespace App\DAO;
    use App\Model\Aluno;

/**
 * Classe AlunoDAO
 * Responsável pelo acesso e manipulação dos dados da entidade Aluno no banco de dados.
 */

    final class AlunoDAO extends DAO
    {

    /**
     * Construtor da classe AlunoDAO
     * Inicializa a conexão com o banco de dados.
     */

        public function __construct()
        {
            parent::__construct();
        }

        /**
        * Salva um aluno no banco de dados.
        * Se o ID for nulo, insere um novo registro, caso contrário, atualiza o existente.
        *
        * @param Aluno $model Objeto Aluno a ser salvo.
        * @return Aluno Retorna o objeto Aluno atualizado.
        */

        public function save (Aluno $model) : Aluno
        {
            return($model->Id == null) ? $this->insert($model) :
            $this->update($model);
        }

        /**
        * Insere um novo aluno no banco de dados.
        *
        * @param Aluno $model Objeto Aluno a ser inserido.
        * @return Aluno Retorna o objeto Aluno com o ID atribuído.
        */

        public function insert(Aluno $model): Aluno
        {
            $sql = "INSERT INTO aluno (nome, ra, curso) VALUES (?, ?, ?) ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->RA);
            $stmt->bindValue(3, $model->Curso);
            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

         /**
        * Atualiza os dados de um aluno existente no banco de dados.
        *
        * @param Aluno $model Objeto Aluno a ser atualizado.
        * @return Aluno Retorna o objeto Aluno atualizado.
        */

        public function update(Aluno $model): Aluno
        {
            $sql = "UPDATE aluno SET nome?, ra?, curso? WHERE id=?";

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->RA);
            $stmt->bindValue(3, $model->Curso);
            $stmt->bindValue(4, $model->Id);
            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        /**
        * Busca um aluno no banco de dados pelo ID.
        *
        * @param int $id ID do aluno a ser buscado.
        * @return ?Aluno Retorna o objeto Aluno ou null se não encontrado.
        */

        public function selectById(int $id) : ?Aluno
        {
            $sql = "SELECT * FROM aluno WHERE id=?";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->RA);
            $stmt->bindValue(3, $model->Curso);           
            $stmt->execute();

            return $model;
        }

       
    }
