<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Iut Blog</title>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link href="vues/blog/bootstrap.css" rel="stylesheet">
  </head>

  <body>
  	<div style="float:right;">
	  <form method='post'>
		  <input type="hidden" name="action" value="<?php echo (isset($billet_a_modifier) ? 'edit' : 'add'); ?>" />
		  <h1>Information pour l'ajout d'un billet !</h1>
		  <p>Titre du billet : <input type='text' name='titre' id='titre' placeholder='Exemple de titre' required="" <?php if (isset($billet_a_modifier)) echo 'value="' . $billet_a_modifier['titre'].'"';?> /></p>
		  <p>Contenu : <textarea name='contenu' id='contenu' required=''><?php if (isset($billet_a_modifier)) echo $billet_a_modifier['contenu'] ?></textarea></p>
      <p>Insigner un tag : <input type="text" name="ins_tag" id="ins_tag" placeholder='Exemple de tag' value=""/></p>
      <?php 
        if($billet_a_modifier['publie'] == 1){
          echo "<p>Publie : <input type='radio' name='publie' value='0'>Non <input type='radio' name='publie' value='1' checked=checked>Oui</p>";
        }
        else{
          echo "<p>Publie : <input type='radio' name='publie' value='0' checked=checked>Non <input type='radio' name='publie' value='1'>Oui</p>";
        }
      ?>
		  <p>Date : <input type="date" name="date_titre" required=""/></p>
      <?php if (isset($billet_a_modifier)) : ?>
        <input type="hidden" name="id" value="<?php echo $billet_a_modifier['id'] ?>" />
      <?php endif; ?>
      <input type="submit" value="<?php echo (isset($billet_a_modifier) ? 'Modifier' : 'Ajouter'); ?>" />
	  </form>
    <form method='post'>
      <input type="hidden" name="action" value="add_tag"/>
      <h1>Création de tag</h1>
      <p>Nom du tag : <input type='text' name='libelle_tag' id='libelle_tag' placeholder='Exemple de tag' required="" /></p>
      <input type="submit" value="Créer"/>
    </form>
    <h1>Liste des tags</h1>
    <?php
      foreach($tags as $tag):
    ?>
      <li>
        <?php echo $tag['libelle']; ?>
      </li>
    <?php
      endforeach;
    ?>






	  </div>