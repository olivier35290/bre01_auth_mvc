<?php

require "config/autoload.php";

$routeur = new Router();
$routeur->handleRequest($_GET);