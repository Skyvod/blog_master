<?php

# connexion BDD
include_once('modele/connexion.php');

# traitement
include_once('controleur/blog/index.php');

# haut de page
include_once('vues/blog/header.php');

// On affiche la page (vue)
include_once('vues/blog/index.php');

# pied de page
include_once('vues/blog/footer.php');
