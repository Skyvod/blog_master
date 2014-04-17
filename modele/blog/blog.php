<?php

function ajouter_billet($titre, $contenu, $publie, $date) 
{
    global $bdd;

    $req = $bdd->prepare('INSERT INTO billet (titre, contenu, publie, date) VALUES (:titre, :contenu, :publie, :date)');
    
    $req->bindParam(':titre', $titre, PDO::PARAM_STR);
    $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $req->bindParam(':publie', $publie, PDO::PARAM_INT);
    $req->bindParam(':date', $date, PDO::PARAM_STR);

    return $req->execute(); 
}

function ajouter_tag($libelle_tag) 
{
    global $bdd;

    $req = $bdd->prepare('INSERT INTO tag (libelle) VALUES (:libelle_tag)');
    
    $req->bindParam(':libelle_tag', $libelle_tag, PDO::PARAM_STR);

    return $req->execute(); 
}

function get_billets()
{
    global $bdd;

    $sql = 'SELECT * FROM billet WHERE publie=1 ORDER BY date '; 
    $req = $bdd->prepare($sql);
    $req->execute();
    $billets = $req->fetchAll();
    
    return $billets;
}

function get_tag()
{
    global $bdd;

    $sql = 'SELECT * FROM tag'; 
    $req = $bdd->prepare($sql);
    $req->execute();
    $tag = $req->fetchAll();
    
    return $tag;
}

function get_billets_publie()
{
    global $bdd;

    $sql = 'SELECT * FROM billet ORDER BY date '; 
    $req = $bdd->prepare($sql);
    $req->execute();
    $billets = $req->fetchAll();
    
    return $billets;
}

function delete_billet($id)
{

    global $bdd;

    $req = $bdd->prepare('DELETE FROM billet WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    
    return $req->execute(); 
}

function get_billet_by_id($id) 
{
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM billet WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $billet = $req->fetch();
    
    return $billet;
}

function modification_billets($id, $titre, $contenu, $publie, $date_publie)
{
    global $bdd;

    $req = $bdd->prepare('
        UPDATE billet
        SET titre=:titre, contenu=:contenu, publie=:publie, date=:date_publie
        WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->bindParam(':titre', $titre, PDO::PARAM_STR);
    $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $req->bindParam(':publie', $publie, PDO::PARAM_INT);
    $req->bindParam(':date_publie', $date_publie, PDO::PARAM_STR);
    
    return $req->execute(); 
}

function modification_billets_sans_date($id, $titre, $contenu, $publie)
{
    global $bdd;

    $req = $bdd->prepare('
        UPDATE billet
        SET titre=:titre, contenu=:contenu, publie=:publie
        WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->bindParam(':titre', $titre, PDO::PARAM_STR);
    $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $req->bindParam(':publie', $publie, PDO::PARAM_INT);
    
    return $req->execute(); 
}
