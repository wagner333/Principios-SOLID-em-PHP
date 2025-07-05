<?php

interface Trabalhador
{
    public function trabalhar(): string;
}

interface Comedor
{
    public function comer(): string;
}

class Humano implements Trabalhador, Comedor
{
    public function trabalhar(): string
    {
        return "Trabalhando...";
    }

    public function comer(): string
    {
        return "Comendo...";
    }
}

class Robo implements Trabalhador
{
    public function trabalhar(): string
    {
        return "Trabalhando 24/7!";
    }
}