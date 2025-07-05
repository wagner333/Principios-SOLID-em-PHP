<?php

class Usuario {
    private $nome;
    private $email;
    
    public function __construct(string $nome, string $email) {
        $this->nome = $nome;
        $this->email = $email;
    }
    
    public function getNome(): string {
        return $this->nome;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
}

class UsuarioRepository {
    public function salvar(Usuario $usuario) {
        // Lógica para salvar no banco de dados
        echo "Salvando usuário {$usuario->getNome()} no banco de dados\n";
    }
}

class EmailService {
    public function enviarEmailBoasVindas(Usuario $usuario) {
        // Lógica para enviar email
        echo "Enviando email para {$usuario->getEmail()}\n";
    }
}