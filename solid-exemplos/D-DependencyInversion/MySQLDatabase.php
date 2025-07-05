<?php

class MySQLDatabase implements Database
{
    public function conectar()
    {
        echo "Conectando ao MySQL...\n";
    }

    public function desconectar()
    {
        echo "Desconectando do MySQL...\n";
    }

    public function query(string $sql)
    {
        echo "Executando query no MySQL: $sql\n";
    }
}