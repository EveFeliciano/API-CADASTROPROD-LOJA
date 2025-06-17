INTEGRANTES:
- Evellyn de Santana Feliciano
- Gabriel Caspirro Demarchi
- Guilherme Augusto Pires da Silva
- Guilherme Nakamura Carvalho
- Iago Santos Menezes de Oliveira


Link do postman:
https://www.postman.com/cryosat-physicist-3993043/my-workspace/collection/390uoqe/catlogo-de-produtos-brinquedos

🚀 API Catálogo de Produtos (Brinquedos)
API que simula um gerenciador de catálogo de produtos de uma loja de brinquedos. Feito em PHP.

Requisitos: PHP 7 ou mais recente

Rotas e Endpoints:

Método GET:

url: http://localhost/API-CADASTROPROD-LOJA/api_produtos/api/brinquedos
 Retorna todos os brinquedos cadastrados no catálogo.

Retorno:
````
{
    "brinquedos": [
        {
            "id": 0,
            "nome": "Carro de Controle Remoto Radical",
            "categoria": "Veículos",
            "preco": 129.9,
            "promocao": {
                "ativo": true,
                "precoPromocional": 99.9,
                "descontoPorcentagem": 23
            },
            "descricao": "Um carro de controle remoto super veloz com luzes LED e bateria de longa duração.",
            "idadeRecomendada": "5+ anos",
            "marca": "Turbo Wheels",
            "estoque": 50
        },
        {
            "id": 1,
            "nome": "Boneca Mágica Encantada",
            "categoria": "Bonecas e Bonecos",
            "preco": 79.99,
            "promocao": {
                "ativo": false
            },
            "descricao": "Boneca articulada com roupas removíveis e acessórios, perfeita para criar histórias.",
            "idadeRecomendada": "3+ anos",
            "marca": "Sonho Infantil",
            "estoque": 266
        },
        {
            "id": 5,
            "nome": "Ben 10",
            "categoria": "Boneco",
            "preco": 189.9,
            "promocao": {
                "ativo": true,
                "precoPromocional": 99.9,
                "descontoPorcentagem": 23
            },
            "descricao": "Um carro de controle remoto super veloz com luzes LED e bateria de longa duração.",
            "idade": "5+ anos",
            "marca": "Turbo Wheels",
            "estoque": 130
        },
        {
            "id": 6,
            "nome": "Boneca Mágica Encantada 2",
            "categoria": "Bonecas e Bonecos",
            "preco": 79.99,
            "promocao": {
                "ativo": false
            },
            "descricao": "Boneca articulada com roupas removíveis e acessórios, perfeita para criar histórias.",
            "idade": "3+ anos",
            "marca": "Sonho Infantil",
            "estoque": 218
        }
    ]
}
````

Método POST:

url: http://localhost/API-CADASTROPROD-LOJA/api_produtos/api/brinquedobyid
 Retorna um brinquedo cadastrado no catálogo baseado no seu ID.

Body da requisição:
````
{
    "id": 1
}
````

Retorno:
````
{
    "id": 1,
    "nome": "Boneca Mágica Encantada",
    "categoria": "Bonecas e Bonecos",
    "preco": 79.99,
    "promocao": {
        "ativo": false
    },
    "descricao": "Boneca articulada com roupas removíveis e acessórios, perfeita para criar histórias.",
    "idadeRecomendada": "3+ anos",
    "marca": "Sonho Infantil",
    "estoque": 266
}
````

2. url: http://localhost/API-CADASTROPROD-LOJA/api_produtos/api/cadastrar-brinquedo
Cadastra um novo brinquedo no catálogo e retorna o que foi inserido.

Body da requisição:
````
{
    "nome": "Boneca Mágica",
    "categoria": "Bonecas e Bonecos",
    "preco": 79.99,
    "promocao": {
        "ativo": false
    },
    "descricao": "Boneca articulada com roupas removíveis e acessórios, perfeita para criar histórias.",
    "idadeRecomendada": "3+ anos",
    "marca": "Sonho Infantil",
    "estoque": 80
}
````
Retorno:
````
{
    "id": 7,
    "nome": "Boneca Mágica",
    "categoria": "Bonecas e Bonecos",
    "preco": 79.99,
    "promocao": {
        "ativo": false
    },
    "descricao": "Boneca articulada com roupas removíveis e acessórios, perfeita para criar histórias.",
    "idade": "3+ anos",
    "marca": "Sonho Infantil",
    "estoque": 80
}
````

Método PUT:

url: http://localhost/API-CADASTROPROD-LOJA/api_produtos/api/inserir-brinquedo

Adiciona a quantidade especificada de produtos no estoque do brinquedo indicado pelo ID.

Body da requisição:
````
{
    "quantidade": 40,
    "id": 5
}
````

Retorno:
````
{
    "id": 5,
    "nome": "Ben 10",
    "categoria": "Boneco",
    "preco": 189.9,
    "promocao": {
        "ativo": true,
        "precoPromocional": 99.9,
        "descontoPorcentagem": 23
    },
    "descricao": "Um carro de controle remoto super veloz com luzes LED e bateria de longa duração.",
    "idade": "5+ anos",
    "marca": "Turbo Wheels",
    "estoque": 170
}
````

2. url: http://localhost/API-CADASTROPROD-LOJA/api_produtos/api/remover-brinquedo
Remove a quantidade especificada de produtos no estoque do brinquedo indicado pelo ID.

Requisição do body:
````
{
    "id": 1,
    "quantidade": 2
}
````

Retorno:
````
{
    "id": 1,
    "nome": "Boneca Mágica Encantada",
    "categoria": "Bonecas e Bonecos",
    "preco": 79.99,
    "promocao": {
        "ativo": false
    },
    "descricao": "Boneca articulada com roupas removíveis e acessórios, perfeita para criar histórias.",
    "idadeRecomendada": "3+ anos",
    "marca": "Sonho Infantil",
    "estoque": 264
}
````

Método DELETE:

url: http://localhost/API-CADASTROPROD-LOJA/api_produtos/api/deletar-brinquedo

Deleta o brinquedo antes cadastrado no catálogo baseado no ID.

Body da requisição:
````
{
    "id": 3
}
````

Retorno:
````
{"mensagem":"Brinquedo deletado com sucesso"}
````



