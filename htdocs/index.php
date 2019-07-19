<?php
include_once 'db/user.php';
include_once 'controllers/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    include_once 'views/home.html';
}else if(isset($_POST['uname']) && isset($_POST['pswd'])){
    $userForm = $_POST['uname'];
    $passForm = $_POST['pswd'];
    $user = new User();
    if($user->userExists($userForm, $passForm)){
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'views/home.html';
    }else{
        echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'views/login.html';
    }
}else{
    include_once 'views/login.html';
}
?>