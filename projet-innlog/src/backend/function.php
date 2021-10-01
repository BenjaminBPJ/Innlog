<?php
function noEmptyInputSignup($pseudo, $email, $password) {
    $result;
    if(isset($_POST['pseudo'], $_POST['email'], $_POST['password']) && !empty($pseudo) && !empty($email) && !empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidPseudo($pseudo) {
    $result;
    if(!preg_match(("/^[a-zA-Z0-9]*$/"), $pseudo)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function emailAlreadyUse($bdd, $pseudo, $email) {
    $sql = "SELECT * FROM utilisateurs WHERE pseudo= ? OR email = ?";
    $query = $bdd->prepare($sql);
    $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute(array($pseudo, $email));
    $row = $query->rowCount();

    if($row > 0){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}

function signup($bdd, $pseudo, $email, $password) {
    // hash du mdp
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (pseudo, email, password) VALUES (:pseudo, :email, '$hashPassword')";
    $query = $bdd->prepare($sql);
    $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();

    if($sql){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function noEmptyInputLogin($email, $password) {
    $result;
    if(isset($_POST['email'], $_POST['password']) && !empty($email) && !empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function selectUser($bdd, $email) {
    $sql = "SELECT * FROM utilisateurs WHERE email=:email";
    $query = $bdd->prepare($sql);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if(!$user){
        exit('Utilisateur non trouvé');
    }

    return $user;
}

function openSessionUser($user){
    session_start();

    $_SESSION["user"] = [
        "id" => $user["id"],
        "email" => $user["email"],
    ];
}
