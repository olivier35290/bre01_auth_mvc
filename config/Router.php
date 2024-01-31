<?php

class Router {
    
    public function __construct()
    {
    }
    
    public function handleRequest(array $get) : void
    {
        
        if (isset($get["route"]) && ($get["route"]==="connexion"))
        {
            require "templates/connexion.phtml";
        }
        
        else if (isset($get["route"]) && ($get["route"]==="check-connexion"))
        {
            $loginController = new AuthController();
            $loginController -> checkLogin();
            
        }
        
        else if (isset($get["route"]) && ($get["route"]==="inscription"))
        {
            require "templates/inscription.phtml";
        }
        
        else if (isset($get["route"]) && ($get["route"]==="check-inscription"))
        {
            $signinController = new AuthController();
            $signinController -> checkSignin();
        }
        
        else if (isset($get["route"]) && ($get["route"]==="espace-perso"))
        {
            require "templates/layout.phtml";
        }
        
        else if (!isset($get["route"]))
        {
            $noRouteController = new PageController();
            $noRouteController -> home();
        }
        else
        {
            $otherController = new PageController();
            $otherController -> error404();
        }
    }
}