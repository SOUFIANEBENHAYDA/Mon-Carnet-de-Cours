<?php


require_once __DIR__."/../modele/connexion_db.php";

class Matiere{
    private $id_matiere;
    private $nom;
    private $coefficient;
    private $id_prof;

    function __construct($nom,$coefficient,$id_prof,$id_matiere="")
    {
        $this->nom=$nom;
        $this->coefficient=$coefficient;
        $this->id_prof=$id_prof;
        $this->id_matiere=$id_matiere; //maghadich n7tajo ID ta3 lmatiere f contructeur
    }

    function getId_matiere(){
        return $this->id_matiere;
    }
    function getNom(){
        return $this->nom;
    }
    function getCoefficient(){
        return $this->coefficient;
    }
    function getId_prof(){
        return $this->id_prof;
    }


    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
    function setCoefficient($coefficient){
        $this->coefficient=$coefficient;
    }
    function setId_prof($id_prof){
        $this->id_prof=$id_prof;
    }


    static function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM matieres");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    static function create(){
        $pdo = connexion_database();
        $stmt = $pdo->prepare("
        SELECT p.nom
        FROM professeurs p
        JOIN matieres m ON m.id_prof = p.id_prof
        ORDER BY m.nom, 
        ");
        $stmt->execute();
        $res=$stmt->fetchAll();
        return $res;
        }
    



    function edit(){
        $pdo = connexion_database();
    }
    function destroy(){
        $pdo = connexion_database();
    }

    static function ajouter(){
        $pdo=connexion_database();
        if(isset($_POST['nom'])&&isset($_POST['coef'])&&isset($_POST['idp'])){

            $stat=$pdo->prepare("INSERT INTO matieres(nom, coefficient, id_prof) VALUES(:nom, :c, :idp)");
            $stat->bindValue(":nom", $_POST['nom']);
            $stat->bindValue(":c", $_POST['coef']);
            $stat->bindValue(":idp", $_POST['idp']);
            $stat->execute();

        }
        else{
            echo "<script>alert('error')</script>";
        }
    }
}




?>