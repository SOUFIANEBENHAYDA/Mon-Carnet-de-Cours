<?php
class Admin{
    public $email, $pwd;
    public $nom, $prenom, $ida;

    public function __construct($email, $nom, $prenom, $ida, $pwd)
    {
        $this->ida=$ida;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->pwd=$pwd;
    }
    
    //ajouter des nouveau etudiant
    public function insciription(){
        inscrire();
    }
    //ajouter des matieres
    public function AjouterMatiere(){
        ajouter_matiere();
    }
    //ajouter les cours(emploi de temps)
    public function ajoutercours(){
        
    }
    //les notes
    public function AjouterNotes(){

    }
}

?>