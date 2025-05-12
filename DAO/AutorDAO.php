<?php

    namespace App\DAO;
    use App\Model\Autor;

/**
 * Classe AutorDAO
 * Responsável pelo acesso e manipulação dos dados da entidade Autor no banco de dados.
 */

    final class AutorDAO extends DAO
    {

    /**
     * Construtor da classe AutorDAO
     * Inicializa a conexão com o banco de dados.
     */

        public function __construct()
        {
            parent::__construct();
        }

        /**
        * Salva um Autor no banco de dados.
        * Se o ID for nulo, insere um novo registro, caso contrário, atualiza o existente.
        *
        * @param Autor $model Objeto Aluno a ser salvo.
        * @return Autor Retorna o objeto Aluno atualizado.
        */

        public function save (Autor $model) : Autor
        {
            return($model->Id == null) ? $this->insert($model) :
            $this->update($model);
        }

        /**
        * Insere um novo Autor no banco de dados.
        *
        * @param Autor $model Objeto Autor a ser inserido.
        * @return Autor Retorna o objeto Autor com o ID atribuído.
        */

        public function insert(Autor $model): Autor
        {
            $sql = "INSERT INTO autor (nome, data_nasc, cpf) VALUES (?, ?, ?) ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->Data_Nasc);
            $stmt->bindValue(3, $model->CPF);
            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

         /**
        * Atualiza os dados de um autor existente no banco de dados.
        *
        * @param Autor $model Objeto Autor a ser atualizado.
        * @return Autor Retorna o objeto Autor atualizado.
        */

        public function update(Autor $model): Autor
        {
            $sql = "UPDATE autor SET nome?, data_nasc?, cpf? WHERE id=?";

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->Data_Nasc);
            $stmt->bindValue(3, $model->CPF);
            $stmt->bindValue(4, $model->Id);
            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        /**
        * Busca um autor no banco de dados pelo ID.
        *
        * @param int $id ID do Autor a ser buscado.
        * @return ?Autor Retorna o objeto Autor ou null se não encontrado.
        */

        public function selectById(int $id) : ?Autor
        {
            $sql = "SELECT * FROM autor WHERE id=?";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("App\Model\Autor");
        }

        /**
         * Método que retorna todos os registros da tabela autor no banco de dados
         */

         public function select() : array
         {
            $sql = "SELECT * FROM autor";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            // Retorna um array com as linhas retornadas da consulta. Observe que o
            // array é um array de objetos. Os objetos são do tipo stdClass e
            // foram criados automaticamente pelo método fetchAll do PDO.
            return $stmt->fetchAll(DAO::FETCH_CLASS, "All\Model\Autor");
         }

         /**Remove um registro da tabela pessoa do banco de dados.
          * Note que o método exige um parâmetro $id do tipo inteiro.
          */
          public function delete(int $id) : bool
          {
            $sql = "DELETE FROM autor WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
            
          }
       
    }
