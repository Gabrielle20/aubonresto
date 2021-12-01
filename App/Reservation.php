<?php
class Reservation
{
    //ATTRIBUTES
    public $id; 
    public $table;
    public $debut; 
    public $fin;

    //METHODS
    public function __construct($id, $table, $debut, $fin)
    {
        $this->id = $id;
        $this->table = $table; 
        $this->debut = $debut; 
        $this->fin = $fin;
        $this->status ; 
    }

    public function getId()
    {
        return $this->id; 
    }

    public function getTable()
    {
        return $this->table; 
    }

    public function setTable($newTable)
    {
        $this->table = $newTable; 
    }

    public function getDebut()
    {
        return $this->debut; 
    }

    public function getFin()
    {
        return $this->fin; 
    }

    public function check_dispo_table($table)
    {
        //verifier si la table est déja réservée en bdd
        return true; 
    }

    public function add_reservation_db()
    {
        echo("reservé"); 
    }
}