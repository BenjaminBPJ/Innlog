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
