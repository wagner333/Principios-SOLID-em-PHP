<?php

class Carrinho
{
    private $itens = [];
    private $desconto;

    public function __construct(Desconto $desconto)
    {
        $this->desconto = $desconto;
    }

    public function adicionarItem(float $preco)
    {
        $this->itens[] = $preco;
    }

    public function calcularTotal(): float
    {
        $total = array_sum($this->itens);
        return $this->desconto->aplicar($total);
    }
}