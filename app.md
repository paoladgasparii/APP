# Sistema de Biblioteca

Este projeto é um sistema de gerenciamento de biblioteca desenvolvido em PHP. Ele permite o cadastro e gerenciamento de alunos, autores, livros, categorias e empréstimos. A estrutura do sistema segue o padrão MVC (Model-View-Controller), separando a lógica de negócios, a apresentação e o acesso aos dados.

## Estrutura do Repositório


## Arquivos e Funções

### `App/Controller/AlunoController.php`
**Função**: Gerencia as ações relacionadas aos alunos, incluindo a exibição de alunos cadastrados, cadastro de novos alunos e exclusão de alunos.

- **`index()`**: Exibe a lista de alunos cadastrados.
- **`cadastro()`**: Exibe o formulário para cadastro e edição de alunos.
- **`delete()`**: Exclui um aluno pelo ID.

### `App/DAO/AlunoDAO.php`
**Função**: Gerencia a interação com o banco de dados para a entidade aluno. Realiza operações de inserção, atualização, exclusão e recuperação de alunos no banco.

- **`save()`**: Verifica se o aluno já existe e, caso não, chama a função `insert` ou `update` conforme necessário.
- **`insert()`**: Insere um novo aluno no banco de dados.
- **`update()`**: Atualiza os dados de um aluno existente.
- **`selectById()`**: Retorna um aluno específico baseado no ID fornecido.
- **`select()`**: Retorna todos os alunos cadastrados no banco de dados.
- **`delete()`**: Exclui um aluno do banco de dados.

### `App/Model/Aluno.php`
**Função**: Representa o modelo de dados para o aluno, com validações e métodos para interação com o banco de dados.

- **`save()`**: Chama a função `save()` do `AlunoDAO` para salvar o aluno.
- **`getById()`**: Recupera um aluno pelo seu ID.
- **`getAllRows()`**: Recupera todos os alunos cadastrados.
- **`delete()`**: Exclui um aluno através do `AlunoDAO`.
- **Validações**: Realiza validações no nome, RA e curso do aluno.

### `App/View/autoload.php`
**Função**: Registra uma função de autoload para carregar as classes automaticamente. Isso elimina a necessidade de incluir arquivos manualmente, carregando as classes conforme necessário.

- **`spl_autoload_register()`**: Registra a função de autoload, que busca e inclui arquivos PHP com base no nome da classe.

### `App/View/config.php`
**Função**: Define configurações do sistema, incluindo o diretório base do projeto, as views e as configurações do banco de dados.

- **Constantes**:
  - `BASE_DIR`: Diretório raiz do projeto.
  - `VIEWS`: Caminho para o diretório das views.
- **Configuração do banco de dados**:
  - Define as credenciais de conexão com o banco de dados, incluindo o host, usuário, senha e o nome do banco.

### `App/View/index.php`
**Função**: Inicializa o sistema, iniciando a sessão e incluindo os arquivos de configuração, autoload e rotas. Este arquivo é o ponto de entrada principal da aplicação.

- **`session_start()`**: Inicia a sessão do usuário.
- **`include`**: Inclui os arquivos `config.php`, `autoload.php` e `routes.php`.

### `App/View/routes.php`
**Função**: Define as rotas da aplicação e direciona para os controladores correspondentes, com base na URL acessada.

- **`switch($url)`**: Verifica a URL solicitada e chama o método apropriado de cada controlador, como `AlunoController`, `LoginController`, `AutorController`, etc.
- **Rotas**: A aplicação tem rotas para login, alunos, autores, categorias, livros e empréstimos, com funcionalidades como cadastro, exclusão e listagem.

