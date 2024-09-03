# **Gerenciamento de Contatos**

Bem-vindo ao projeto de Gerenciamento de Contatos, uma aplicação desenvolvida com **Laravel** e **Vue.js**, utilizando **Bootstrap** para proporcionar uma interface moderna e responsiva. Esta aplicação oferece funcionalidades completas para gerenciar contatos, permitindo a criação, edição, listagem e exclusão de informações.

---

## **🚀 Tecnologias Utilizadas**

- **Laravel**: Back-end robusto, responsável pela lógica da aplicação, gerenciamento de rotas e integração com o banco de dados.
- **Vue.js**: Framework JavaScript que oferece uma experiência dinâmica e interativa no front-end.
- **Bootstrap**: Biblioteca CSS utilizada para garantir que o design da aplicação seja responsivo e esteticamente agradável.

---

## **🛠️ Funcionalidades**

- **Cadastro de Contatos**: Registre novos contatos com dados detalhados, como nome, data de nascimento, e-mail, profissão, telefone e celular.
- **Listagem de Contatos**: Exiba todos os contatos cadastrados de forma organizada em uma tabela.
- **Edição de Contatos**: Modifique as informações de contatos existentes facilmente.
- **Exclusão de Contatos**: Remova contatos indesejados com um simples clique.

---

## **📂 Estrutura do Banco de Dados**

A aplicação utiliza uma tabela chamada `contacts`, com os seguintes campos:

- **id**: Identificador único do contato.
- **name**: Nome completo do contato.
- **birthdate**: Data de nascimento.
- **email**: Endereço de e-mail.
- **profession**: Profissão.
- **phone**: Número de telefone.
- **telephone**: Número de celular.
- **whatsapp**: Indica se o número de celular possui WhatsApp.
- **send_sms**: Indica se o contato deseja receber notificações por SMS.
- **send_email**: Indica se o contato deseja receber notificações por e-mail.

---

## **❗ Observações Importantes**

- **Interface**: A interface da aplicação foi desenvolvida para ser a mais próxima possível ao design desejado. No entanto, não está 100% idêntica devido a algumas limitações de inputs no Bootstrap.

---

## **📦 Como Executar o Projeto**

### **Pré-requisitos**

- **Docker**: Necessários para a utilização do Laravel Sail.
- **Node.js e npm**: Para o gerenciamento de pacotes front-end.
- **PHP e Composer**: Para o gerenciamento do sail

## Passos para Instalação

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/Pedrohbbier/contacts-manager.git
    ```

2. **Navegue até o diretório do projeto:**

    ```bash
    cd contacts-manager
    ```

3. **Configurar o arquivo `.env`:**

    ```bash
    cp .env.example .env
    ```

4. **Baixar e instalar o Laravel Sail:**

    ```bash
    composer require laravel/sail --dev
    php artisan sail:install
    ```

    > **Nota:** Aperte enter na opção `mysql`.

5. **Instale as dependências do Composer:**

    ```bash
    ./vendor/bin/sail composer install
    ```

6. **Inicie os containers do Docker:**

    ```bash
    ./vendor/bin/sail up -d
    ```

7. **Instale as dependências do npm:**

    ```bash
    ./vendor/bin/sail npm install
    ```

8. **Execute as migrações do banco de dados:**

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

9. **Compile os assets front-end:**

    ```bash
    ./vendor/bin/sail npm run dev
    ```

10. **Configurar app key**

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

11. **Acesse a aplicação no navegador:**

    [http://localhost](http://localhost)
