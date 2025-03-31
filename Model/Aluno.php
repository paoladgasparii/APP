<?php

namespace App\Model;

use App\DAO\AlunoDAO;
use Exception;

/**
 * Classe Aluno
 * Representa a entidade Aluno no sistema e contém métodos para manipulação de dados.
 */
final class Aluno extends Model
{
    /** @var int|null ID do aluno */
    public ?int $id = null;

    /** @var string|null Nome do aluno */
    public ?string $Nome {
        set {
            if (strlen($value) < 3)
                throw new Exception("Nome deve ter no mínimo 3 caracteres.");

            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    /** @var string|null RA do aluno */
    public ?string $RA {
        set {
            if (empty($value))
                throw new Exception("Preencha o RA.");

            $this->RA = $value;
        }

        get => $this->RA ?? null;
    }

    /** @var string|null Curso do aluno */
    public ?string $Curso {
        set {
            if (strlen($value) < 3)
                throw new Exception("Curso deve ter no mínimo 3 caracteres.");

            $this->Curso = $value;
        }

        get => $this->Curso ?? null;
    }

    /**
     * Salva o aluno no banco de dados.
     *
     * @return Aluno Retorna o objeto Aluno salvo.
     */
    function save(): Aluno
    {
        return new AlunoDAO()->save($this);
    }

    /**
     * Busca um aluno pelo ID.
     *
     * @param int $id ID do aluno a ser buscado.
     * @return ?Aluno Retorna o objeto Aluno ou null se não encontrado.
     */
    function getById(int $id): ?Aluno
    {
        return new AlunoDAO()->selectById($id);
    }

    /**
     * Retorna todas as linhas da tabela aluno.
     *
     * @return array Lista de alunos.
     */
    function getAllRows(): array
    {
        $this->rows = new AlunoDAO()->select();

        return $this->rows;
    }

    /**
     * Exclui um aluno pelo ID.
     *
     * @param int $id ID do aluno a ser excluído.
     * @return bool Retorna verdadeiro se a exclusão for bem-sucedida.
     */
    function delete(int $id): bool
    {
        return new AlunoDAO()->delete($id);
    }
}
