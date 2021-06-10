<?php

use App\Controller\AuthenticateController;
use App\Controller\BlogController;
use App\Controller\ContactController;
use App\Controller\DonationController;
use App\Controller\HomeController;
use App\Controller\PokemonController;
use App\Controller\StoreController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Liste des routes
 */
$routes = new RouteCollection();
// Acceuil
$routes->add("home", new Route("/", ['_controller'=>[new HomeController, "index"]]));
// Connexion
$routes->add("connexion", new Route("/connexion", ['_controller'=>[new AuthenticateController(), "signIn"]]));
// Inscription
$routes->add("inscription", new Route("/inscription", ['_controller'=>[new AuthenticateController, "signUp"]]));
// Boutique
$routes->add("boutique", new Route("/boutique", ['_controller'=>[new StoreController(), "index"]]));
$routes->add("produit", new Route("/boutique/add", ['_controller'=>[new StoreController, "add"]]));
// Contact
$routes->add("contact", new Route("/contact", ['_controller'=>[new ContactController(), "index"]]));
// Don
$routes->add("don", new Route("/don", ['_controller'=>[new DonationController(), "index"]]));
// Pokemon
$routes->add("pokemon", new Route("/pokemon", ['_controller'=>[new PokemonController(), "index"]]));
// Blog
$routes->add("blog", new Route("/blog", ['_controller'=>[new BlogController(), "index"]]));

