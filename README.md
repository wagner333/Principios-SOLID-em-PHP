 ```
    3              ╔══════╗ ╔══════╗ ╔══════╗ ╔══════╗ ╔══════╗
    4              ║  SSS ║ ║ OOOO ║ ║ L    ║ ║ IIII ║ ║ DDDD ║
    5              ║ S    ║ ║O    O║ ║ L    ║ ║  II  ║ ║D    D║
    6              ║  SSS ║ ║O    O║ ║ L    ║ ║  II  ║ ║D    D║
    7              ║     S║ ║O    O║ ║ L    ║ ║  II  ║ ║D    D║
    8              ║ SSSS ║ ║ OOOO ║ ║ LLLLL║ ║ IIII ║ ║ DDDD ║
    9              ╚══════╝ ╚══════╝ ╚══════╝ ╚══════╝ ╚══════╝
 ```


# Princípios SOLID

Os princípios **SOLID** são um conjunto de diretrizes da programação orientada a objetos, criadas por Robert C. Martin (também conhecido como Uncle Bob), que ajudam a escrever um código mais limpo, compreensível, escalável e de fácil manutenção.

#  História dos Princípios SOLID

Os princípios SOLID surgiram como uma resposta aos desafios da programação orientada a objetos (OOP) em sistemas complexos. Eles foram formulados por **Robert C. Martin**, mais conhecido como **Uncle Bob**, um dos nomes mais influentes no mundo do desenvolvimento de software.

Durante as décadas de 1980 e 1990, a comunidade de desenvolvedores começou a perceber que sistemas mal estruturados se tornavam difíceis de manter, testar e escalar. Mesmo com os conceitos de orientação a objetos sendo amplamente utilizados, ainda era comum encontrar códigos acoplados, com responsabilidades misturadas e difíceis de modificar sem causar novos bugs.

Foi nesse contexto que **Uncle Bob**, inspirado por diversas boas práticas da engenharia de software, consolidou cinco princípios fundamentais para guiar o design de software orientado a objetos. Esses princípios foram reunidos no acrônimo **SOLID** por **Michael Feathers**, colaborador próximo de Uncle Bob.

Desde então, os princípios SOLID se tornaram uma base teórica e prática essencial para:

- Projetar sistemas mais modulares e reutilizáveis.
- Melhorar a legibilidade e manutenibilidade do código.
- Facilitar testes automatizados e desenvolvimento ágil.

Esses princípios são ensinados em cursos, livros (como *Clean Code* e *Agile Software Development*), e aplicados em projetos reais por empresas do mundo inteiro.

>  O SOLID não é uma regra rígida, mas um **guia poderoso** para criar software de qualidade, com menos dívidas técnicas e mais valor a longo prazo.

---

O acrônimo **SOLID** representa cinco princípios:

## S — Single Responsibility Principle (Princípio da Responsabilidade Única)

> **"Uma classe deve ter apenas um motivo para mudar."**

Cada classe deve ter apenas uma responsabilidade/função bem definida. Isso facilita a manutenção e evita efeitos colaterais inesperados.

**Exemplo ruim:**
```php
class Usuario {
    public function salvar() { /* salva no banco */ }
    public function validarEmail() { /* valida o e-mail */ }
    public function enviarEmailDeBoasVindas() { /* envia e-mail */ }
}
```

**Exemplo bom:**
```php
class Usuario { /* dados do usuário */ }

class UsuarioRepository {
    public function salvar(Usuario $usuario) { /* salvar no banco */ }
}

class EmailService {
    public function enviarBoasVindas(Usuario $usuario) { /* envia e-mail */ }
}
```

---

##  O — Open/Closed Principle (Princípio Aberto/Fechado)

> **"Entidades devem estar abertas para extensão, mas fechadas para modificação."**

Você deve poder adicionar comportamentos a uma classe sem modificá-la diretamente, geralmente usando **herança** ou **interfaces**.

**Exemplo:**
```php
interface Desconto {
    public function aplicar(float $valor): float;
}

class DescontoNatal implements Desconto {
    public function aplicar(float $valor): float {
        return $valor * 0.9;
    }
}

class Carrinho {
    public function calcular(Desconto $desconto, float $valor): float {
        return $desconto->aplicar($valor);
    }
}
```

---

##  L — Liskov Substitution Principle (Princípio da Substituição de Liskov)

> **"Classes derivadas devem poder ser substituídas por suas classes base sem quebrar o código."**

Se `B` herda de `A`, você deve poder usar `B` no lugar de `A` sem que o programa quebre.

**Exemplo ruim:**
```php
class Pato {
    public function voar() { /* voa */ }
}

class PatoDeBorracha extends Pato {
    public function voar() {
        throw new Exception("Não posso voar!");
    }
}
```

**Exemplo bom:**
```php
interface Pato {
    public function nadar();
}

class PatoVoador implements Pato {
    public function nadar() {}
    public function voar() {}
}

class PatoDeBorracha implements Pato {
    public function nadar() {}
}
```

---

##  I — Interface Segregation Principle (Princípio da Segregação de Interface)

