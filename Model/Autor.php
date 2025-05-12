<?php

namespace App\Model;

use App\DAO\AutorDAO;
use Exception;

/**
 * Classe Autor
 * Representa a entidade Autor no sistema e contém métodos para manipulação de dados.
 */
final class Autor extends Model
{
    /** @var int|null ID do Autor */
    public ?int $id = null;

    /** @var string|null Nome do Autor */
    public ?string $Nome {
        set {
            if (strlen($value) < 3)
                throw new Exception("Nome deve ter no mínimo 3 caracteres.");

            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    /** @var string|null Data de nascimento do Autor */
    public ?string $Data_Nasc {
        set {
            if (empty($value))
                throw new Exception("Preencha a data de nascimento.");

            $this->Data_Nasc = $value;
        }

        get => $this->Data_Nasc ?? null;
    }

    /** @var string|null CPF do autor */
    public ?string $CPF {
        set {
            if (strlen($value) < 3)
                throw new Exception("CPF deve ter no mínimo 3 caracteres.");

            $this->CPF = $value;
        }

        get => $this->CPF ?? null;
    }

    /**
     * Salva o autor no banco de dados.
     *
     * @return Autor Retorna o objeto Autor salvo.
     */
    function save(): Autor
    {
        return new AutorDAO()->save($this);
    }

    /**
     * Busca um Autor pelo ID.
     *
     * @param int $id ID do Autor a ser buscado.
     * @return ?Autor Retorna o objeto Autor ou null se não encontrado.
     */
    function getById(int $id): ?Autor
    {
        return new AutorDAO()->selectById($id);
    }

    /**
     * Retorna todas as linhas da tabela Autor.
     *
     * @return array Lista de Autores.
     */
    function getAllRows(): array
    {
        $this->rows = new AutorDAO()->select();

        return $this->rows;
    }

    /**
     * Exclui um Autor pelo ID.
     *
     * @param int $id ID do Autor a ser excluído.
     * @return bool Retorna verdadeiro se a exclusão for bem-sucedida.
     */
    function delete(int $id): bool
    {
        return new AutorDAO()->delete($id);
    }
}
