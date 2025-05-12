<?php

namespace App\Model;

use App\DAO\UsuarioDAO;
use Exception;

/**
 * Classe Usuário
 * Representa a entidade Usuário no sistema e contém métodos para manipulação de dados.
 */
final class Usuario extends Model
{
    /** @var int|null ID do usuário */
    public ?int $id = null;

    /** @var string|null Nome do usuário */
    public ?string $Nome {
        set {
            if (strlen($value) < 3)
                throw new Exception("Nome deve ter no mínimo 3 caracteres.");

            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    /** @var string|null Email do usuário */
    public ?string $Email {
        set {
            if (empty($value))
                throw new Exception("Preencha o e-mail.");

            $this->Email = $value;
        }

        get => $this->Email ?? null;
    }

    /** @var string|null Senha do aluno */
    public ?string $Senha {
        set {
            if (strlen($value) < 3)
                throw new Exception("Senha deve ter no mínimo 3 caracteres.");

            $this->Senha = $value;
        }

        get => $this->Senha ?? null;
    }

    /**
     * Salva o senha no banco de dados.
     *
     * @return Usuario Retorna o objeto Usuario salvo.
     */
    function save(): Usuario
    {
        return new UsuarioDAO()->save($this);
    }

    /**
     * Busca um aluno pelo ID.
     *
     * @param int $id ID do usuário a ser buscado.
     * @return ?Usuario Retorna o objeto Usuario ou null se não encontrado.
     */
    function getById(int $id): ?Usuario
    {
        return new UsuarioDAO()->selectById($id);
    }

    /**
     * Retorna todas as linhas da tabela usuario.
     *
     * @return array Lista de usuários.
     */
    function getAllRows(): array
    {
        $this->rows = new UsuarioDAO()->select();

        return $this->rows;
    }

    /**
     * Exclui um usuário pelo ID.
     *
     * @param int $id ID do usuário a ser excluído.
     * @return bool Retorna verdadeiro se a exclusão for bem-sucedida.
     */
    function delete(int $id): bool
    {
        return new AlunoDAO()->delete($id);
    }
}
