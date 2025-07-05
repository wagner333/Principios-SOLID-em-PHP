<?php

class PatoDeBorracha implements Pato
{
    public function voar(): string
    {
        throw new Exception("Patos de borracha não voam!");
    }

    public function grasnar(): string
    {
        return "Squeak! Squeak!";
    }
}