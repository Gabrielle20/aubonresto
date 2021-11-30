<?php

namespace App;

class Panier
{
    private int $total = 0;
    private string $statut;
    private string $contenu;
    private string $user;



    public function getTotal()
    {
        return $total;
    }

    public function setTotal()
    {
        $this->total = $total;
    }



    public function getStatut()
    {
        return $statut;
    }

    public function setStatut()
    {
        $this->statut = $statut;
    }



    public function getContenu()
    {
        return $contenu;
    }

    public function setContenu()
    {
        $this->contenu = $contenu;
    }

    

    public function getUser()
    {
        return $user;
    }

    public function setUser()
    {
        $this->user = $user;
    }

}