> **"Nenhuma classe deve ser forçada a depender de métodos que não utiliza."**

Crie interfaces específicas ao invés de uma única interface genérica e pesada.

**Exemplo ruim:**
```php
interface Trabalhador {
    public function trabalhar();
    public function comer();
}

class Robô implements Trabalhador {
    public function trabalhar() {}
    public function comer() {
        // Robôs não comem!
    }
}
```

**Exemplo bom:**
```php
interface Trabalhador {
    public function trabalhar();
}

interface Comedor {
    public function comer();
}

class Robô implements Trabalhador {
    public function trabalhar() {}
}

class Humano implements Trabalhador, Comedor {
    public function trabalhar() {}
    public function comer() {}
}
```

---

##  D — Dependency Inversion Principle (Princípio da Inversão de Dependência)

> **"Dependa de abstrações, não de implementações."**

Classes de alto nível não devem depender de classes de baixo nível diretamente. Ambas devem depender de **interfaces**.

**Exemplo ruim:**
```php
class MySQLDatabase {
    public function conectar() {}
}

class UsuarioService {
    private $db;

    public function __construct() {
        $this->db = new MySQLDatabase(); // Acoplamento forte
    }
}
```

**Exemplo bom:**
```php
interface Database {
    public function conectar();
}

class MySQLDatabase implements Database {
    public function conectar() {}
}

class UsuarioService {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db; // Depende de abstração
    }
}
```

---

## Por que usar os Princípios SOLID?

Usar os princípios SOLID ajuda a escrever códigos mais limpos, fáceis de entender, testar e manter. Eles reduzem o acoplamento entre componentes, melhoram a organização do sistema e tornam as mudanças futuras mais seguras e simples.

>  Com SOLID, seu código se torna mais profissional e preparado para crescer com qualidade.


---

## Referências

- Clean Code (Robert C. Martin)
- [Artigo de Uncle Bob](https://blog.cleancoder.com)
- [DevMedia: Princípios SOLID](https://www.devmedia.com.br/principios-solid/)

# Exemplos dos Princípios SOLID

Aqui estão os exemplos práticos para cada um dos princípios **SOLID** de design de software. Os exemplos estão organizados em pastas, cada uma representando um princípio. Dentro de cada pasta, você encontrará os arquivos PHP que demonstram o conceito, além de um arquivo `README.md` com explicações e instruções.

## Estrutura de Pastas
```
solid-exemplos/
│
├── S-SingleResponsibility/
│   └── Usuario.php
│
├── O-OpenClosed/
│   ├── Desconto.php
│   └── Carrinho.php
│
├── L-LiskovSubstitution/
│   ├── Pato.php
│   └── PatoDeBorracha.php
│
├── I-InterfaceSegregation/
│   ├── Trabalhador.php
│   └── Comedor.php
│
└── D-DependencyInversion/
    ├── Database.php
    └── MySQLDatabase.php
```

### 1. **S - Single Responsibility Principle (SRP)**

O **Princípio da Responsabilidade Única** afirma que uma classe deve ter apenas um motivo para mudar. Isso significa que cada classe deve ter uma única responsabilidade.

- **`Usuario.php`**: Exemplo de violação do SRP.
- **`UsuarioRepository.php`**: Refatoração para aplicar o SRP.

---

### 2. **O - Open/Closed Principle (OCP)**

O **Princípio Aberto/Fechado** diz que uma classe deve estar aberta para extensão, mas fechada para modificação. Ou seja, você deve ser capaz de adicionar novos comportamentos a uma classe sem alterar a classe original.

- **`Desconto.php`**: Interface para aplicar descontos.
- **`Carrinho.php`**: Cálculo de valor com base no desconto aplicado.

---

### 3. **L - Liskov Substitution Principle (LSP)**

O **Princípio da Substituição de Liskov** estabelece que você deve poder substituir uma classe base por suas classes derivadas sem alterar o comportamento esperado do programa.

- **`Pato.php`**: Classe base `Pato`.
- **`PatoDeBorracha.php`**: Exemplo de violação do LSP, onde a classe derivada `PatoDeBorracha` não substitui corretamente o comportamento de `Pato`.

---

### 4. **I - Interface Segregation Principle (ISP)**

O **Princípio da Segregação de Interface** afirma que nenhuma classe deve ser forçada a depender de métodos que não utiliza. Ou seja, a interface deve ser específica para a necessidade do cliente.

- **`Trabalhador.php`**: Interface para trabalhadores.
- **`Comedor.php`**: Interface para quem pode comer.

---

### 5. **D - Dependency Inversion Principle (DIP)**

O **Princípio da Inversão de Dependência** estabelece que as classes de alto nível não devem depender de classes de baixo nível, mas sim de abstrações (interfaces ou classes abstratas).

- **`Database.php`**: Interface para conexão com o banco de dados.
- **`MySQLDatabase.php`**: Implementação de banco de dados MySQL.

---

Com essa estrutura e os exemplos, você será capaz de entender melhor os princípios **SOLID** e como aplicá-los em seus próprios projetos.

