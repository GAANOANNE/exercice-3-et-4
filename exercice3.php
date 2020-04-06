<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form method="POST">
        <input type="text" name="mot" maxlength="20"/>
        <input type="submit" name="valider" value="Ajouter mot"/>
        <input type="submit" name="terminer" value="fin de saisie"/>
    </form>
    <?php 
       session_start();       
       if(! isset($_SESSION['T'])){
            $_SESSION['T'] = array();
       }
       if(! isset($_SESSION['i'])){
            $_SESSION['i'] = 0;
       }
        if(isset($_POST["valider"])){
            $tab = $_SESSION['T'];
            array_push($tab, $_POST["mot"]);
            $_SESSION['T'] = $tab;
        }
        if(isset($_POST["terminer"])){
            $cpt = 0;
            $taille = sizeof($_SESSION['T']);
            for($i = 0; $i < $taille; $i++){
                $mot = $_SESSION['T'][$i];
                $lettre = "";
                for ($j=0; $j < strlen($mot); $j++) { 
                    # code...
                    $lettre = $mot[$j];
                    if($lettre == ' ' OR $lettre == "'"){
                        break;
                    }
                    if($lettre == 'M' OR $lettre == 'm'){
                        $cpt ++;
                        break;
                    }                    
                }
            }
            echo "<p style='color:red;'>Le tableau contient $taille mots dont $cpt contiennt la lettre M";
            $_SESSION['T'] = array();
            session_destroy();
        }
    ?>
</body>
</html>