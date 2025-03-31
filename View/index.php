<?php

/**
 * Inicializa a sessão, carrega configurações e define as rotas do sistema.
 */

session_start(); // Inicia a sessão para gerenciamento de estado do usuário

include "config.php";   // Inclui as configurações do sistema
include "autoload.php"; // Carrega automaticamente as classes
include "routes.php";   // Define as rotas da aplicação