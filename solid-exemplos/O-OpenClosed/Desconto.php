<?php

interface Desconto
{
    public function aplicar(float $valor): float;
}

class DescontoNatal implements Desconto
{
    public function aplicar(float $valor): float
    {
        return $valor * 0.9; // 10% de desconto
    }
}

class DescontoBlackFriday implements Desconto
{
    public function aplicar(float $valor): float
    {
        return $valor * 0.8; // 20% de desconto
    }
}