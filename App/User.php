<?php

namespace App;

class User 
{
    private string $name;
    private string $firstname;
    private string $email;
    private int $telephone;
    private string $adresse;
    private $mdp;
    private $role;



    public function getName() {
        return $name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }


    public function getFirstname() {
        return $firstname;
    }

    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }


    public function getEmail() {
        return $email;
    }

    public function setEmail() {
        $this->email = $email;
    }


    public function getTelephone() {
        return $telephone;
    }

    public function setTelephone(int $telephone) {
        $this->getTelephone = $telephone;
    }


    public function getAdresse() {
        return $adresse;
    }

    public function setAdresse(string $adresse) {
        $this->adresse = $adresse;
    }


    public function getMdp() {
        return $mdp;
    }

    public function setMdp() {
        $this->mdp = $mdp;
    }


    public function getRole() {
        return $role;
    }

    public function setRole() {
        $this->role = $role;
    }

}