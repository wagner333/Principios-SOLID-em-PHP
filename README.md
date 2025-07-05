
# Princípios SOLID

Os princípios **SOLID** são um conjunto de diretrizes da programação orientada a objetos, criadas por Robert C. Martin (também conhecido como Uncle Bob), que ajudam a escrever um código mais limpo, compreensível, escalável e de fácil manutenção.

O acrônimo **SOLID** representa cinco princípios:

## 📌 S — Single Responsibility Principle (Princípio da Responsabilidade Única)

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

## 📌 O — Open/Closed Principle (Princípio Aberto/Fechado)

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

## 📌 L — Liskov Substitution Principle (Princípio da Substituição de Liskov)

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

## 📌 I — Interface Segregation Principle (Princípio da Segregação de Interface)

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

## 📌 D — Dependency Inversion Principle (Princípio da Inversão de Dependência)

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

## ✅ Conclusão

Os princípios **SOLID** são fundamentais para quem deseja evoluir na carreira de desenvolvedor, especialmente na construção de sistemas escaláveis e sustentáveis. Eles não são regras rígidas, mas guias para um código mais limpo e de qualidade.

> 💡 *Estudar e aplicar SOLID é um investimento na saúde do seu código!*

---

## 📚 Referências

- Clean Code (Robert C. Martin)
- [Artigo de Uncle Bob](https://blog.cleancoder.com)
- [DevMedia: Princípios SOLID](https://www.devmedia.com.br/principios-solid/)
