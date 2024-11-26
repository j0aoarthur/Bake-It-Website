# 📚Bake-It-Website
Catálogo de Bolos e Sistema de Administração em PHP com Boostrap 5

Este projeto consiste em um **site de catálogo de bolos** desenvolvido em PHP, com uma página de administração que inclui um **CRUD de bolos** e um sistema de **registro e gerenciamento de funcionários**.

## Funcionalidades

### Usuário Comum
- Visualizar o catálogo de bolos.
- Navegar pelos detalhes da loja e formas de contato

### Página do Administrador
- CRUD de Bolos:
    - Criar, editar, visualizar e excluir bolos do catálogo.
- Gerenciamento de Funcionários:
    - Registrar novos funcionários.
- Sistema de Login:
    - Apenas funcionários registrados podem realizar login.
    - Somente funcionários autenticados podem acessar o sistema administrativo e criar outros funcionários.

## Tecnologias Utilizadas
- Back-end: PHP
- Front-end: HTML, CSS, JavaScript
- Banco de Dados: MySQL
- Outras Ferramentas:
    - XAMPP (ou similar) para ambiente de desenvolvimento.
    - Biblioteca de estilização opcional (ex.: Bootstrap).

## Pré-requisitos
- PHP 7.4 ou superior
- Servidor Web (ex.: Apache ou Nginx)
- Banco de Dados MySQL

## Como Executar o Projeto
1. Clone o repositório:
   ```bash
   git clone https://github.com/SEU_USUARIO/catalogo-bolos.git
   ```
   
2. Configure o banco de dados:
    - Crie um banco de dados MySQL.
    - Importe o arquivo `init.sql` (localizado na raiz do projeto) para configurar as tabelas.

3. Configure o arquivo `config/db.php` com suas credenciais de acesso ao banco de dados.

4. Inicie o servidor local:
    - Utilize o comando `php -S localhost:8000` ou configure o servidor Apache/Nginx.

5. Acesse no navegador:
    - Catálogo de bolos: `http://localhost/index.php`
    - Administração: `http://localhost/pages/login.php`

## Credenciais de Acesso

- **Administrador Padrão**:
    - Email: `admin`
    - Senha: `admin1234`

## Estrutura do Banco de Dados

### Tabela: `bolos`
- `id`: ID único
- `nome`: Nome do bolo
- `imagem`: URL ou caminho da imagem

### Tabela: `funcionarios`
- `id`: ID único
- `username`: Usuário do funcionário
- `senha`: Hash da senha
