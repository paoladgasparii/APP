<?php

namespace App\Model;

use App\DAO\CategoriaDAO;
use Exception;

/**
 * Classe Categoria
 * Representa a entidade Categoria no sistema e contém métodos para manipulação de dados.
 */
final class Categoria extends Model
{
    /** @var int|null ID da Categoria */
    public ?int $id = null;

    /** @var string|null Descrição da Categoria */
    public ?string $Descricao {
        set {
            if (strlen($value) < 3)
                throw new Exception("Descrição deve ter no mínimo 3 caracteres.");

            $this->Descricao = $value;
        }

        get => $this->Descricao ?? null;
    }

    /**
     * Salva o Categoria no banco de dados.
     *
     * @return Categoria Retorna o objeto Categoria salvo.
     */
    function save(): Categoria
    {
        return new CategoriaDAO()->save($this);
    }

    /**
     * Busca um Categoria pelo ID.
     *
     * @param int $id ID do Categoria a ser buscado.
     * @return ?Categoria Retorna o objeto Categoria ou null se não encontrado.
     */
    function getById(int $id): ?Categoria
    {
        return new CategoriaDAO()->selectById($id);
    }

    /**
     * Retorna todas as linhas da tabela Categoria.
     *
     * @return array Lista de Categorias.
     */
    function getAllRows(): array
    {
        $this->rows = new CategoriaDAO()->select();

        return $this->rows;
    }

    /**
     * Exclui uma Categoria pelo ID.
     *
     * @param int $id ID da Categoria a ser excluído.
     * @return bool Retorna verdadeiro se a exclusão for bem-sucedida.
     */
    function delete(int $id): bool
    {
        return new CategoriaDAO()->delete($id);
    }
}
