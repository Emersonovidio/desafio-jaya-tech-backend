

# Backend Desafio Jaya Tech

## - Descrição

API REST de pagamentos de cartão de crédito, framework Laravel 8 do PHP.




## - Instalação
Após clonar este repositório rode o comando:

```bash
$ npm install
```
## - Banco de dados


Essa aplicação persiste seus dados no banco Mysql usando a tecnoliga docker.



## - Rodando a API

```bash
# development
$ php artisan serve



```


## - Endereços

| URL Base  | Endereços                     |
| --------  | ----------------------------- | 
| Local     |  http://localhost:8000 -> ou :PORT(.env) 

## - Documentação Postman
##Documentação da API no Postman
https://documenter.getpostman.com/view/21551018/2sA2rFRf4p


### Rotas
| Methods | Endpoint                      | Responsability                        
| --------| ----------------------------- | ------------------------------------------ |
| POST    |  /payments                    | Rota para criar um pagamento               |
| GET     |  /payments                    | Rota para acessar todos pagamentos         |
| GET     |  /payments/id                 | Rota para acessar um pagamento especifico  | 
| PATCH   |  /payments/id                 | Rota para confirmar um pagamento especifico|
| DELETE  |  /payments/id                 | Rota para cancelar um pagamento especifico |

