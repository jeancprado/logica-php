### **Como rodar o código na minha máquina**

**Requisitos**

- Docker (para o funcionamento das aplicações)
- Cypress e Node.js (para teste automatizado)

**Passo a passo (docker)**

- Com o projeto clonado
- Inicie o comando docker-compose up no seu terminal
- Acesse no seu navegador a url: localhost
- Selecione o exercicio que deseja visulizar.


**Instalação do (Node.js)**

Em seu terminal:
Passo 1.​ Atualize o sistema (opcional porém recomendado):
sudo apt update && sudo apt upgrade -y

Passo 2.​ Instale o “curl”, se não tiver:
sudo apt install curl -y

Passo 3.​ Baixar e instalar a nvm:
curl -o-
https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.2/install.sh |
bash

Passo 4.​ Em vez de reiniciar a concha ou shell:
\. "$HOME/.nvm/nvm.sh"

Passo 5.​ Baixar e instalar a Node.js:
nvm install 24

Passo 6.​ Consultar a versão da Node.js:
node -v

Passo 7.​ Consultar a versão da npm:
npm -v


**Instalação do (Cypress)**

- ​Instalar cypress: npm install cypress

-​ Abrir a interface do cypress: npx cypress open

Passo 3: Escolha um navegador (de sua preferência) e clique em “start E2E Testing
in [...]”

Passo 4: Selecione o exercício que deseja testar