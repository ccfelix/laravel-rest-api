## **Laravel Rest Api**
  
**Codificado em:**  
PHP 7.3.x (pode ser usado acima de 7.2.x)  
Laravel 5.8.x  
 
**Clonagem do respositório:**  
*git clone https://github.com/ccfelix/laravel-rest-api.git*  
  
Instalação de dependências:  
*composer install*  
  
**Criação do bando de dados MySQL:**  
Ex.: laravel_api  
PS: *utf8mb4 e utf8mb4_unicode_520_ci para suporte completo a UTF8.* 
  
**Migrations:**  
Rodar migrations com  
*php artisan migrate*  
  
**Seeders**  
Cria-se registros dummy de usuários e notícias via seeder:  
*php artisan db:seed*  
  
**Requisições**  
Para as requisições deve-se enviar o header: Accept : application/json  
 
**Logon API**  
Via post envia-se email e password do usuário para obter o api_token  
URL:  http://localhost/api/v1/logon  
 
**Logout API**  
Via post envia-se email e password do usuário para trocar o api_token  
URL:  http://localhost/api/v1/logout  
  
**Rotas da API:**  
Para uma listagem completa das rotas da API, executar o comando:  
*php artisan route:list*  
  
**Rotas Protegidas:**  
Para autenticação nas rotas protegidas, deve-se enviar os headers:  
*Accept: application/json*  
*Authorization: "Bearer $input_token"*  
  
O token do usuário é obtido com a rota de Logon descrita acima.  
  
  
