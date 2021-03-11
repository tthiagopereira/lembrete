## Sistema de lembrete Laravel

### Instalação no LINUX

- baixar projeto git clone https://github.com/tthiagopereira/lembrete.git
- cd lembrete
- composer install
- cp .env-email .env
-  php artisan key:generate

### Configurando arquivo .env
#### Configurando email

- Entre no site https://myaccount.google.com/lesssecureapps marcar a opção para Permitir aplicativos menos seguros: ATIVADA

- MAIL_DRIVER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME=SEU EMAIL
- MAIL_PASSWORD=SUA SENHA DO EMAIL
- MAIL_ENCRYPTION=tls

### Configurando arquivo .env
#### Configurando acesso ao banco de dados

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=lembretes
- DB_USERNAME=root
- DB_PASSWORD=

#### Criar um banco de dados com o nome EXEMPLO lembrete

- Recomendado MySql 
- create database lembretes

### Executar comando para criar as tabelas no banco de dados

#### - php artisan migrate

### Executar o servidor nativo do Laravel

- php artisan serve

- Entre no navegador de sua preferencia e coloque esse endereço http://127.0.0.1:8000/