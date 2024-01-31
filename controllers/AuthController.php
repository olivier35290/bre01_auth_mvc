<?php

class AuthController {
    
    public function __construct()
    {
    }
    
    public function authenticateUser() {
        
        $userManager = new UserManager(); 
        $userManager->checkLogin();
        
        if (!$user) {
            header("Location: ../index.php?route=home");
        } 
        
        // si il existe je vérifie si le mot de passe est le bon
        if ($user) {
            $hash = $user["password"];
            $passwordOK = password_verify($_POST["loginPassword"], $hash);
            
        if ($passwordOK) {
        header("Location: ../index.php?route=espace-perso");
        }
            
        // s'il n'est pas bon je redirige vers la page de connexion
        if (!$passwordOK) { 
                header("Location: ../index.php?route=connexion");
        }
    }
    }
    public function registerUser() {
        
        $userManager = new UserManager(); 
        $userManager->checkSignin();
        
        if ($user) 
        { 
            header("Location: ../index.php?route=home");
        } 
        else 
        {
        $userManager = new UserManager();
        $userManager -> create();
        header("Location: ../index.php?route=espace-perso");
        }
    }
}

