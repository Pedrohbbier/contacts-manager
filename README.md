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

- **Docker e Docker Compose**: Necessários para a utilização do Laravel Sail.
- **Node.js e npm**: Para o gerenciamento de pacotes front-end.

### **Passos para Instalação**

Clone o repositório:
git clone https://github.com/seu-usuario/seu-repositorio.git

Navegue até o diretório do projeto:
cd seu-repositorio

Instale as dependências do Composer:
./vendor/bin/sail composer install

Instale as dependências do npm:
./vendor/bin/sail npm install

Inicie os containers do Docker:
./vendor/bin/sail up -d

Execute as migrações do banco de dados:
./vendor/bin/sail artisan migrate

Compile os assets front-end:
./vendor/bin/sail npm run dev

Acesse a aplicação no navegador:
http://localhost