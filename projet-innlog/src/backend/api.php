<?php 
    require_once('./connect.php');
    require_once('./cors.php');
    require_once('./function.php');

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
        while($row = $sql->fetchAll(PDO::FETCH_ASSOC)){
            array_push($outings, $row);
        }
        $result['outings']=$outings;
    }

    // Création d'une sortie
    if ($action == 'create') {
        $title=strip_tags($_POST['title']);
        $type=strip_tags($_POST['type']);
        $speedAverage=strip_tags($_POST['speedAverage']);
        $distance=strip_tags($_POST['distance']);
        $comment=strip_tags($_POST['comment']);

        $sql=$bdd->query("INSERT into sorties (title, type, date, speedAverage, distance, comment ) VALUES ('$title', '$type', NOW(), '$speedAverage', '$distance', '$comment')");
        if($sql){
            $result['message'] = 'La sortie a été crée';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible d'ajouter une nouvelle sortie";
        }
    }

    // Modification d'une sortie
    if ($action == 'update') {
        $id=$_POST['id'];
        $title=strip_tags($_POST['title']);
        $type=strip_tags($_POST['type']);
        $distance=strip_tags($_POST['distance']);
        $speedAverage=strip_tags($_POST['speedAverage']);
        $comment=strip_tags($_POST['comment']);

        $sql=$bdd->query("UPDATE sorties SET title='$title', type='$type', date=NOW(), distance='$distance', speedAverage='$speedAverage', comment='$comment' WHERE id='$id'");
        if($sql){
            $result['message'] = 'La sortie a été modifiée';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible de modifier une nouvelle sortie";
        }
    }

    // Suppression d'une sortie
    if ($action == 'delete') {
        $id=$_POST['id'];

        $sql=$bdd->query("DELETE FROM sorties WHERE id='$id'");
        if($sql){
            $result['message'] = 'La sortie a été supprimée';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible de supprimer cette sortie";
        }
    }

    // Création d'un compte
    if ($action == 'signup') {
        $pseudo=strip_tags($_POST['pseudo']);
        $email=strip_tags($_POST['email']);
        $password=strip_tags($_POST['password']);

        // vérification que tous le sinputs sont présents et remplis
        if(noEmptyInputSignup($pseudo, $email, $password) === false){
            exit('Veuillez remplir tous les champs');
        }

        // vérification que le pseudo est correct
        if(invalidPseudo($pseudo) !== false){
            exit( "Veuillez écrire un pseudo en toute lettre");
        }

        // vérification que l'adresse mail est une adresse mail valide 
        if(invalidEmail($email) !== false){
            exit("L'email n'est pas valide");
        }

        if(emailAlreadyUse($bdd, $pseudo, $email) === true){
            exit("L'email ou le pseudo existe deja");
        }

        if(signup($bdd, $pseudo, $email, $password) === true){
            $result['message'] = 'Utilisateur crée';
        } else {
            $result['error'] = true;
            $result['message'] = "Impossible de créer cet utilisateur";
        }

        // Connection de l'utilisateur
        $user = selectUser($bdd, $email);
        openSessionUser($user);
    }
        
    if ($action == 'login') {
        $email=strip_tags($_POST['email']);
        $password=strip_tags($_POST['password']);

        if(noEmptyInputLogin($email, $password) === false){
            exit('Veuillez remplir tous les champs');
        }
        
        // Vérification que l'adresse mail est une adresse mail valide 
        if(invalidEmail($email) !== false){
            exit("Mot de passe ou adresse email invalide");
        }

        // Je créer une variable user pour récupérer son mdp et voir si il est bon
        $user = selectUser($bdd, $email);
        if(!password_verify($password, $user['password'])){
            exit("Mot de passe ou adresse email invalide");
        }
        
        // On connecte l'utilisateur a une session
        openSessionUser($user);
        $result['message'] = "Vous êtes connecté";
    }
    
    echo json_encode($result);
    require_once('./close.php');
?>