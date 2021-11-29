<?php

namespace App;


class Article
{
    private int $prix;
    private string $name;
    private string $description;
    private string $type;


    public function getType() {
        return $type;
    }

    public function setType() {
        $this->type = $type;
    }

    public function getPrix() {
        return $prix;
    }

    public function setPrix(int $prix) {
        $this->prix = $prix;
    }


    public function getName() {
        return $name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }


    public function getDescription() {
        return $description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

}