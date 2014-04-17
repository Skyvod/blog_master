<h1 style="margin-left:20px;">Hello</h1>
<form method='post'>
  <input type="hidden" name="visible" value="0" />
  <input type="submit" value="Afficher les articles non publiés" style="margin-left:20px;"/>
</form>
<form method='post'>
  <input type="hidden" name="visible" value="1" />
  <input type="submit" value="Masquer les articles non publiés" style="margin-left:20px;"/>
</form>
<ul>
	<?php
		foreach($billets as $billet):
	?>
			<li>
			<?php echo "Id du billet : ".$billet['id']; ?>
			 - <a href="?action=edit&id=<?php echo $billet['id']; ?>">Modifier</a> - <br/>
			<?php echo "Titre du billet : ".$billet['titre']. "<br/>";?>
			<?php echo "Contenu du billet : ".$billet['contenu']. "<br/>";?>
			<?php 
				if($billet['publie'] == 1){
					echo "Publication du billet : Oui <br/>";					
				}
				else{
					echo "Publication du billet : Non <br/>";		
				}
			?>
			<?php echo "Date du billet : ".$billet['date']. "<br/>";?>
			<form method="post">
	            <input type="hidden" name="action" value="delete" />
	            <input type="hidden" name="id" value="<?php echo $billet['id']; ?>" />
	            <input type="submit" value="X" />
	        </form>
			</li>
	<?php
		endforeach;
	?>
</ul>

