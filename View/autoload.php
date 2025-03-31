<?php

/**
 * Registra uma função de autoload para carregar classes automaticamente.
 *
 * @param string $nome_da_classe Nome completo da classe a ser carregada.
 * @throws Exception Se o arquivo da classe não for encontrado.
 */
spl_autoload_register(function ($nome_da_classe)
{
    $arquivo = BASE_DIR . "/" . $nome_da_classe . ".php";

    if (file_exists($arquivo))
    {
        include $arquivo;
    } else {
        throw new Exception("Arquivo não encontrado: " . $arquivo);
    }
});
