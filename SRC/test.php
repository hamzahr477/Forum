
 
<!DOCTYPE html>
 
<html>
 
    <head>
 
        <meta charset="utf-8" />
        
        
 
    </head>
 
    <body>
 
        <?php
      
        //requête de mise à jour
        $query2 = $bdd->prepare('UPDATE login SET  photo = :image, num = :num, mail = :Email, pays = :pays, daten = :daten, ville = :ville, password = :password, description = :descriptif WHERE id = 1');
        $query2->bindValue(':id',$donnees['id'], PDO::PARAM_INT);
        $query2->bindValue(':image',$_POST['image'], PDO::PARAM_STR);
        $query2->bindValue(':num',$_POST['num'], PDO::PARAM_STR);
        $query2->bindValue(':Email',$_POST['Email'], PDO::PARAM_STR);
        $query2->bindValue(':pays',$_POST['pays'], PDO::PARAM_STR);
        
        $query2->bindValue(':daten',$_POST['daten'], PDO::PARAM_STR);
        $query2->bindValue(':ville',$_POST['ville'], PDO::PARAM_STR);
        $query2->bindValue(':password',$_POST['password'], PDO::PARAM_STR);
        $query2->bindValue(':descriptif',$_POST['descriptif'], PDO::PARAM_STR);
        $query2->execute();
 
        ?>
 
 
    </body>
 
</html>