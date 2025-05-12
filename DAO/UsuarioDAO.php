<?php

    namespace App\DAO;
    use App\Model\Usuario;

/**
 * Classe UsuarioDAO
 * Responsável pelo acesso e manipulação dos dados da entidade Usuario no banco de dados.
 */

    final class UsuarioDAO extends DAO
    {

    /**
     * Construtor da classe UsuarioDAO
     * Inicializa a conexão com o banco de dados.
     */

        public function __construct()
        {
            parent::__construct();
        }

        /**
        * Salva um usuário no banco de dados.
        * Se o ID for nulo, insere um novo registro, caso contrário, atualiza o existente.
        *
        * @param Usuario $model Objeto Aluno a ser salvo.
        * @return Usuario Retorna o objeto Aluno atualizado.
        */

        public function save (Usuario $model) : Usuario
        {
            return($model->Id == null) ? $this->insert($model) :
            $this->update($model);
        }

        /**
        * Insere um novo usuário no banco de dados.
        *
        * @param Usuario $model Objeto Usuário a ser inserido.
        * @return Usuario Retorna o objeto Usuário com o ID atribuído.
        */

        public function insert(Usuario $model): Usuario
        {
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?) ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->Email);
            $stmt->bindValue(3, $model->Senha);
            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

         /**
        * Atualiza os dados de um usuário existente no banco de dados.
        *
        * @param Usuario $model Objeto Usuário a ser atualizado.
        * @return Usuario Retorna o objeto Usuário atualizado.
        */

        public function update(Usuario $model): Usuario
        {
            $sql = "UPDATE aluno SET nome?, email?, senha? WHERE id=?";

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->Email);
            $stmt->bindValue(3, $model->Senha);
            $stmt->bindValue(4, $model->Id);
            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        /**
        * Busca um usuário no banco de dados pelo ID.
        *
        * @param int $id ID do aluno a ser buscado.
        * @return ?Usuario Retorna o objeto Usuário ou null se não encontrado.
        */

        public function selectById(int $id) : ?Usuario
        {
            $sql = "SELECT * FROM usuario WHERE id=?";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("App\Model\Usuario");
        }

        /**
         * Método que retorna todos os registros da tabela pessoa no banco de dados
         */

         public function select() : array
         {
            $sql = "SELECT * FROM usuario";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            // Retorna um array com as linhas retornadas da consulta. Observe que o
            // array é um array de objetos. Os objetos são do tipo stdClass e
            // foram criados automaticamente pelo método fetchAll do PDO.
            return $stmt->fetchAll(DAO::FETCH_CLASS, "All\Model\Usuario");
         }

         /**Remove um registro da tabela usuário do banco de dados.
          * Note que o método exige um parâmetro $id do tipo inteiro.
          */
          public function delete(int $id) : bool
          {
            $sql = "DELETE FROM usuario WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
            
          }
       
    }
