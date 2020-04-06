<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
        <input type="text" name="phrase" maxlength="200"/>
        <input type="submit" name="valider" value="Ajouter phrase"/>
        <input type="submit"name="terminer" value="fin de saisie"/>
    </form>
    <?php
   

    session_start(); // Démarrage la session      
    if(! isset($_SESSION['T'])){ // Teste si le tableau n'est pas encore ete cree
         $_SESSION['T'] = array(); // Création du tableau
    }
     if(isset($_POST["valider"])){ // Test si on a cliqué sur le bouton ajouter
         $tab = $_SESSION['T'];
         array_push($tab, $_POST["phrase"]); // ajoute la phrase saisi dans le tableau
         $_SESSION['T'] = $tab;
     }
    ?>

</body>
</html>