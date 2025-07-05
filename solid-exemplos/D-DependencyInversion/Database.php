<?php

interface Database
{
    public function conectar();
    public function desconectar();
    public function query(string $sql);
}