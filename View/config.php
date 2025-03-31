<?php

/**
 * Definição de constantes e variáveis de ambiente para configuração do sistema.
 */

define('BASE_DIR', dirname(__FILE__, 2)); // Diretório base do projeto

define('VIEWS', BASE_DIR . '/App/View'); // Caminho para a pasta de views

// Configuração do banco de dados
$_ENV['db']['host'] = "localhost:3307"; // Host do banco de dados
$_ENV['db']['user'] = "root"; // Usuário do banco de dados
$_ENV['db']['pass'] = "etecjau"; // Senha do banco de dados
$_ENV['db']['database'] = "biblioteca"; // Nome do banco de dados
