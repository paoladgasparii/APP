<?php

    namespace App\DAO;
    use App\Model\Categoria;

/**
 * Classe CategoriaDAO
 * Responsável pelo acesso e manipulação dos dados da entidade Autor no banco de dados.
 */

    final class CategoriaDAO extends DAO
    {

    /**
     * Construtor da classe CategoriaDAO
     * Inicializa a conexão com o banco de dados.
     */

        public function __construct()
        {
            parent::__construct();
        }

        /**
        * Salva uma Categoria no banco de dados.
        * Se o ID for nulo, insere um novo registro, caso contrário, atualiza o existente.
        *
        * @param Categoria $model Objeto Categoria a ser salvo.
        * @return Categoria Retorna o objeto Categoria atualizado.
        */

        public function save (Categoria $model) : Categoria
        {
            return($model->Id == null) ? $this->insert($model) :
            $this->update($model);
        }

        /**
        * Insere uma nova Categoria no banco de dados.
        *
        * @param Categoria $model Objeto Categoria a ser inserido.
        * @return Categoria Retorna o objeto Categoria com o ID atribuído.
        */

        public function insert(Categoria $model): Categoria
        {
            $sql = "INSERT INTO categoria (descricao) VALUES (?) ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Descricao);

            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

         /**
        * Atualiza os dados de uma Categoria existente no banco de dados.
        *
        * @param Categoria $model Objeto Categoria a ser atualizado.
        * @return Categoria Retorna o objeto Categoria atualizado.
        */

        public function update(Categoria $model): Categoria
        {
            $sql = "UPDATE categoria SET descricao? WHERE id=?";

            $stmt->bindValue(1, $model->Descricao);

            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        /**
        * Busca um autor no banco de dados pelo ID.
        *
        * @param int $id ID do Categoria a ser buscado.
        * @return ?Categoria Retorna o objeto Categoria ou null se não encontrado.
        */

        public function selectById(int $id) : ?Categoria
        {
            $sql = "SELECT * FROM categoria WHERE id=?";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("App\Model\Categoria");
        }

        /**
         * Método que retorna todos os registros da tabela Categoria no banco de dados
         */

         public function select() : array
         {
            $sql = "SELECT * FROM Categoria";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            // Retorna um array com as linhas retornadas da consulta. Observe que o
            // array é um array de objetos. Os objetos são do tipo stdClass e
            // foram criados automaticamente pelo método fetchAll do PDO.
            return $stmt->fetchAll(DAO::FETCH_CLASS, "All\Model\Categoria");
         }

         /**Remove um registro da tabela pessoa do banco de dados.
          * Note que o método exige um parâmetro $id do tipo inteiro.
          */
          public function delete(int $id) : bool
          {
            $sql = "DELETE FROM categoria WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
            
          }
       
    }
