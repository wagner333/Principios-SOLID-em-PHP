<?php

interface Pato
{
    public function voar(): string;
    public function grasnar(): string;
}

class PatoVerdadeiro implements Pato
{
    public function voar(): string
    {
        return "Pato voando!";
    }

    public function grasnar(): string
    {
        return "Quack! Quack!";
    }
}