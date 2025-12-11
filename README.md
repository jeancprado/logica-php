### **Como rodar o código na minha máquina**

**Requisitos**

- Docker (para o funcionamento das aplicações)
- Cypress e Node.js (para teste automatizado)

**Passo a passo (docker)**

- Com o projeto clonado
- Inicie o comando docker-compose up no seu terminal
- Acesse no seu navegador a url: localhost
- Selecione o exercicio que deseja visulizar.
- PhpMyAdmin(Banco de dados MySQL) acesso na porta: localhost:8080

**Informações do banco de dados**

- Nome do banco: exercicio_dados
- Usuário: user
- Senha: password
- Volume persistente: db-data

**Passo a Passo uso (banco de dados)**

- Acesse o phpmyadmim, clique em (exercicio_dados), na barra superior procure por import/importar, em browse, busque pela pasta do exercício que deseja testar, na pasta (db) selecione o arquivo base.sql
- ou
- Acesse este link: http://localhost:8080 e importe o arquivo desejado


**Instalação do (Cypress)**

Passo 1: ​Instalar cypress: npm install 

Passo 2:​ Abrir a interface do cypress: npx cypress open

Passo 3: Escolha um navegador (de sua preferência) e clique em “start E2E Testing
in [...]”

Passo 4: Selecione o exercício que deseja testar.

