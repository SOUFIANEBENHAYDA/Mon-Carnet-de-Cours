<?php


require_once __DIR__."/../modele/connexion_db.php";


class EspaceEtudiant{
    private $id_post;
    private $contenu;
    private $date_post;
    private $id_etudiant;
    private $id_matiere;

    function __construct($id_post,$contenu,$date_post,$id_etudiant,$id_matiere)
    {
        $this->id_post=$id_post;
        $this->contenu=$contenu;
        $this->date_post=$date_post;
        $this->id_etudiant=$id_etudiant;
        $this->id_matiere=$id_matiere;
    }

    function getId_post(){
        return $this->id_post;
    }
    function getContenu(){
        return $this->contenu;
    }
    function getDate_post(){
        return $this->date_post;
    }
    function getId_etudiant(){
        return $this->id_etudiant;
    }
    function getId_matiere(){
        return $this->id_matiere;
    }


    function setId_post($id_post){
        $this->id_post=$id_post;
    }
    function setContenu($contenu){
        $this->contenu=$contenu;
    }
    function setDate_post($date_post){
        $this->date_post=$date_post;
    }
    function setId_etudiant($id_etudiant){
        $this->id_etudiant=$id_etudiant;
    }
    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }

    /*vueeeeeeeeeeeeeee */
    static function display(){
        $pdo=connexion_database();
        $stat=$pdo->prepare('SELECT p.id_post as "id_post" , p.contenu as contenu , p.email as "email", e.nom as "nom_etud" FROM etudiants e INNER JOIN posts_forum p ON e.id_etudiant=p.id_etudiant ORDER BY p.id_post DESC');
        $stat->execute();
        $forum=$stat->fetchAll();
        return $forum;
        
    }
    static function create(){
    $pdo = connexion_database();
    $stmt = $pdo->prepare("SELECT id_etudiant FROM etudiants WHERE nom = :nom");
    $stmt->bindParam(':nom', $_POST['nom']);
    $stmt->execute();
    $res = $stmt->fetch();

    if ($res) {
        $stat = $pdo->prepare("INSERT INTO posts_forum (contenu, id_etudiant, email) VALUES(:contenu, :id_etudiant, :email)");
        $stat->bindParam(':contenu', $_POST['contenu']);
        $stat->bindParam(':email', $_POST['email']);
        $stat->bindParam(':id_etudiant', $res['id_etudiant']);
        $stat->execute();
        echo "<script>alert('Le contenu a été envoyer avec success')</script>";
    } else {
        echo "Aucun étudiant trouvé avec ce nom.";
        }
    }



    function edit(){
        $pdo = connexion_database();
    }
    static function destroy($id){
    $pdo = connexion_database();
    $stat = $pdo->prepare("DELETE FROM posts_forum WHERE id_post = :id");
    $stat->bindParam(":id", $id);
    $stat->execute();
    }

    static function destroy_All(){
        $pdo = connexion_database();
        $stat=$pdo->prepare("DELETE  FROM posts_forum");
        $stat->execute();
    }

}
















?>