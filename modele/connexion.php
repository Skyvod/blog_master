<?php
try
{
    $bdd = new PDO('mysql:host=mysql1.alwaysdata.com;dbname=skyvod_iut_blog', 'skyvod', 'lolilol62');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
