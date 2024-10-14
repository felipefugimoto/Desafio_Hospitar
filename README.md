# Cadastro de Censo Hospitalar

Este projeto é um sistema para cadastro de censo hospitalar utilizando Laravel para o back-end e Vue.js 3 para o front-end. O sistema permite a importação de dados via arquivos CSV.

## Estrutura do Projeto

### Back-end utilizando PHP (Laravel 11)

1. **Configuração do Ambiente**
   - Utilize o [Laragon](https://laragon.org/) para facilitar a configuração do ambiente.
   - Caso seja necessario alterar o banco basta acessar a pasta .env
   - Configure o banco de dados MySQL com as seguintes credenciais:

     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=hospital
     DB_USERNAME=root
     DB_PASSWORD=
     ```
     p

2. **Executando o Laravel**
   - Navegue até o diretório do projeto Laravel.
   - Execute o seguinte comando para iniciar o servidor embutido do Laravel:

     ```bash
     php artisan serve
     ```

3. **Criando as Tabelas do Banco de Dados**
   - Para criar as tabelas no banco de dados, execute o comando abaixo:

     ```bash
     php artisan migrate
     ```

### Front-end utilizando Vue.js 3

1. **Instalação das Dependências**
   - Antes de executar a aplicação, instale as dependências necessárias com o comando:

     ```bash
     npm install
     ```

2. **Executando a Aplicação**
   - Após a instalação, execute o seguinte comando para rodar a aplicação:

     ```bash
     npm run dev
     ```

## Importação de Dados via CSV

- O sistema permite a importação de dados através de arquivos CSV. Certifique-se de que o formato do CSV esteja de acordo com as especificações do sistema.
- O formato esperado do CSV é:

```csv
nome	nascimento	codigo	        guia	        entrada        	saida
Pedro	28/01/1987	584234	        7864356	        10/10/2024	10/10/2024

