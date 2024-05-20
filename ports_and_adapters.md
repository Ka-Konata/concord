### Laravel com Ports and Adapters (Arquitetura Hexagonal)

> Estrutura das pastas:
```
app/
├── Console/
├── Exceptions/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
├── Models/
├── Providers/
├── Domain/
│   ├── User/
│   │   ├── Entities/
│   │   ├── Repositories/
│   │   ├── Services/
│   │   └── ValueObjects/
│   └── Product/
│       ├── Entities/
│       ├── Repositories/
│       ├── Services/
│       └── ValueObjects/
├── Application/
│   ├── DTOs/
│   ├── UseCases/
│   └── Services/
├── Infrastructure/
│   ├── Persistence/
│   │   ├── Eloquent/
│   │   ├── Repositories/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   └── Providers/
└── Interfaces/
    ├── Http/
    │   ├── Controllers/
    │   └── Requests/
    ├── Console/
    └── REST/
```

1. app/Domain/: Contém a lógica de negócios e entidades. Cada módulo do domínio (como User, Product, etc.) tem sua própria subpasta. Dentro de cada módulo, você encontra:

    * Entities/: Classes que representam as entidades principais do domínio.
    * Repositories/: Interfaces dos repositórios que definem os métodos para acesso aos dados.
    * Services/: Serviços de domínio que contêm a lógica de negócios.
    * ValueObjects/: Objetos de valor que representam conceitos imutáveis do domínio.

2. app/Application/: Contém a lógica de aplicação, que coordena as operações do domínio. Inclui:

    * DTOs/: Objetos de transferência de dados que encapsulam os dados transferidos entre as camadas.
    * UseCases/: Classes que representam os casos de uso da aplicação, coordenando as operações necessárias para cada caso.
    * Services/: Serviços de aplicação que podem interagir com múltiplos casos de uso ou realizar operações de orquestração.

3. app/Infrastructure/: Contém detalhes específicos de implementação técnica. Inclui:

    * Persistence/: Implementações concretas de repositórios, como Eloquent, Redis, etc.
    * Http/: Implementações específicas de infraestrutura para controladores HTTP e middleware.
    * Providers/: Provedores de serviços específicos da infraestrutura, como provedores de autenticação, etc.

4. app/Interfaces/: Define as portas de entrada e saída da aplicação. Inclui:

    * Http/: Controladores HTTP e requisições validadas.
    * Console/: Comandos de console específicos da aplicação.
    * REST/: Endpoints RESTful.

Considerações Finais
Configuração do Autoload: Configure o autoload do Composer para suportar a nova estrutura de pastas adicionando ou modificando a seção autoload no composer.json:

```json
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Domain\\": "app/Domain/",
        "Application\\": "app/Application/",
        "Infrastructure\\": "app/Infrastructure/",
        "Interfaces\\": "app/Interfaces/"
    }
}
```

Boas Práticas: A arquitetura hexagonal é flexível e pode ser adaptada conforme necessário. O importante é manter a separação de preocupações e garantir que a lógica de negócios permaneça isolada das preocupações técnicas.

