<?php

include_once('modele/blog/blog.php');

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        ajouter_billet($_POST['titre'], $_POST['contenu'], $_POST['publie'], $_POST['date_titre']);            
    }
    else if(($_POST['action'] == 'delete')){
        delete_billet($_POST['id']);
    }
    else if ($_POST['action'] == 'edit') {
        if($_POST['date_titre'] == ""){
            modification_billets_sans_date($_POST['id'], $_POST['titre'], $_POST['contenu'], $_POST['publie']);
        }
        else{
            modification_billets($_POST['id'], $_POST['titre'], $_POST['contenu'], $_POST['publie'], $_POST['date_titre']);    
        }
    } 
    else if($_POST['action'] == 'add_tag') {
        ajouter_tag($_POST['libelle_tag']);
    }
}
else if ($_GET != array()) {
    $id = key($_GET);
    if ($_GET['action'] == 'edit') {
        $billet_a_modifier = get_billet_by_id(intval($_GET['id']));
    }
}

if (isset($_POST['visible'])) {
    if($_POST['visible'] == '0'){
        $billets = get_billets_publie();               
    }
    else {
        $billets = get_billets(); 
    }
}
else{
    $billets = get_billets();    
}
$tags = get_tag();