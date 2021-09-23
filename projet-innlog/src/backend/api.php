<?php 
/**
 *  An example CORS-compliant method.  It will allow any GET, POST, or OPTIONS requests from any
 *  origin.
 *
 *  In a production environment, you probably want to be more restrictive, but this gives you
 *  the general idea of what is involved.  For the nitty-gritty low-down, read:
 *
 *  - https://developer.mozilla.org/en/HTTP_access_control
 *  - https://fetch.spec.whatwg.org/#http-cors-protocol
 *
 */
function cors() {
    
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        exit(0);
    }
}

    require_once('./connect.php');

    // Création d'un array et d'une variable action vide pour récupérer les résultats et erreurs
    $result = array('error'=> false);
    $action='';

    if(isset($_GET['action'])){
        $action=$_GET['action'];
    }

    // Récupération de toutes les sorties
    if ($action == 'read') {
        $sql = $bdd->query('SELECT * FROM sorties');
        $outings = array();
        while($row = $sql->fetchAll()){
            array_push($outings, $row);
        }
        $result['outings']=$outings;
    }

    // Création d'une sortie
    if ($action == 'create') {
        $title=$_POST['title'];
        $type=$_POST['type'];
        $distance=$_POST['distance'];
        $speedAverage=$_POST['speedAverage'];
        $comment=$_POST['comment'];

        $sql=$bdd->query("INSERT into sorties (title, type, date, distance, speedAverage, comment ) VALUES ('$title', '$type', NOW(), '$distance', '$speedAverage', '$comment')");
        if($sql){
            $result['message'] = 'La sortie a été crée.';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible d'ajouter une nouvelle sortie.";
        }
    }

    // Modification d'une sortie
    if ($action == 'update') {
        $id=$_POST['id'];
        $title=$_POST['title'];
        $type=$_POST['type'];
        $distance=$_POST['distance'];
        $speedAverage=$_POST['speedAverage'];
        $comment=$_POST['comment'];

        $sql=$bdd->query("UPDATE sorties SET title='$title', type='$type', date=NOW(), distance='$distance', speedAverage='$speedAverage', comment='$comment' WHERE id='$id'");
        if($sql){
            $result['message'] = 'La sortie a été modifiée.';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible de modifier une nouvelle sortie.";
        }
    }

    // Suppression d'une sortie
    if ($action == 'delete') {
        $id=$_POST['id'];

        $sql=$bdd->query("DELETE FROM sorties WHERE id='$id'");
        if($sql){
            $result['message'] = 'La sortie a été supprimée.';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible de supprimer cette sortie.";
        }
    }

    // Création d'un compte
    if ($action == 'signup') {
        $pseudo=$_POST['pseudo'];
        $password=$_POST['password'];

        $sql=$bdd->query("INSERT into utilisateurs (pseudo, password) VALUES ('$pseudo', '$password')");
        if($sql){
            $result['message'] = 'Votre compte a été crée.';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible de créer un nouveau compte.";
        }
    }
    /*if ($action == 'login') {
        $pseudo=$_POST['pseudo'];
        $sql = $bdd->query("SELECT * FROM utilisateurs WHERE pseudo='$pseudo'");
        $users = array();
        while($row = $sql->fetch()){
            array_push($users, $row);
        }
        $result['users']=$users;
    }*/
    echo json_encode($result);
    require_once('./close.php');
?>